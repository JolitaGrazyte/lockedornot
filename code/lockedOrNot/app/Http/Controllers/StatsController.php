<?php

namespace App\Http\Controllers;

use App\Stats;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
     * @return Response
     */
    public function index(Stats $stats_model, $name = null, $filter = null)
    {

        $user = $this->authUser;
        $userBusiestDay  =  $user->stats()->busiestDay()->first()->date;

        $busiestDay      =  $stats_model->busiestDay()->first()->date;

        $userBusiestMonth   =   $user->stats()->busiestMonth()->first()->month;
        $userBusiestMonth   =   $monthName = date("M", strtotime($userBusiestMonth));

        $busiestMonth       =   $stats_model->busiestMonth()->first()->month;
        $busiestMonth       =   $monthName = date("F", strtotime($busiestMonth));



        $msg = "At the moment you still don't have any status. This is maybe because you are a new user and haven't used our app at all.";

        $no_device      = empty($user->devices->first()) || is_null($user->devices->first());
        $device_state   = false;

        $stats_obj = $stats_model;
        $days = $stats_obj->days();

        $othersLockedCount      = User::othersLocked($user)->count();
        $othersUnlockedCount    = User::othersUnlocked($user)->count();

//      dd($othersUnlockedCount);

//        dd($no_device);
        $device_status = false;
        if($no_device){
            $msg = "It happened so, that we didn't receive your Locked Or Not device number.
                    Please update your information and provide the Locked Or Not device number.";
            return view('profile.edit', compact('user', 'msg', 'no_device', 'device_status'));
        }
        else{

            $unlocked_devices = $user->devices()->unlocked();
//            dd($user->devices()->unlocked()->get());

            $msg            =   $unlocked_devices->count() == 0 ? "": "Oops, looks like your car is not locked yet! You might wanna do somethin' about it.";
            $device_status  =   $unlocked_devices->count() == 0 ? 'locked' : 'unlocked';

            $stats          = $this->authUser->stats;
            $stats_true     = $user->stats()->unlockedStats()->count(); // car open == 0
            $locked_stats   = $user->stats()->lockedStats()->count(); // car locked == 1
            $stats_total    = $stats->count();
            $percent_true   = $stats_total != 0 ? $locked_stats*100/$stats_total : 0;
            $percent_false  = $stats_total != 0 ? $stats_true*100/$stats_total : 0;
            $percent_false  = round($percent_false);
            $percent_true   = round($percent_true);


            foreach($days as $key => $day){

                $total_daily[$day] = [
                    'total'     => $user->stats()->weekday($key-1)->count(),
                    'locked'    => $user->stats()->weekdayLocked($key-1)->count(),
                    'unlocked'  => $user->stats()->weekdayUnlocked($key-1)->count()
                ];
            }


            $status = $this->getUserStatus($percent_true);
            $panels = $this->getPanels($user, $status);
            $support = $this->getUserStatusAndMsg($percent_true, $user);

        }


        return view('stats.index',
            compact(
                'user',
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
                'device_status',
                'userBusiestDay',
                'busiestDay',
                'userBusiestMonth',
                'busiestMonth'
            ));
    }

    private function getPanels($user, $status){

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
                'color' =>  'salmon',
                'stats' =>  $status,
                'name'  =>  'Your status'
            ],
        ];
    }

    private function getUserStatus($percent_true)
    {
        if($percent_true == 0 ) $status = 'New Locker';

        if($percent_true < 10 && $percent_true > 0 ){
            $status = StatusEnum::PROBLEM_LOCKER;
        }


        if($percent_true >= 10 && $percent_true <= 30){
            $status = StatusEnum::TROUBLE_LOCKER;
        }


        if($percent_true > 30 && $percent_true <= 65){
            $status = StatusEnum::OK_LOCKER;

        }

        if($percent_true > 65 && $percent_true < 80){
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
            case 'Problem Locker':
                return [
                    'status'        =>  $status,
                    "msg"           =>  "Oh no, ".$name.", the most of time your car was unlocked when checking.
                                        You really should be considering some action, my friend...",
                    "compare_msg"   =>  '... many people did better then you over past year.',
                    'color'         =>  'red'

                ];
                break;

            case 'Trouble Locker':
                return [
                    'status'        =>  $status,
                    "msg"           =>  "Hmm, ". $name .", looks like even more then a half of the time you forget to lock your car.
                                         You might wanna do somethin' about it...",
                    "compare_msg"   =>  '... many people did better then you over past year.',
                    'color'         =>  'red'

                ];
                break;

            case 'Ok Locker':
                return [
                    'status'        =>  $status,
                    "msg"           =>  "Hmm, ". $name .", looks like about a half of the time of even a little bit more you forget to lock your car.
                                        You definitely can do better then that...",
                    "compare_msg"   =>  '... many people did better then you over past year.',
                    'color'         =>  'salmon'

                ];
                break;

            case 'Vice Locker':
                return [
                    'status'        =>  $status,
                    'msg'           =>  "Hi ". $name. ", nice job. Most of the time you don't forget to lock your car.
                                        But you could do even better...",
                    "compare_msg"   =>  '... many people did better then you over past year.',
                    'color'         =>  "green"
                ];
                break;

            case 'Top Locker':
                return [
                    'status'        =>  $status,
                    'msg'           =>  "Hi ". $name. ", nice job. Most of the time you don't forget to lock your car. That's really fine.",
                    "compare_msg"   =>  '... many people did better then you over past year.',
                    'color'         =>  "green"
                ];
                break;

            case 'New Locker':
                return [
                    'status'        =>  $status,
                    'msg'           =>  "Hi ". $name. "! Your statistics are empty. Not much to say about you yet...
                                        First make a use of the Locked Or Not device. Come back later for your statistics.",
                    "compare_msg"   =>  '... many people did better then you over past year.',
                    'color'         =>  "green"
                ];
                break;
        }

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function _index()
    {
        $stats =  $this->json_stats();
        return view('stats.index', compact('stats'));
    }

    public function json_stats(){

        $car_color_stats    = $this->all_stats('car_color');
        $car_brand_stats    = $this->all_stats('car_brand');
        $city_stats         = $this->all_stats('city');
//
//        dd($car_brand_stats);
//
//        dd($car_color_stats);

//        dd($city_stats);

        return $car_color_stats;

    }

    /**
     * lookup how many different distinct colors or brands there are
     *
     * @param null $sort
     * @return mixed
     */
    private function all_stats($sort=null)
    {

       $distincts = DB::table('users')
           ->select(DB::raw( 'count('.$sort.') as value, '.$sort))
           ->groupBy($sort)
           ->get();

//        dd($distincts);

//        $jsonstats = Response::json($distincts);
//        dd($jsonstats);

//       return $jsonstats;

//       return json_encode($distincts);

       return Response::json($distincts);

    }

    public function personalStats($name, $filter){

        $stats='';
        return $stats;
    }
//
//    public function personalStats($name)
//    {
//        $stats = [];
//        $how_freq_check = 0;
//        $how_freq_true = 0;
//        $how_freq_false = 0;
//
//        return $stats;
//    }

//    public function personal_stats_json($id)
//    {
//        $stats = Stats::personalStats($id);
//
//        return Response::json($stats);
//    }
//
//    public function monthly_stats_json($id)
//    {
//        $paranoia       = [];
//        $real_danger    = [];
//
//        for($i=1; $i<= 12; ++$i){
//            $month = $i;
//            $paranoia_stats = Stats::statsMonthly($id, $month, 0);
//            $real_stats = Stats::statsMonthly($id, $month, 1);
//
//            $paranoia[]     = $paranoia_stats[0]->count;
//            $real_danger[]  = $real_stats[0]->count;
//            $total = $paranoia_stats[0]->count + $real_stats[0]->count;
//            $total_stats[] = $total;
//        }
//
//        $stats = ['paranoia'=>$paranoia, 'real_danger' => $real_danger, 'total_stats' => $total_stats ];
//
//
//        return Response::json($stats);
//    }
//
//    public function punch_stats_json($id)
//    {
////        $p_stats = Stats::statsHourly($id, 5, 22, 0);
////        dd($p_stats);
//
//        $interval = 3600000;
//
//        for($d=0; $d<7; ++$d){
//            for($h=0; $h<24; ++$h){
//
//                $p_stats[$d] = Stats::statsHourly($id, $d, $h, 0);
//                $paranoia[]     = ['y'=>$d , 'x'=> $interval * $h, 'marker'=>['radius'=> $p_stats[$d][0]->count*11]];
//
//                $r_stats[$d] = Stats::statsHourly($id, $d, $h, 1);
//                $real_danger[]     = ['y'=>$d , 'x'=> $interval * $h, 'marker'=>['radius'=> $r_stats[$d][0]->count*11]];
//
////                dd($p_stats[$d][0]->count);
//                $total = $p_stats[$d][0]->count + $r_stats[$d][0]->count;
//                $total_stats[] = ['y'=>$d , 'x'=> $interval * $h, 'marker'=>['radius'=> $total*11]];
//
//            }
//        }
//
////        dd($stats);
//        $stats = ['paranoia'=>$paranoia, 'real'=> $real_danger, 'total' => $total_stats ];
//
//        return Response::json($stats);
//
//    }

//    public function am_stats($id){
//
//        $paranoia       = [];
//        $real_danger    = [];
////
//        $stats = [];
//
//        $now = Carbon::now();
//
//                $month = $now->month;
//
//                for($d=1; $d<=8; ++$d){
//
//                    $day = $d;
//                    $paranoia_stats = Stats::statsDaily($id, $month, $day, 0);
//                    $real_stats     = Stats::statsDaily($id, $month, $day, 1);
//                    $total_stats    = Stats::statsDailyTotal($id, $month, $day);
//
//                    if($total_stats[0]->count != 0){
//
//                        $total[] = [
//                            'date'  => substr($total_stats[0]->created_at, 0, 10),
//                            'value' => $total_stats[0]->count,
//                            'state' => $total_stats[0]->device_state
//                        ];
//
//                        $stats[] = [
//                            'date'      =>  substr($total_stats[0]->created_at, 0, 10),
//                            'total'     =>  $total_stats[0]->count != 0 ? $total_stats[0]->count: 0,
//                            'paranoia'  =>  $paranoia_stats[0]->count != 0 ? $paranoia_stats[0]->count : 0,
//                            'real'      =>  $real_stats[0]->count != 0 ? $real_stats[0]->count : 0
//                        ];
//
//                    }
//
//                    if($paranoia_stats[0]->count != 0){
//                        $paranoia[] = [
//                            'date'  => substr($paranoia_stats[0]->created_at, 0, 10),
//                            'value' => $paranoia_stats[0]->count
//                        ];
//
//                    }
//
//                    if( $real_stats[0]->count != 0){
//                        $real_danger[]  = [
//                            'date'  => substr($real_stats[0]->created_at, 0, 10),
//                            'value' => $real_stats[0]->count
//                        ];
//                    }
//
//                }
//
//        return Response::json($stats);
//    }
}
