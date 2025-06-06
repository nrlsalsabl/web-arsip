<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ExpiredItemNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    
     public $item;
     public $category;
    public function __construct($item,$category)
    {
        $this->item = $item;
        $this->category = $category;
    }

    

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database']; // Simpan notifikasi ke tabel 'notifications'
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
    public function toArray(object $notifiable): array
    {
        return [
            'category' => $this->category,
            'kode' => $this->item->kode ?? 'Tidak ada kode',
            'pesan' => "Data {$this->category} dengan kode {$this->item->kode} sudah expired.",
        ];
    }
}
