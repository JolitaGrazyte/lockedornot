<?php

namespace App\Http\Controllers;

use App\Device;
use App\Stats;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\ProfileRequest;
use App\Http\Controllers\Controller;
use Auth;
//use Illuminate\Http\Response;
use Session;


class ProfileController extends Controller
{
    private $authUser;

    /**
     * ProfileController constructor.
     */
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
        $no_device          =   empty($user->devices->first()) || is_null($user->devices);

        $msg = '';
        if($no_device){
            $msg = trans('costum.no_nr');
        }

        $unlocked_devices   =   $user->devices()->unlocked();
        $device_status      =   $unlocked_devices->count() == 0 ? 'locked' : 'unlocked';

        return view('profile.edit', compact('user', 'no_device', 'device_status', 'msg'))->withTitle('Update profile');
    }

    /**
     * @param ProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update( ProfileRequest $request)
    {
        $user = $this->authUser;
        $user->update($request->all());
        $q = $request->get('quantity');

        //if you work with no central lock
        if($q>1){
            for($i=1;$i <= $q; ++$i){
                $device = Device::create([
                    'device_nr' => $request->get('device_nr').'-'.$i
                ]);

                $user->devices()->save($device);
            }
        }else{
            $device = Device::where('user_id',$user->id)->first();
            $device->device_nr = $request->get('device_nr');
            $device->save();
        }


        $user->save();


        Session::flash('message', 'You have successfully updated your profile.');
        Session::flash('alert-class', 'alert-success');

        return redirect()->back();

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editMyLogin()
    {

        $user               =   $this->authUser;
        $no_device          =   empty($user->devices) || is_null($user->devices);
        $unlocked_devices   =   $user->devices()->unlocked();
        $device_status      =   $unlocked_devices->count() == 0 ? 'locked' : 'unlocked';
        return view('profile.edit-login', compact('user', 'no_device', 'device_status'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateMyLogin(Request $request)
    {
        $user =  $this->authUser;
        if(!empty($request->get('email'))){
            $user->email = $request->get('email');
        }
        if(!empty($request->get('password'))){
            $user->password = Hash::make($request->get('email'));
        }

        $user->save();
        return redirect()->to('how-i\'m-doing');
    }
}
