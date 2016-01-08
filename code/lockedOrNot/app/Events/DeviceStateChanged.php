<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class DeviceStateChanged extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $text;

    public function __construct($text)
    {
        $this->text = $text;
    }

//    public $device_state;
//
//    /**
//     * Create a new event instance.
//     *
//     */
//    public function __construct( $device_state )
//    {
//        $this->device_state = $device_state;
//    }

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
