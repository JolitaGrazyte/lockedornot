<?php

namespace App\Http\Controllers;

use App\Device;
use Illuminate\Http\Request;

use App\Http\Requests;
use Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Stats;
use Illuminate\Support\Facades\App;

class DeviceController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['response', 'putState']]);
    }

    public function putState($device_nr, $state){


        $device = Device::where('device_nr', $device_nr)->first();
        $device->state = $state;
        $device->save();

        $text = $state == 0 ? 'Oh no! Your car is not locked!!' : 'All good. Your car is locked!';

        $pusher = App::make('pusher');

        $pusher->trigger(
            'notifications',
            'new-notification',
            ['device_state' => $device->state, 'text' => $text]
        );


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jsonResponse( Request $request )
    {
        /**
         * return the state of the lock;
         *  1 = isLocked; 0 = isNotLocked;
        **/
        $state = [ 'state'=> $request->id ];
        return Response::json($state);
    }

    public function response($id){

        $device = Device::where('user_id', $id)->first();
        $state = $device->state;
        $state = mt_rand(0, 1);

        /**
         * return the state of the lock;
         *  1 = isLocked; 0 = isNotLocked;
         **/

        return view('device.index', compact('state'));
    }

    public function getState(){

        $token      = JWTAuth::getToken();
        $user       = JWTAuth::toUser($token);
        $unlocked   = $user->devices()->unlocked();
        $device_state = $unlocked->count() == 0 ? 1 : 0;

        $data   = ['state' => $device_state, 'username' => $user->first_name];
        $this->putStats($user);

        return Response::json($data);

    }

    private function putStats($user){

        $stats = Stats::create();
        $stats->user_id         = $user->id;

        $device = $user->devices->first();
        $stats->device_nr       = $device->device_nr;
        $stats->device_state    = $device->state;
        $stats->save();

    }

}
