<?php

namespace App\Notifications;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewArticlePublishedNotification extends Notification
{
    use Queueable;

    public function __construct(
        private readonly Article $article
    ) {
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'Artikel baru tersedia',
            'message' => 'Artikel "' . $this->article->title . '" baru saja dipublikasikan.',
            'url' => route('articles.show', $this->article->slug, false),
            'priority' => 'normal',
            'meta' => [
                'entity' => 'article',
                'id' => $this->article->id,
            ],
        ];
    }
}
