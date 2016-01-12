
@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

    <style>
        /*html, body{*/
            /*background-color: #e6e6e6;*/
        /*}*/
        /*.dashboard-container .row:not(:first-child){*/
            /*!*border: red 1px dotted;*!*/
            /*margin-bottom: 25px;*/

        /*}*/

        /*[class^='col-lg']:not(.col-lg-12):not(.col-lg-6){*/
            /*border: seagreen 1px dotted;*/
            /*min-height: 250px;*/
            /*padding: 15px;*/
            /*text-align: center;*/

        /*}*/
        /*.col-lg-8{*/
            /*height: 500px;*/
        /*}*/
        /*.navbar{*/
            /*background: #FFF;*/
        /*}*/

        /*tr, td{*/
            /*border: 1px gray solid;*/
        /*}*/
        /*td{*/
            /*width: 100px;*/
        /*}*/
        /*tr{*/
            /*height: 50px;*/
        /*}*/

        /*#chartdiv{*/
            /*width: 100%;*/
            /*height: 540px;*/
            /*background: #333;*/
            /*box-shadow: 2px 2px 2px 2px #222;*/
        /*}*/
        /*==== end of CHARTS ====*/
    </style>
    <div class="container-fluid">

        <div class="dashboard-container">
            <div class="row">
                <div class="col-lg-12">
                    @include('partials.messages')
                </div>
                {{--<h2>My place</h2>--}}
            </div>

            <input id="user_id" type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            @if($no_device)
                <div class="row urgent-update">
                    <h3 class="urgent">{{$msg}} </h3>
                    <a href=""
                       data-toggle="modal"
                       data-target="#editModal">Update my info</a>

                </div>
            @else


                <div class="col-lg-4">
                    <h2>Me</h2>
                    <div>{{ Auth::user()->full_name }}</div>
                    <div>my device nr.: {{ substr(Auth::user()->devices->first()->device_nr, 0, 7) }}</div>

                    <h2>My car</h2>
                    <div>{{ !is_null(Auth::user()->car_brand)? 'brand: '. Auth::user()->car_brand : '' }}</div>
                    <div>{{ !is_null(Auth::user()->car_color)? 'color: '.Auth::user()->car_color : '' }}</div>

                    <div>

                        <h3 class="{{ Auth::user()->devices()->unlocked()?'urgent':'' }}">{{$msg}}</h3>

                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-6"><h2>My personal stats</h2></div>
                    <div class="col-lg-6">
                        <h3>Total times checked: {{ $stats_total }} </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <h3>How many times per month i checked</h3>
                        <div id="total-chart"></div>
                    </div>

                </div>


            @endif


        </div>


    </div>

@stop
