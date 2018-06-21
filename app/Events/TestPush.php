<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TestPush implements ShouldBroadcast
{
    use SerializesModels;

    public $msg;

    /**
     * Create a new event instance.
     *
     * @param  string  $msg
     * @return void
     */
    public function __construct($msg)
    {
        $this->msg = $msg;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('testing');
    }

    /**
     * Set the event name
     *
     * @return string
     */
    public function broadcastAs() {
        return 'testlistener';
    }
}