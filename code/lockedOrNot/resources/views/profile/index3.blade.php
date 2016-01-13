<<<<<<< HEAD
	
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
            border: white 1px solid;
            /*min-height: 250px;*/
            padding: 15px;
            text-align: center;

        }
        .col-lg-8{
            height: 500px;
        }
        .navbar{
            background: #FFF;
            min-height: 100px;
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

        .wrap
        {
        	border:none;
        	border-radius: 5px;
        	background-color: #66c0cf;
        }

        .info
        {
    		border-radius: 5px;
        	background-color:#f5f5f5;
        	text-transform: capitalize;
        }
        .lockedPer, .openPer
        {
        	color: white;
        	font-size: 25px;
        	min-height: 50px;
        	text-transform: uppercase;
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

            @if(is_null(Auth::user()->devices))
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
                    <!-- <div class="col-lg-6">
                        <h3>Total times checked: {{ $stats_total }} </h3>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <h3>How many times per month i checked</h3>
                        <!-- <div id="total-chart"></div> -->
                        <div class="row">
                        	<div class="col-lg-offset-1 col-lg-10 wrap">
								<div class="progress">
		                          <div class="progress-bar progress-bar-success" role="progressbar" style="width:{{$percent_true}}%">
		                            open when checked
		                          </div>
		                          <div class="progress-bar progress-bar-danger" role="progressbar"style="width:{{$percent_false}}%">
		                            locked when cheched
		                          </div>
		                        </div>
		                        <div class="col-sm-1 col-lg-1 openPer" style="border:none;">{{$percent_true}}%</div>
                        		<div class="col-sm-offset-9 col-sm-1 col-lg-offset-9 col-lg-1  lockedPer" style="border:none; ">{{$percent_false}}%</div>
                        	
		                        <div class="col-lg-3 info" style="border: #66c0cf solid 1px;">
		                        {{ $stats_total}}
	                        	<p class="text-info">checked</p> 
		                        </div>
		                        <div class="col-lg-3 info" style="border: #66c0cf solid 1px;">
		                       	{{$stats_true}}
		                       	<p class="text-success"> open </p>
		                        </div>
		                        <div class="col-lg-3 info" style="border: #66c0cf solid 1px;">
		                        {{$paranoia_stats}}
		                       	<p class="text-success"> locked </p>
		                        </div>
		                        <div class="col-lg-3 info" style="border: #66c0cf solid 1px;">
		                        Forget-me-lockje
		                        <p class="text-info">status</p> 
		                        </div>
	                        </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h2>Me</h2>
                        <div>{{ Auth::user()->full_name }}</div>
                        {{--<div>my device nr.: {{Auth::user()->device->device_nr}}</div>--}}

                        <h2>My car</h2>

                        <div>

                        <h3 class="{{ Auth::user()->devices()->unlocked()?'urgent':'' }}">{{$msg}}</h3>

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

                {{--<div id="punch-chart"></div>--}}

                {{--<h2>How many times per day</h2>--}}
                {{--<div id="chartdiv"></div>--}}


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
=======

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
>>>>>>> f2a9bb577ef7b3b3ebe0f26a51bc1a8d1c6aa094
