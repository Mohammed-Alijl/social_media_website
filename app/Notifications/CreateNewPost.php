<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreateNewPost extends Notification
{
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(private $post_id)
    {
        //
    }

    use Queueable;

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        $username = auth()->user()->name;
        return [
            'post_id'=>$this->post_id,
            'user_name'=>$username,
            'user_image'=>auth()->user()->profile_photo,
            'message'=>$username . ' publish new post'
        ];
    }
}
