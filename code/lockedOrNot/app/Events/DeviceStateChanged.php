<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class DeviceStateChanged extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $device_state;

    public function __construct($device_state)
    {
        $this->device_state = $device_state;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {

        return ['notifications'];

    }
}
