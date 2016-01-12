
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
        .col-lg-12, .col-lg-6{
            min-height: 100px;
            border: 1px dotted #269abc;
        }

        .navbar{
            background: #FFF;
        }


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
                    <h3 class="urgent">You must urgently update your profile and add a device serial number for a further interaction. </h3>
                    <a href=""
                       data-toggle="modal"
                       data-target="#editModal">Update my info</a>

                </div>
            @else


                <div class="col-lg-4 col-sm-12 profile-my-info">
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
                <div class="col-lg-8 col-sm-12">
                    <div class="row">
                        <div class="col-lg-6"><h2>My personal stats</h2></div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <h3>My satus: </h3>{{$status}}
                        </div>
                        <div class="col-lg-6">
                            <h3>Total times checked: {{ $stats_total }} </h3>
                        </div>
                        <h3>How many times per month i have checked</h3>
                        <!-- <div id="total-chart"></div> -->
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger" role="progressbar" style="width:{{$percent_true}}%">
                                open when checked
                            </div>
                            <div class="progress-bar progress-bar-success" role="progressbar" style="width:{{$percent_false}}%">
                                locked when checked
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

@stop

{{--@section('scripts')--}}
{{--@parent--}}
{{--<script type="text/javascript" src='{{url('js/Chart.min.js')}}'></script>--}}

{{--<script src="http://code.highcharts.com/highcharts.js"></script>--}}
{{--<script src="http://code.highcharts.com/highcharts-more.js"></script>--}}
{{--<script src="http://code.highcharts.com/modules/exporting.js"></script>--}}
{{--<script src="{{url('js/stats/punch-stats.js')}}"></script>--}}
{{--<script src="{{ url('js/stats/pie-chart.js') }}"></script>--}}
{{--<script src="{{ url('js/stats/total-stats.js') }}"></script>--}}

{{--<script src="http://www.amcharts.com/lib/3/amcharts.js" type="text/javascript"></script>--}}
{{--<script src="http://www.amcharts.com/lib/3/serial.js" type="text/javascript"></script>--}}
{{--<script src="https://www.amcharts.com/lib/3/themes/dark.js"></script>--}}
{{--<script src="http://www.amcharts.com/lib/3/amstock.js" type="text/javascript"></script>--}}

{{--<script>--}}

{{--</script>--}}
{{--<script src="{{ url('js/am-charts-stats/total-stats.js') }}"></script>--}}


{{--@stop--}}