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
     * @param Stats $stats_model
     * @return Response
     */
    public function index(Stats $stats_model)
    {
        $user           = $this->authUser;

        $msg = "At the moment you still don't have any status. This is maybe because you are a new user and haven't used our app at all.";

        $no_device      = empty($user->devices) && is_null($user->devices);
        $device_state   = false;
//        dd($user->monthlyStats(1)->get());
        $stats_obj = $stats_model;
        $days = $stats_obj->days();
//        dd($days[1]);

        if($no_device){
            $msg = "It happened so, that we didn't receive your Locked Or Not device number.
                    Please update your information and provide the Locked Or Not device number.";
        }
        else{

            $unlocked_devices = $user->devices()->unlocked();

            $msg            =   $unlocked_devices->count() == 0 ? 'Your car is locked now!': 'Oops, your car is unlocked!';
            $device_status  =   $unlocked_devices->count() == 0 ? 'locked' : 'unlocked';

            $stats          = $this->authUser->stats;
            $stats_true     = $user->unlockedStats()->count(); // car open == 0
            $locked_stats   = $user->lockedStats()->count(); // car locked == 1
            $stats_total    = $stats->count();
            $percent_true   = $stats_total != 0 ? $stats_true*100/$stats_total : 0;
            $percent_true = round($percent_true);

            foreach($days as $key => $day){

                $total_daily[$day] = $user->weekDayStats($key-1)->count();

            }

        }

        $percent_false  = 100 - round($percent_true);

        $status = $this->getUserStatus($percent_true);
        $panels = $this->getPanels($user, $status);
        $support = $this->getUserStatusAndMsg($percent_true, $user);


        return view('stats.index',
            compact(
                'stats_true',
                'locked_stats',
                'stats_total',
                'device_state',
                'percent_true',
                'msg',
                'days',
                'no_device',
                'percent_false',
                'status',
                'support',
                'panels',
                'days',
                'total_daily',
                'device_status'
            ));
    }

    private function getPanels($user, $status){

        $stats = $user->stats;
//        $stats_true     = $user->unlockedStats()->count(); // car open == 0
        $locked_stats   = $user->lockedStats()->count(); // car locked == 1
        $stats_total    = $stats->count();
        $stats_true = $stats_total-$locked_stats;

        return [
            [
                'title' => "The total times you've checked.",
                'color' => 'blue',
                'stats' => $stats_total,
                'name'  => 'Total times checked'

            ],
            [
                'title' =>  "The total times you've checked and your car was locked.",
                'color' =>  'green',
                'stats' =>  $locked_stats,
                'name'  =>  'Locked when checked'
            ],
            [
                'title' =>  "The total times you've checked and your car wasn't locked.",
                'color' =>  'red',
                'stats' =>  $stats_true,
                'name'  =>  'Open when checked'
            ],
            [
                'title' =>  "This is your status that depends on your statistics.",
                'color' =>  'salmon',
                'stats' =>  $status,
                'name'  =>  'Your status'
            ],
        ];
    }

    private function getUserStatus($percent_true)
    {

        if($percent_true < 10){
            $status = StatusEnum::PROBLEM_LOCKER;
        }


        if($percent_true >= 10 && $percent_true <= 30){
            $status = StatusEnum::TROUBLE_LOCKER;
        }


        if($percent_true >= 30 && $percent_true <= 65){
            $status = StatusEnum::OK_LOCKER;

        }

        if($percent_true >= 65 && $percent_true < 80){
            $status = StatusEnum::VICE_LOCKER;
        }

        if($percent_true >= 80){

            $status = StatusEnum::TOP_LOCKER;
        }

//        dd($status);

        return $status;
    }

    private function getUserStatusAndMsg($percent_true, $user)
    {
        $name  =    $user->first_name;
        $status = $this->getUserStatus($percent_true);


        switch($status){
            case 'Problem locker':
                return [
                    'status' => $status,
                    "msg"     =>  "Oh no, ".$name.", the most of time your car was unlocked when checking.
                              You really should be considering some action, my friend...",
                    "compare_msg"   =>  '... many people did better then you over past year.',
                    'color'   =>  'red'

                ];
                break;

            case 'Trouble locker':
                return [
                    'status' => $status,
                    "msg"    =>  "Hmm, ". $name .", looks like even more then a half of the time you forget to lock your car.
                             You might wanna do somethin' about it...",
                    "compare_msg"   =>  '... many people did better then you over past year.',
                    'color'  =>  'red'

                ];
                break;

            case 'Ok locker':
                return [
                    'status'        =>  $status,
                    "msg"           =>  "Hmm, ". $name .", looks like about a half of the time you forget to lock your car. You definitely can do beter then that...",
                    "compare_msg"   =>  '... many people did better then you over past year.',
                    'color'         =>  'salmon'

                ];
                break;

            case 'Vice locker':
                return [
                    'status' =>  $status,
                    'msg'    =>  "Hi ". $name. ", nice job. Most of the time you don't forget to lock your car. But you could do even better...",
                    "compare_msg"   =>  '... many people did better then you over past year.',
                    'color'  =>  "green"
                ];
                break;

            case 'Top locker':
                return [
                    'status' =>  $status,
                    'msg'    =>  "Hi ". $name. ", nice job. Most of the time you don't forget to lock your car. That's really fine.",
                    "compare_msg"   =>  '... many people did better then you over past year.',
                    'color'  =>  "green"
                ];
                break;
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @internal param string $name
     */
    public function edit($name)
    {
        $user = $this->authUser;
        $no_device      = empty($user->devices) && is_null($user->devices);
        return view('profile.edit', compact('user', 'no_device'))->withTitle('Update profile');
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


    public function updatePassword(){

    }

}
