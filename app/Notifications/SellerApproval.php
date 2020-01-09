<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SellerApproval extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $approval;

    public function __construct($data=null)
    {
        $this->approval=$data;
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
        $mailMessage = new MailMessage();
        
        $mailMessage->subject('Seller Approval');
        
        if($this->approval) 
        {
            $mailMessage->line('You have been successfully Enlisted as Seller');
            $mailMessage->line('Start Selling your Home Made food now');
        }
        else{
            $mailMessage->line('Sorry , We have found that you are not eligible to become a seller.');
        }
        
        $mailMessage->line('Thank You for using FoodHunter');


        return $mailMessage;
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
