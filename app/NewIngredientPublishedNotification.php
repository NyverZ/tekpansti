<?php

namespace App;

use App\Models\Plant;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewIngredientPublishedNotification extends Notification
{
    use Queueable;

    public function __construct(
        private readonly Plant $plant
    ) {
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        $isPublished = (bool) $this->plant->is_published;

        return [
            'title' => $isPublished
                ? 'Bahan pangan baru dipublikasikan'
                : 'Data bahan pangan baru ditambahkan admin',
            'message' => $isPublished
                ? $this->plant->local_name . ' sudah tersedia lengkap dengan profil nutrisi.'
                : 'Data ' . $this->plant->local_name . ' berhasil disimpan. Lengkapi detail sebelum dipublikasikan.',
            'url' => $isPublished
                ? route('foods.show', $this->plant->slug, false)
                : route('admin.ingredients.edit', $this->plant, false),
            'priority' => 'normal',
            'meta' => [
                'entity' => 'ingredient',
                'id' => $this->plant->id,
            ],
        ];
    }
}
