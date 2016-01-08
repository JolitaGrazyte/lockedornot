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

    public function putState(){

        $pusher = App::make('pusher');

        $pusher->trigger(
            'notifications',
            'new-notification',
            ['text' => 'this is a notification']
        );

        $pusher->trigger(
            'test-channel',
            'test-event',
            ['text' => 'Testing real time notifications with pusher...']
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
//        dd($device);
        $state = $device->state;
//        dd($state);
        $state = mt_rand(0, 1);
//        dd($state);

        /**
         * return the state of the lock;
         *  1 = isLocked; 0 = isNotLocked;
         **/

        return view('device.index', compact('state'));
    }

    public function getState(){

        $token  = JWTAuth::getToken();
        $user   = JWTAuth::toUser($token);
        $data   = ['state' => $user->device->state, 'username' => $user->first_name];
        $this->putStats($user);

        return Response::json($data);

    }

    private function putStats($user){

        $stats = Stats::create();
        $stats->user_id         = $user->id;
        $stats->device_nr       = $user->device->device_nr;
        $stats->device_state    = $user->device->state;
        $stats->save();
    }

}
