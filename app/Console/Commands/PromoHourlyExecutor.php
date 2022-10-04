<?php

namespace App\Console\Commands;

use App\Promo;
use Illuminate\Console\Command;
use App\Events\PromoHourlyAdded;
use App\Events\WinnerNumberGenerated;

class PromoHourlyExecutor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'promo:hourly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute Promo Hourly';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $now    = date('Y-m-d H:i:00');

        $promo_actual = Promo::where('time', $now)->first();

        if(! $promo_actual) {
            Promo::create([
                "group" => "Hourly",
                "time" => $now
            ]);
        }

        $add15  = strtotime("+15 minutes", strtotime($now));
        $time   = date('Y-m-d H:i:00', $add15);

        $winner_number = mt_rand(0,32);

        broadcast(new WinnerNumberGenerated($winner_number));

        Promo::where('time', $now)->update([
            "result" => $winner_number
        ]);

        $new_promo = Promo::firstOrCreate([
            "group" => "Hourly",
            "time" => $time
        ]);

        broadcast(new PromoHourlyAdded($new_promo));
    }
}
