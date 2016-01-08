<?php

namespace App\Listeners;

use App\Events\DeviceStateChanged;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Broadcast
{
    /**
     * Create the event listener.
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  DeviceStateChanged  $event
     * @return void
     */
    public function handle(DeviceStateChanged $event)
    {
        //
    }

    public function notifyUser(DeviceStateChanged $event){
        return $event;
    }
}
