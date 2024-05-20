<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class CommentNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $jop;
    protected $comment;
    public function __construct($jop, $comment)
    {
        $this->jop = $jop;
        $this->comment = $comment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            'title' => 'new comment in your jop (' . $this->jop->name . ')',
            'sender' => Auth::user()->name,
            'data' => $this->comment,
            'url' => route('jop', $this->jop->slug)
        ];
    }
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}