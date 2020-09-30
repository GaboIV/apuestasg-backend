<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationRegisterPlayerMail extends Mailable
{
    use Queueable, SerializesModels;
  
    public $player;
    public $assist_id;
   
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($player, $assist_id)
    {
        $this->player = $player;
        $this->assist_id = $assist_id;
    }
   
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Registro de nuevo usuario')
                    ->view('emails.notificationRegisterPlayer');
    }
}
