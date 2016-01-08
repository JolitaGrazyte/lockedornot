<?php

namespace App\Http\Controllers;

use App\Device;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class DeviceController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['response']]);
//        $this->middleware(['before' => 'jwt-auth', ['only' => ['getInfo']]]);
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


                $token = JWTAuth::getToken();
                $user = JWTAuth::toUser($token);

                return Response::json([
                    'data' => [
                        'email' => $user->email,
                        'registered_at' => $user->created_at->toDateTimeString(),
                        'device_state' => $user->device->state
                    ]
                ]);

    }

}
