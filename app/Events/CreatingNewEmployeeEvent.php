<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreatingNewEmployeeEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $employee;
    public $account;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($employee, $account)
    {
        $this->employee = $employee;
        $this->account = $account;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        //return new PrivateChannel('channel-name');
    }
}
