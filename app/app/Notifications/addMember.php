<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class addMember extends Notification
{
    use Queueable;
    private $guestName;
    private $teamName;
    private $host;

    /**
     * Create a new notification instance.
     */
    public function __construct($userName,$teamName,$host)
    {
        $this->guestName = $userName;
        $this->teamName = $teamName;
        $this->host = $host;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */

    // This part send a email to all member of the team
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->from($this->host->email, $this->host->name)
                    ->subject('New member')
                    ->line('Bienvenue à '.$this->guestName.' qui rejoint la team : '.$this->teamName.' !!!')
                    ->line('Invited by '.$this->host->name.' at '.date('l jS \of F Y h:i:s A'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */

    // This part put data in the data base
    public function toArray(object $notifiable): array
    {
        return [
            'userAdded' => $this->guestName,
            'host' => $this->host->name,
            'date' => date("Y-m-d H:i:s")
        ];
    }
}
