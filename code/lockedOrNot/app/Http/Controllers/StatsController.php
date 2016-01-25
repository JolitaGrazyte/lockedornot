<?php

namespace App\Http\Controllers;

use App\Stats;
use App\UserStatusMsg;
use Carbon\Carbon;
use App\Http\Requests;
use App\User;
use Auth;
use Response;
use DB;
use App\StatusEnum;


class StatsController extends Controller
{
    private $authUser;

    public function __construct(){

        $this->authUser = Auth::check() ? Auth::user() : null;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Stats $stats_model
     * @param null $filter
     * @param null $side
     * @param null $nr
     * @return Response
     */
    public function index(Stats $stats_model, $filter = null, $side = null, $nr = null)
    {
        $user = $this->authUser;
        $days = $stats_model->days();

        $w_nr   = $this->getWeek($side, $nr);

        $userBusiestDay  =  $user->stats()->busiestDay()->first()->date;
        $busiestDay      =  $stats_model->busiestDay()->first()->date;

        $userBusiestMonth   =   $user->stats()->busiestMonth()->first()->month;
        $userBusiestMonth   =   date("M", strtotime($userBusiestMonth)).' 2016';

        $busiestMonth       =   $stats_model->busiestMonth()->first()->month;
        $busiestMonth       =   date("M", strtotime($busiestMonth)).' 2016';


        $weekOrWeekend = [
            'weekend' => $user->stats()->weekend()->count(),
            'weekdays' => $user->stats()->week()->count(),
        ];

//      dd($weekOrWeekend);

        $no_device      = empty($user->devices->first()) || is_null($user->devices->first());
        $device_state   = false;


//      dd($no_device);

        $device_status = false;
        if($no_device){
            $msg = "It happened so, that we didn't receive your Locked Or Not device number.
                    Please update your information and provide the Locked Or Not device number.";
            return view('profile.edit', compact('user', 'msg', 'no_device', 'device_status'));
        }
        else{

            $unlocked_devices = $user->devices()->unlocked();

            $msg            =   $unlocked_devices->count() == 0 ? "": "Oops, looks like your car is not locked yet! You might wanna do somethin' about it...";
            $device_status  =   $unlocked_devices->count() == 0 ? 'locked' : 'unlocked';

            $stats          = $this->authUser->stats;
            $unlocked       = $user->stats()->unlockedStats()->count(); // car open == 0
            $locked         = $user->stats()->lockedStats()->count(); // car locked == 1
            $stats_total    = $stats->count();
            $percent_true   = $stats_total != 0 ? $this->countPercent( $unlocked, $stats_total) : 0;
            $percent_false  = $stats_total != 0 ? $this->countPercent( $locked, $stats_total) : 0;
            $total_daily    = $this->filteredStats($user, $filter, $w_nr, $days);

            $status         = $this->getUserStatus($percent_false);
            $didBetterCount =  $this->getOthersPercent($user, $percent_true, $percent_false);
            $support        = $this->getUserStatusAndMsg($percent_false, $user, $didBetterCount);
            $panels         = $this->getPanels($user, $support);

        }


        $pretty_user_name = str_replace(' ', '-', $user->full_name);

        if(empty($total_daily)){
            $msg = "At the moment you still don't have any status. This is maybe because you are a new user and haven't used our app at all.";
        }


        return view('stats.index',
            compact(
                'user',
                'unlocked',
                'locked',
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
                'device_status',
                'userBusiestDay',
                'busiestDay',
                'userBusiestMonth',
                'busiestMonth',
                'weekOrWeekend',
                'pretty_user_name',
                'w_nr',
                'filter'
            ));
    }


    private function filteredStats($user, $filter, $nr, $days){

        $stats = [];

            foreach($days as $key => $day){

                if(is_null($filter)){

                    $stats[$day] = [
                        'total'     => $user->stats()->weekday($key-1)->count(),
                        'locked'    => $user->stats()->weekdayLocked($key-1)->count(),
                        'unlocked'  => $user->stats()->weekdayUnlocked($key-1)->count()
                    ];
                }
                else{

                    $subFilter = 'sub'.$filter.'s';
                    $carbon = Carbon::now()->$subFilter($nr);
//                    dd(Carbon::now()->subYears(2)->diffForHumans());

                    if($filter == 'week') $f = $carbon->weekOfYear;
                    else{
                        $f = $carbon->$filter;
                    }


                    $scope = $filter.'lyStats';

                    $stats[$day] = [
                        'total'     => $user->stats()->$scope($f, $key-1)->count(),
                        'locked'    => $user->stats()->lockedStats()->$scope($f, $key-1)->count(),
                        'unlocked'  => $user->stats()->unlockedStats()->$scope($f, $key-1)->count(),
                        'diff'      =>  $carbon->diffForHumans()
                    ];
                }

            }

        return $stats;
    }

    private function countPercent( $stats, $total){

        $p          =   100/$total*$stats;
        $percent    =   round($p);

        return $percent;
    }

    private function getOthersPercent($user, $p_unlocked, $p_locked){

        $stats = [];
        $date = Carbon::now()->subMonths(12);
//        dd($year);

        $othersAllStats         = User::othersStats($user, $date)->get();
//        dd($othersAllStats);

        $i_better = 0;
        $others_better = 0;


        foreach($othersAllStats as $user){

            $locked     = $user->stats()->lockedPastYear($date)->count();
            $unlocked   = $user->stats()->unlockedPastYear($date)->count();
            $total      = $user->stats()->count();
            $others_p_unlocked =  $this->countPercent( $unlocked, $total);
            $other_p_locked     = $this->countPercent( $locked, $total);

            if($p_unlocked < $others_p_unlocked || $p_locked > $other_p_locked){
                $i_better += 1;
            }
            else{
                $others_better += 1;
            }



        }
        $stats = ['others-did-better' =>$others_better, 'i-did-better' => $i_better];

        return $stats;
    }


    private function getWeek($side, $nr){

        if(is_null($side) && is_null($nr) || $nr == 53) $w_nr = 0;
        elseif($side == 'prev' && $nr < 53) $w_nr = $nr+1;
        elseif($side == 'fw' && $nr > 0) $w_nr = $nr-1;
        else $w_nr = 0;

        return $w_nr;
    }


    private function getPanels($user, $status){

//        dd($status);
        $stats = $user->stats;
        $stats_true     = $user->stats()->unlockedStats()->count(); // car open == 0
        $locked_stats   = $user->stats()->lockedStats()->count(); // car locked == 1
        $stats_total    = $stats->count();

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
                'color' =>  $status['color'],
                'stats' =>  $status['status'],
                'name'  =>  'Your status'
            ],
        ];
    }

    private function getUserStatus($percent_true)
    {
        if($percent_true == 0 ) $status = 'New Locker';

        if($percent_true > 0 && $percent_true < 10 ){
            $status = StatusEnum::PROBLEM_LOCKER;
        }


        if($percent_true >= 20 && $percent_true <= 49){
            $status = StatusEnum::TROUBLE_LOCKER;
        }


        if($percent_true == 50){
            $status = StatusEnum::OK_LOCKER;

        }

        if($percent_true > 50 && $percent_true < 80){
            $status = StatusEnum::VICE_LOCKER;
        }

        if($percent_true >= 80){

            $status = StatusEnum::TOP_LOCKER;
        }

//        dd($status);

        return $status;
    }


    private function getUserStatusAndMsg($percent_true, $user, $did_better)
    {
        $name  =    $user->first_name;
        $status = $this->getUserStatus($percent_true);


        return UserStatusMsg::getMsg($status, $name, $did_better);

    }

    public function personal_stats_json($id)
    {
        $user = User::find($id);

        $stats = [
            'user' => [
                'weekend'   => $user->stats()->weekend()->count(),
                'weekdays'  => $user->stats()->week()->count(),
            ],

            'all_users'  => [
                'weekend'   => Stats::weekend() ->where('user_id', '!=', Auth::user()->id)->count(),
                'weekdays'  => Stats::week() ->where('user_id', '!=', Auth::user()->id)->count(),
            ]

        ];


        return Response::json($stats);
    }

}
