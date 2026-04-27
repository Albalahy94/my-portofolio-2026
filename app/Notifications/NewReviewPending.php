<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewReviewPending extends Notification
{
    use Queueable;

    public $review;

    /**
     * Create a new notification instance.
     */
    public function __construct(\App\Models\Review $review)
    {
        $this->review = $review;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Project Review Requires Approval')
            ->greeting('Hello Administrator,')
            ->line('A new ' . $this->review->rating . '-star review has been submitted for a project by ' . ($this->review->name ?? 'Anonymous') . '.')
            ->line('Review details:')
            ->line('"' . ($this->review->body ?? 'No text provided.') . '"')
            ->action('Review Submissions', route('admin.reviews.index'))
            ->line('Thank you for managing your portfolio!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
