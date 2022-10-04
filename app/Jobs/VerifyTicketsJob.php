<?php

namespace App\Jobs;

use App\Player;
use App\Ticket;
use App\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class VerifyTicketsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    public $game;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($game)
    {
        $this->game = $game;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {        
        $game = $this->game;
        
        $tickets = Ticket::whereHas('selections', function ($query) use ($game) {
            $query->Where('sample', $game['id'])
                  ->where('category_id', '!=', '7');
        })
		->with('selections')
		->whereStatus(0)
		->get();

		$tickets_to_pay = 0;
		$tickets_failed = 0;
		$tickets_pending = 0;

		foreach ($tickets as $key => $ticket) {
            $pay = true;
            $odd_to_pay = 1;

            foreach ($ticket->selections as $key => $selection) {
                if (!$selection->competitor->winner) {
					$pay = false;
                } else {
                    if (in_array($selection->type, $selection->competitor->winner)) {
                        $odd_to_pay = $odd_to_pay * floatval($selection->value);
                    } elseif ($selection->competitor->winner != $selection->type) {
						$tickets_failed++;
                        $pay = false;
                        $ticket->update(["status" => 3]);
                    }
				}
			}

			if ($pay == false && $ticket->status != 3) {
				$tickets_pending++;
			}

            if ($pay) {
				$tickets_to_pay++;

                $player_id =  $ticket['player_id'];
                $amount_to_pay = $ticket['amount'] * $odd_to_pay;

                $player = Player::whereId($player_id)->first();

                $ticket->update([
                    "status" => 1
                ]);

                $balance = $player['available'];

                $new_balance =  $balance + $amount_to_pay;

                $player->update(['available' => $new_balance]);

                $transaction = Transaction::create([
                    "event_type_id" => 3,
                    "player_id" => $player->id,
                    "ticket_id" => $ticket->code,
                    "amount" => $amount_to_pay,
                    "player_balance" => $new_balance
                ]);
            }
		}
    }
}
