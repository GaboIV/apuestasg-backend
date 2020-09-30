<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationRegisterAdminMail extends Mailable
{
    use Queueable, SerializesModels;
  
    public $admin_email;
    public $player;
    public $assist_id;
    public $user;
   
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($admin_email, $player, $user, $assist_id)
    {
        $this->admin_email = $admin_email;
        $this->player = $player;
        $this->user = $user;
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
                    ->view('emails.notificationRegisterAdmin');
    }
}
