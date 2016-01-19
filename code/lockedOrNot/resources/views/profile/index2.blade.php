
@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

    <style>
        html, body{
            background-color: #FFF;
        }
        /*.dashboard-container .row:not(:first-child){*/
            /*!*border: red 1px dotted;*!*/
            /*margin-bottom: 25px;*/

        /*}*/

        [class^='col-lg']:not(.col-lg-12):not(.col-lg-6){
            /*border: seagreen 1px dotted;*/
            /*border: 1px #999 solid;*/
            /*min-height: 250px;*/
            padding: 15px;
            text-align: center;

        }
        .col-lg-12, .col-lg-6{
            min-height: 100px;
            border: 1px dotted #b5e8d4;
        }

        .navbar{
            background: #FFF;

        }
        .wrap
        {
            border:none;
            border-radius: 5px;
            background-color: #b5e8d4;
            box-shadow: 1px 1px 1px 1px #d6d6d6;
        }

        .info
        {
            border-radius: 5px;
            background-color:#f5f5f5;
            text-transform: capitalize;
            border: #b5e8d4 solid 1px;
        }
        .lockedPer, .openPer
        {
            color: white;
            font-size: 25px;
            min-height: 50px;
            text-transform: uppercase;
        }
        .row{
            padding: 1rem 0;
        }

        .progress-bar-success{
            background: #1cbb5f;
        }
        .progress{
            height: 30px;
        }
        .progress-bar{
            line-height: 30px;
            font-size: 1.5rem;
        }


    </style>
    <div class="container-fluid">

        <div class="dashboard-container">
            <div class="row">
                {{--<div class="col-lg-12">--}}
                    @include('partials.messages')
                {{--</div>--}}
                {{--<h2>My place</h2>--}}
            </div>

            <input id="user_id" type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            @if($no_device)
                <div class="row urgent-update">
                    <h3 class="urgent">You must urgently update your profile and add a device serial number for a further interaction. </h3>
                    <a href=""
                       data-toggle="modal"
                       data-target="#editModal">Update my info</a>

                </div>
            @else


                <div class="col-lg-3 col-sm-12 profile-my-info">
                    <h2>Me</h2>
                    <div>{{ Auth::user()->full_name }}</div>
                    <div>my device nr.: {{ substr(Auth::user()->devices->first()->device_nr, 0, 7) }}</div>

                    <div>
                        <a href=""
                           data-toggle="modal"
                           data-target="#editModal">Update my info</a>
                    </div>

                    <h2>My car</h2>
                    <div>{{ !is_null(Auth::user()->car_brand)? 'brand: '. Auth::user()->car_brand : '' }}</div>
                    <div>{{ !is_null(Auth::user()->car_color)? 'color: '.Auth::user()->car_color : '' }}</div>

                    <div>

                        <h2>My car status</h2>
                        <h3 class="{{ Auth::user()->devices()->unlocked()?'urgent':'' }}">{{$msg}}</h3>

                    </div>
                </div>
                <div class="col-lg-9 col-sm-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <h3>My satus: </h3>{{$status}}
                        </div>
                        <div class="col-lg-6">
                            <h3>
                                {{--Total times checked: {{ $stats_total }} --}}
                            </h3>
                        </div>

                        <div>
                            <h3>How i'm doing this month</h3>
                        </div>

                        <div class="col-lg-offset-1 col-lg-10 wrap">
                            <h3 style="text-align:left">Total times checked: {{ $stats_total }} </h3>
                            <div class="progress">
                                <div class="progress-bar progress-bar-success" role="progressbar" style="width:{{$percent_true}}%">
                                    open when checked
                                </div>
                                <div class="progress-bar progress-bar-danger" role="progressbar"style="width:{{$percent_false}}%">
                                    locked when cheched
                                </div>
                            </div>
                            <div class="openPer col-lg-1">{{$percent_true}}%</div>
                            <div class="lockedPer col-lg-1 col-lg-offset-9">{{$percent_false}}%</div>

                            <div class="col-lg-3 info">
                                {{ $stats_total}}
                                <p class="text-info">checked</p>
                            </div>
                            <div class="col-lg-3 info">
                                {{$stats_true}}
                                <p class="text-success"> open </p>
                            </div>
                            <div class="col-lg-3 info" style="">
                                {{$paranoia_stats}}
                                <p class="text-success"> locked </p>
                            </div>
                            <div class="col-lg-3 info">
                                Forget-me-lockje
                                <p class="text-info">status</p>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6"></div>
                        <div class="col-lg-6"></div>
                    </div>
                </div>
            @endif
        </div>
    </div>

@stop
