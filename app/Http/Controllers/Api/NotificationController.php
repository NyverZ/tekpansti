<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;

class NotificationController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $notifications = $request->user()
            ->notifications()
            ->latest()
            ->limit(10)
            ->get(['id', 'type', 'data', 'read_at', 'created_at']);

        return response()->json([
            'data' => $notifications
                ->map(fn (DatabaseNotification $notification) => $this->transform($notification))
                ->values(),
        ]);
    }

    public function unreadCount(Request $request): JsonResponse
    {
        $user = $request->user();
        $unreadCount = $user->unreadNotifications()->count();
        $latestUnread = $user->unreadNotifications()->latest()->first(['id', 'type', 'data', 'created_at']);

        return response()->json([
            'unread_count' => $unreadCount,
            'latest_unread_id' => $latestUnread?->id,
            'latest_unread_title' => $latestUnread
                ? $this->extractTitle((array) $latestUnread->data, $latestUnread->type)
                : null,
        ]);
    }

    public function markAllRead(Request $request): JsonResponse
    {
        $updated = $request->user()
            ->unreadNotifications()
            ->update(['read_at' => now()]);

        return response()->json([
            'message' => 'Semua notifikasi ditandai telah dibaca.',
            'updated' => $updated,
            'unread_count' => 0,
        ]);
    }

    public function markRead(Request $request, string $id): JsonResponse
    {
        $notification = $request->user()
            ->notifications()
            ->whereKey($id)
            ->firstOrFail();

        if (is_null($notification->read_at)) {
            $notification->forceFill(['read_at' => now()])->save();
        }

        return response()->json([
            'message' => 'Notifikasi ditandai telah dibaca.',
            'id' => $notification->id,
            'read_at' => $notification->read_at?->toIso8601String(),
        ]);
    }

    private function transform(DatabaseNotification $notification): array
    {
        $data = is_array($notification->data) ? $notification->data : [];
        $priorityValue = strtolower((string) ($data['priority'] ?? Arr::get($data, 'meta.priority', 'normal')));

        return [
            'id' => $notification->id,
            'type' => $notification->type,
            'type_key' => strtolower(class_basename($notification->type)),
            'title' => $this->extractTitle($data, $notification->type),
            'message' => $this->extractMessage($data),
            'url' => Arr::get($data, 'url'),
            'priority' => in_array($priorityValue, ['urgent', 'high', 'critical'], true) ? 'urgent' : 'normal',
            'is_unread' => is_null($notification->read_at),
            'read_at' => $notification->read_at?->toIso8601String(),
            'created_at' => $notification->created_at?->toIso8601String(),
        ];
    }

    private function extractTitle(array $data, string $type): string
    {
        return (string) (
            $data['title']
            ?? $data['subject']
            ?? $data['message']
            ?? class_basename($type)
        );
    }

    private function extractMessage(array $data): string
    {
        return (string) (
            $data['message']
            ?? $data['body']
            ?? $data['description']
            ?? 'Notifikasi baru tersedia.'
        );
    }
}
