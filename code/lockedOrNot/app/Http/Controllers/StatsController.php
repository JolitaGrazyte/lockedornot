<?php

namespace App\Http\Controllers;

use App\Stats;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Response;
use DB;


class StatsController extends Controller
{
    private $user;

    public function __construct( User $user ){

        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

    public function personalStats($name)
    {
        $stats = [];
        $how_freq_check = 0;
        $how_freq_true = 0;
        $how_freq_false = 0;

        return $stats;
    }

    public function personal_stats_json($id)
    {
        $stats = Stats::personalStats($id);

        return Response::json($stats);
    }

    public function monthly_stats_json($id)
    {
        $paranoia       = [];
        $real_danger    = [];

        for($i=1; $i<= 12; ++$i){
            $month = $i;
            $paranoia_stats = Stats::statsMonthly($id, $month, 0);
            $real_stats = Stats::statsMonthly($id, $month, 1);

            $paranoia[]     = $paranoia_stats[0]->count;
            $real_danger[]  = $real_stats[0]->count;
            $total = $paranoia_stats[0]->count + $real_stats[0]->count;
            $total_stats[] = $total;
        }

        $stats = ['paranoia'=>$paranoia, 'real_danger' => $real_danger, 'total_stats' => $total_stats ];


        return Response::json($stats);
    }

    public function punch_stats_json($id)
    {
//        $p_stats = Stats::statsHourly($id, 5, 22, 0);
//        dd($p_stats);

        $interval = 3600000;

        for($d=0; $d<7; ++$d){
            for($h=0; $h<24; ++$h){

                $p_stats[$d] = Stats::statsHourly($id, $d, $h, 0);
                $paranoia[]     = ['y'=>$d , 'x'=> $interval * $h, 'marker'=>['radius'=> $p_stats[$d][0]->count*11]];

                $r_stats[$d] = Stats::statsHourly($id, $d, $h, 1);
                $real_danger[]     = ['y'=>$d , 'x'=> $interval * $h, 'marker'=>['radius'=> $r_stats[$d][0]->count*11]];

//                dd($p_stats[$d][0]->count);
                $total = $p_stats[$d][0]->count + $r_stats[$d][0]->count;
                $total_stats[] = ['y'=>$d , 'x'=> $interval * $h, 'marker'=>['radius'=> $total*11]];

            }
        }

//        dd($stats);
        $stats = ['paranoia'=>$paranoia, 'real'=> $real_danger, 'total' => $total_stats ];

        return Response::json($stats);

    }

    public function am_stats($id){

        $paranoia       = [];
        $real_danger    = [];
//
        $stats = [];

        $now = Carbon::now();

                $month = $now->month;

                for($d=1; $d<=8; ++$d){

                    $day = $d;
                    $paranoia_stats = Stats::statsDaily($id, $month, $day, 0);
                    $real_stats     = Stats::statsDaily($id, $month, $day, 1);
                    $total_stats    = Stats::statsDailyTotal($id, $month, $day);

                    if($total_stats[0]->count != 0){

                        $total[] = [
                            'date'  => substr($total_stats[0]->created_at, 0, 10),
                            'value' => $total_stats[0]->count,
                            'state' => $total_stats[0]->device_state
                        ];

                        $stats[] = [
                            'date'      =>  substr($total_stats[0]->created_at, 0, 10),
                            'total'     =>  $total_stats[0]->count != 0 ? $total_stats[0]->count: 0,
                            'paranoia'  =>  $paranoia_stats[0]->count != 0 ? $paranoia_stats[0]->count : 0,
                            'real'      =>  $real_stats[0]->count != 0 ? $real_stats[0]->count : 0
                        ];

                    }

                    if($paranoia_stats[0]->count != 0){
                        $paranoia[] = [
                            'date'  => substr($paranoia_stats[0]->created_at, 0, 10),
                            'value' => $paranoia_stats[0]->count
                        ];

                    }

                    if( $real_stats[0]->count != 0){
                        $real_danger[]  = [
                            'date'  => substr($real_stats[0]->created_at, 0, 10),
                            'value' => $real_stats[0]->count
                        ];
                    }

                }

        return Response::json($stats);
    }
}
