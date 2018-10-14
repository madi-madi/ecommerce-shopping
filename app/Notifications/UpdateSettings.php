<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Setting;
use App\Admin;

class UpdateSettings extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $settings = Null;
    protected $admin = Null;

    public function __construct( Admin $admin ,Setting $settings )
    {
        $this->admin=$admin;
        $this->settings = $settings;
        // dd($settings , $admin->id);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
        public function toDatabase($notifiable)
    {
        return [
            'data'=>[
                'id'=>$this->admin->id,
                'user_name'=>$this->admin->name,
                'created_at'=>$this->settings->updated_at
            ]
        ];
    }

    public function toArray($notifiable)
    {
        return [
            'data'=>[
                'id'=>$this->admin->id,
                'user_name'=>$this->admin->name,
                'created_at'=>$this->settings->updated_at
            ]
        ];
    }
}
