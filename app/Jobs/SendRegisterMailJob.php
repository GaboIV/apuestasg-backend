<?php

namespace App\Jobs;

use App\Configuration;
use Illuminate\Bus\Queueable;
use App\Mail\VerificationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\NotificationRegisterAdminMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\NotificationRegisterPlayerMail;

class SendRegisterMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    protected $user;
    protected $player;
    protected $admin_email;
    protected $assist_id;

    /**
     * Create a new job instance.
     * @param $email_to
     * @param $code
     *
     * @return void
     */
    public function __construct($user, $player, $admin_email, $assist_id)
    {
        $this->user = $user->toArray();
        $this->player = $player->toArray();
        $this->admin_email = $admin_email;
        $this->assist_id = $assist_id;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user['email'])
            ->send(new NotificationRegisterPlayerMail($this->player, $this->assist_id));

        if (isset($this->admin_email)) {
            Mail::to($this->admin_email)
            ->send(new NotificationRegisterAdminMail($this->admin_email, $this->player, $this->user, $this->assist_id));
        }        
    }
}
