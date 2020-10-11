<?php

namespace App\Jobs;

use App\Mail\NotificationTicketHorseRacingPlayerMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendHipismTicketMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    protected $player;
    protected $ticketes;
    protected $assist;

    /**
     * Create a new job instance.
     * @param $email_to
     * @param $code
     *
     * @return void
     */
    public function __construct($player, $ticketes, $assist)
    {
        $this->player = $player->toArray();
        $this->ticketes = $ticketes;
        $this->assist = $assist;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->player['email'])
            ->send(new NotificationTicketHorseRacingPlayerMail($this->player, $this->ticketes, $this->assist->id));       
    }
}
