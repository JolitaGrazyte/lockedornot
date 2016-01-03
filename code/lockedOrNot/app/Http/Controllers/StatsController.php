<?php

namespace App\Http\Controllers;

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

        $car_color_stats = $this->all_stats('car_color');
        $car_brand_stats = $this->all_stats('car_brand');
        $city_stats  = $this->all_stats('city');
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

//        dd($sort);
//        $distincts = $this->user->select($sort)
//            ->groupBy($sort)
//            ->get();
//            ->distinct()->get();

       $distincts = DB::table('users')
           ->select(DB::raw( 'count('.$sort.') as value, '.$sort))
           ->groupBy($sort)
           ->get();

//        dd($distincts);

        $jsonstats = Response::json($distincts);
//        dd($jsonstats);

//       return $jsonstats;

//       return json_encode($distincts);

       return Response::json($distincts);


    }

    public function personalStats($name)
    {
        $stats = [];
        return $stats;
    }

}
