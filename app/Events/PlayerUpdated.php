<?php

namespace App\Events;

use App\User;
use App\Player;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PlayerUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets;

    public $player;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Player $player)
    {
        $this->player = $player;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        \Log::info($this->player);
        return new PrivateChannel('players');
    }
}
