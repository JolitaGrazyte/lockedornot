
@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

    <style>
        html, body{
            background-color: #e6e6e6;
        }
        .dashboard-container .row:not(:first-child){
            /*border: red 1px dotted;*/
            margin-bottom: 25px;

        }

        [class^='col-lg']:not(.col-lg-12):not(.col-lg-6){
            border: seagreen 1px dotted;
            min-height: 250px;
            padding: 15px;
            text-align: center;

        }
        .col-lg-8{
            height: 500px;
        }
        .navbar{
            background: #FFF;
        }

        tr, td{
            border: 1px gray solid;
        }
        td{
            width: 100px;
        }
        tr{
            height: 50px;
        }

        #chartdiv{
            width: 100%;
            height: 540px;
            background: #333;
            box-shadow: 2px 2px 2px 2px #222;
        }
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

            @if(is_null(Auth::user()->device))
                <div class="row urgent-update">
                    <h3 class="urgent">You must urgently update your profile and add a device serial number for a further interaction. </h3>
                    <a href=""
                       data-toggle="modal"
                       data-target="#editModal">Update my info</a>

                </div>
            @else

                <div class="row">
                        {{--<div class="col-lg-4 col-lg-offset-4">--}}
                            {{--<h2>Me</h2>--}}
                            {{--<div>{{ Auth::user()->full_name }}</div>--}}
                            {{--<div>my device nr.: {{Auth::user()->device->device_nr}}</div>--}}

                            {{--<h2>My car</h2>--}}

                            {{--<div>--}}

                            {{--<h3 class="{{ Auth::user()->device->state == 0?'urgent':'' }}">{{$msg}}</h3>--}}

                            {{--</div>--}}
                            {{--<hr>--}}

                            {{--<a href=""--}}
                               {{--data-toggle="modal"--}}
                               {{--data-target="#editModal">update my info</a>--}}
                        {{--</div>--}}
                    {{--<div class="col-lg-4">--}}
                        {{--<h2>My car</h2>--}}

                        {{--<div>--}}

                            {{--<h3 class="{{ Auth::user()->device->state == 0?'urgent':'' }}">{{$msg}}</h3>--}}

                        {{--</div>--}}
                    {{--</div>--}}
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
                    <div class="col-lg-4">
                        <h2>Me</h2>
                        <div>{{ Auth::user()->full_name }}</div>
                        <div>my device nr.: {{Auth::user()->device->device_nr}}</div>

                        <h2>My car</h2>

                        <div>

                        <h3 class="{{ Auth::user()->device->state == 0?'urgent':'' }}">{{$msg}}</h3>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h3>Paranoia vs real danger

                        </h3>
                        {{--<canvas id="pie-chart"></canvas>--}}
                        <canvas id="doughnut-chart"></canvas>
                    </div>

                    {{--<div class="col-lg-6">--}}
                        {{--<h3>Paranoia vs real danger--}}
                            {{--: {{ $paranoia_stats }} vs {{ $stats_true }}--}}
                        {{--</h3>--}}
                        {{--<canvas id="pie-chart"></canvas>--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-6">--}}
                        {{--<h3>Paranoia vs real danger percentage: {{ $percent_true }} %</h3>--}}
                        {{--<canvas id="doughnut-chart"></canvas>--}}
                    {{--</div>--}}
                </div>

                <div id="punch-chart"></div>

                <h2>How many times per day</h2>
                <div id="chartdiv"></div>


            @endif


        </div>


    </div>

@stop

@section('scripts')
    @parent
    <script type="text/javascript" src='{{url('js/Chart.min.js')}}'></script>

    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/highcharts-more.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>
    <script src="{{url('js/stats/punch-stats.js')}}"></script>
    {{--<script src="{{ url('js/stats/pie-chart.js') }}"></script>--}}
    <script src="{{ url('js/stats/total-stats.js') }}"></script>

    <script src="http://www.amcharts.com/lib/3/amcharts.js" type="text/javascript"></script>
    <script src="http://www.amcharts.com/lib/3/serial.js" type="text/javascript"></script>
    <script src="https://www.amcharts.com/lib/3/themes/dark.js"></script>
    {{--<script src="http://www.amcharts.com/lib/3/amstock.js" type="text/javascript"></script>--}}

    <script>

    </script>
    <script src="{{ url('js/am-charts-stats/total-stats.js') }}"></script>


@stop