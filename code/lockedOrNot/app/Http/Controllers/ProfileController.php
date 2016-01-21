<?php

namespace App\Http\Controllers;

use App\Device;
use App\Stats;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ProfileRequest;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Response;
use Session;


class ProfileController extends Controller
{
    private $authUser;

    public function __construct(){

        $this->authUser = Auth::check() ? Auth::user() : null;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @internal param string $name
     */
    public function edit($name)
    {
        $user               =   $this->authUser;
        $no_device          =   empty($user->devices) || is_null($user->devices);

        if($no_device){

            $msg = "It happened so, that we didn't receive your Locked Or Not device number.
                    Please update your information and provide the Locked Or Not device number.";

        }
        $unlocked_devices   =   $user->devices()->unlocked();
        $device_status      =   $unlocked_devices->count() == 0 ? 'locked' : 'unlocked';

        return view('profile.edit', compact('user', 'no_device', 'device_status', 'msg'))->withTitle('Update profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProfileRequest|Request $request
     * @param  int $id
     * @return Response
     */
    public function update( ProfileRequest $request, $id)
    {
        $user = $this->authUser;
        $user->update($request->all());
        $q = $request->get('quantity');

        for($i=1;$i <= $q; ++$i){
            $device = Device::create([
                'device_nr' => $request->get('device_nr').'-'.$i
            ]);

            $user->devices()->save($device);
        }

        $user->save();


        Session::flash('message', 'You have successfully updated your profile.');
        Session::flash('alert-class', 'alert-success');

        return redirect()->back();

    }

    public function editMyLogin($name)
    {

        $user               =   $this->authUser;
        $no_device          =   empty($user->devices) || is_null($user->devices);
        $unlocked_devices   =   $user->devices()->unlocked();
        $device_status      =   $unlocked_devices->count() == 0 ? 'locked' : 'unlocked';
        return view('profile.edit-login', compact('user', 'no_device', 'device_status'));
    }

    public function updateMyLogin( Request $request, $id)
    {

//        dd($request->get('password'));
        $user =  $this->authUser;

        if(empty($request->get('password'))){
            $user->email = $request->get('email');
            $user->save();
        }

        $user->update($request->all());
        return redirect()->to('how-i\'m-doing');
    }
}
