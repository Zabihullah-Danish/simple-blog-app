<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostPublished extends Notification
{
    use Queueable;
    private $published;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($published)
    {
        return $this->published = $published;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)->view(
            'emails.PostSend',['published' => $this->published]
        );
                    // ->line($this->published['title'])
                    // ->action($this->published['body'], $this->published['url'])
                    // ->action($this->published['ourSite'],$this->published['siteLink'])
                    // ->line($this->published['thanks']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
