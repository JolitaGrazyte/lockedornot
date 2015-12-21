<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Response;


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
//        $car_color_stats = $this->all_stats('car_color');
//        $car_brand_stats = $this->all_stats('car_brand');
////
////        dd($car_brand_stats);
////
////        dd($car_color_stats);
//
//        return $car_brand_stats;

        return view('stats.index');
    }

    public function json_stats(){

        $car_color_stats = $this->all_stats('car_color');
        $car_brand_stats = $this->all_stats('car_brand');
//
//        dd($car_brand_stats);
//
//        dd($car_color_stats);

        return $car_brand_stats;

    }


    function all_stats($sort=null){

        $stats = [];

        //lookup how many different distinct colors or brands there are
        $distincts = $this->user->select($sort)
            ->groupBy($sort)
            ->get();
//            ->distinct()->get();

//        dd($distincts);

        foreach($distincts as $distinct){

            if(!is_null($distinct[$sort]))
//                dd($distinct[$sort].', '.User::where($sort, $distinct[$sort])->count());

                $stats[$distinct[$sort]] = User::where($sort, $distinct[$sort])->count();

        }
//        dd(json_encode($stats));
        $jsonstats = Response::json($stats);
//        dd($jsonstats);

        return $jsonstats;

//        return $stats;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
