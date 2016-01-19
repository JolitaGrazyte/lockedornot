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

        $status = "At the moment you still don't have any status. This is maybe because you are a new user and haven't used our app at all.";

        $no_device      = empty($user->devices) && is_null($user->devices);
        $device_state   = false;
//        dd($user->monthlyStats(1)->get());
        $stats_obj = $stats_model;
        $days = $stats_obj->days();
//        dd($days[1]);

        if(!$no_device){

            $unlocked_devices = $user->devices()->unlocked();
            $msg = $unlocked_devices->count() == 0 ? 'Your car is locked now!': 'Oops, your car is unlocked!';
            $stats = $this->authUser->stats;

//            dd($stats->first()->created_at->format('D'));

//            $device = $user->devices;
//            dd($device);

            $stats_true     = $user->unlockedStats()->count(); // car open == 0
            $paranoia_stats = $user->paranoiaStats()->count(); // car locked == 1
            $stats_total    = $stats->count();
            $percent_true   = $stats_total != 0 ? $stats_true*100/$stats_total : 0;

            $st   = new Stats();
            $days = $st->days();

            foreach($days as $key => $day){

                $totaL_daily[$day] = $user->weekDayStats($key-1)->count();

            }
//            dd($totaL_daily);
        }
        else{
            $msg = "It happened so, that we didn't receive your Locked Or Not device number.
                    Please update your information and provide the Locked Or Not device number.";
        }
//        $stats_true = 1;
//        $stats_false = 1;
//        $percent_true = 50;


        $percent_false  = 100 - $percent_true;


        $panels = $this->getPanels($user);
        $support = $this->getUserStatusAndMsg($percent_true);
//        dd($support);

        return view('stats.index',
            compact(
                'stats_true',
                'paranoia_stats',
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
                'totaL_daily'
            ));
    }

    private function getPanels($user){

        $stats = $user->stats;
        $stats_true     = $user->unlockedStats()->count(); // car open == 0
        $paranoia_stats = $user->paranoiaStats()->count(); // car locked == 1
        $stats_total    = $stats->count();


        $status = StatusEnum::OK_LOCKER;
        return [
            [
                'title' => "The total times you've checked and your car was locked.",
                'color' => 'blue',
                'stats' => $stats_total,
                'name'  => 'Total times checked'

            ],
            [
                'title' =>  "The total times you've checked and your car was locked.",
                'color' =>   'green',
                'stats' =>  $paranoia_stats,
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



    private function getUserStatusAndMsg($percent_true){

        $user  =    $this->authUser;
        $name  =    $user->first_name;

        if($percent_true >= 10){
            $status = [
                'status' => StatusEnum::PROBLEM_LOCKER,
                "msg"     =>  "Oh no, ".$name.", the most of time your car was unlocked when checking.
                              You really should be considering some action, my friend...",
                "compare_msg"   =>  '... many people did better then you over past year.',
                'color'   =>  'red'

            ];
        }


        if($percent_true >= 10 && $percent_true <= 30){
            $status = [
                'status' => StatusEnum::TROUBLE_LOCKER,
                "msg"    =>  "Hmm, ". $name .", looks like even more then a half of the time you forget to lock your car.
                             You might wanna do somethin' about it...",
                "compare_msg"   =>  '... many people did better then you over past year.',
                'color'  =>  'red'

            ];
        }


        if($percent_true >= 30 && $percent_true <= 65){
            $status = [
                'status'        =>  StatusEnum::OK_LOCKER,
                "msg"           =>  "Hmm, ". $name .", looks like about a half of the time you forget to lock your car.",
                "compare_msg"   =>  '... many people did better then you over past year.',
                'color'         =>  'salmon'

            ];
        }

        if($percent_true >= 65 && $percent_true < 80){
            $status = [
                'status' =>  StatusEnum::VICE_LOCKER,
                'msg'    =>  "Hi ". $name. ", nice job. Most of the time you don't forget to lock your car. But you could do even better...",
                "compare_msg"   =>  '... many people did better then you over past year.',
                'color'  =>  "green"
            ];
        }

        if($percent_true >= 80){

            $status = [
                'status' =>  StatusEnum::TOP_LOCKER,
                'msg'    =>  "Hi ". $name. ", nice job. Most of the time you don't forget to lock your car. That's really fine.",
                "compare_msg"   =>  '... many people did better then you over past year.',
                'color'  =>  "green"
            ];
        }

        return $status;
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
