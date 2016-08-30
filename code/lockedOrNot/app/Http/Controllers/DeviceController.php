<?php

namespace App\Http\Controllers;

use App\Device;
//use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Http\Requests;
use Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Stats;
use Illuminate\Support\Facades\App;

class DeviceController extends Controller
{
    /**
     * DeviceController constructor.
     */
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['response', 'putState']]);
    }

    /**
     * @param $device_nr
     * @param $state
     */
    public function putState($device_nr, $state){


        $device = Device::where('device_nr', $device_nr)->first();
        if($device->state == 0){
            $device->state = 1;
        }else{
            $device->state = 0;
        }

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
     * @param Request $request
     */
    public function poststate(Request $request)
    {

        $device_nr = $request->id;
        $state      = $request->data;

        $device = Device::where('device_nr', $device_nr)->first();
        $device->state = $state;
        $device->save();

        $text = $state == 0 ? 'Your car is not locked!!' : 'All good. Your car is locked!';

        $pusher = App::make('pusher');

        $pusher->trigger(
            'notifications',
            'new-notification',
            ['device_state' => $device->state, 'text' => $text]
        );
    }


    /**
     * @param Request $request
     * @return mixed
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

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function response($id){

        $device = Device::where('user_id', $id)->first();
        $state = $device->state;

        /**
         * return the state of the lock;
         *  1 = isLocked; 0 = isNotLocked;
         **/

        return view('device.index', compact('state'));
    }



    /**
     * @return mixed
     */
    public function getState(){

        $token      = JWTAuth::getToken();
        $user       = JWTAuth::toUser($token);
        $unlocked   = $user->devices()->unlocked();
        $device_state = $unlocked->count() == 0 ? 1 : 0;

        $data   = ['state' => $device_state, 'username' => $user->first_name];
        $this->putStats($user);

        return Response::json($data);

    }

    /**
     * @param $user
     */
    private function putStats($user){

        $stats = Stats::create();
        $stats->user_id         = $user->id;

        $device = $user->devices->first();
        $stats->device_nr       = $device->device_nr;
        $stats->device_state    = $device->state;
        $stats->save();
    }
}
