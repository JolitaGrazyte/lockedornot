<?php

namespace App\Http\Controllers;

use App\Device;
use App\Stats;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ProfileRequest;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Response;
use Session;
use App\StatusEnum;

class ProfileController extends Controller
{

    private $authUser;

    public function __construct(){

        $this->authUser = Auth::check() ? Auth::user() : null;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user           = $this->authUser;
//        $msg            = '';
////        $stats_total    = 0;
////        $paranoia_stats = 0;
////        $stats_true     = 0;
        $status = "At the moment you still don't have any status. This is maybe because you are a new user and haven't used our app at all.";

        $no_device = empty($user->devices) && is_null($user->devices);
        $device_state = false;
//        dd($user->monthlyStats(1)->get());

        if(!$no_device){

            $unlocked_devices = $user->devices()->unlocked();
            $msg = $unlocked_devices->count() == 0 ? 'Your car is locked yet!': 'Your car is unlocked yet!';
            $stats = $this->authUser->stats;

//            $device = $user->devices;
//            dd($device);

            $stats_true     = $user->unlockedStats()->count();
            $paranoia_stats = $user->paranoiaStats()->count();
            $stats_total    = $stats->count();
            $percent_true   = $stats_total != 0 ? $stats_true*100/$stats_total : 0;
            $st = new Stats();
            $days = $st->days();
        }
        else{
            $msg = "It happened so, that we didn't receive your Locked Or Not device number.
                    Please update your information and provide the Locked Or Not device number.";
        }
        $stats_true = 20;
        $percent_true = 20;
        $percent_false  = 100 - $percent_true;

        if($stats_true >= 10) $status = StatusEnum::TOP_LOCKER;
        if($stats_true >= 10 && $stats_true < 40) $status = StatusEnum::VICE_LOCKER;
        if($stats_true >= 40 && $stats_true <= 80) $status = StatusEnum::OK_LOCKER;
        if($stats_true >= 80 && $stats_true <= 100) $status = StatusEnum::PARANOID_LOCKER;

        return view('profile.index2',
            compact('stats_true', 'paranoia_stats', 'stats_total', 'device_state', 'percent_true', 'msg', 'days', 'no_device', 'percent_false', 'status'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @internal param string $name
     */
    public function edit()
    {
        $user = $this->authUser;
        return view('profile.edit')->withUser($user);
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

//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        //
//    }


    public function updatePassword(){

    }

}
