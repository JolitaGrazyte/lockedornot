@extends('layouts.dashboard')

@section('title', 'Stats')

@section('content')

    {{--<div class="row">--}}
        {{--<div class="col-lg-12">--}}
            {{--{{ $msg }}--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                How i'm doing ?
            </h2>
            <h4 class="o-font" style="margin-left: 20px;">
                my overall statistics
            </h4>
        </div>

        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->


    <div class="col-lg-4 pull-right">
        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-{{ $support['color'] }} center border-alert panel-msg">
                    <div class="panel-heading">
                        <h4>
                            <em> {{ $support['msg'] }} </em>
                        </h4>
                        <hr>

                        {{--Todo--}}
                        <p>About 100 other users did this year better then you.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 right">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default text-right" style="padding-right: 20px">
                    <h2>My car</h2>
                    <ul>
                        <li> lon device nr.:</li>
                        <li>
                            color: dark-blue
                        </li>
                        <li>
                            brand: volvo
                        </li>
                        <li>status: <span class="{{ $device_status }}"><em><strong>{{ $device_status }}</strong></em></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-8">

        <div class="row">

        @foreach($panels as $panel)

            <div class="col-lg-3 col-sm-6">
                <div class="panel panel-{{ $panel['color'] }}"
                     title="{{ $panel['title'] }}">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-12 text-right">
                                <div class="huge">{{ $panel['stats'] }}</div>
                                <hr>
                                <div>{{  $panel['name'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach

        </div>

        <div class="row">

            <div class="col-lg-12">

            @include('stats.progressbar')
            </div>
        </div>
    </div>

    <div class="row">
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading mostly-checking">
                Mostly checking: <em>on weekends</em>
                {{--Mostly checking: in the week days--}}
                <div class="pull-right">
                    <ul class="inline-list">
                        <li>see it:</li>
                        <li><a href="" class="active"><em>per week</em></a> | </li>
                        <li><a href="">per month</a> | </li>
                        <li><a href="">per year</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.panel-heading -->

            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">


                        @include('stats.mostly-checking-panel', ['total_daily' => $total_daily, 'days' => $days])

                    </div>
                    <!-- /.col-lg-8 (nested) -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->

    </div>
    <!-- /.col-lg-8 -->
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Donut Chart Example
            </div>
            <div class="panel-body">
                <div id="morris-donut-chart"></div>
                <a href="#" class="btn btn-default btn-block">View Details</a>
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
    </div>
    <!-- /.panel -->

@stop
