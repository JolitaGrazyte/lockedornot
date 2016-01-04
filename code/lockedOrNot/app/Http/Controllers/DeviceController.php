<?php

namespace App\Http\Controllers;

use App\Device;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;

class DeviceController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['response']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jsonResponse()
    {

        /**
         * return the state of the lock;
         *  1 = isLocked; 0 = isNotLocked;
        **/
        $state = [ 'state'=> 0 ];
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


}
