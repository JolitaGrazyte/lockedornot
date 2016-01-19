@extends('layouts.dashboard')

@section('title', 'Stats')

@section('content')

    <div class="row">
    <div class="col-lg-12">
    <h2 class="page-header">

    How i'm doing
    <!--<em> </em>-->
    </h2>
    <span style="margin-left:20px;">
    <em>
    my overall statistics
    </em>
    </span>
    </div>
    <!-- /.col-lg-12 -->

    </div>
    <!-- /.row -->

    <div class="col-lg-4 pull-right">
    <div class="row">
    <div class="col-lg-12">
    {{--<div class="panel panel-green center border-alert" style="padding: 1rem;">--}}
    {{--<div class="panel-heading">--}}
    {{--<h4>--}}
    {{--<p><em>--}}
    {{--Hi Jolita, nice job.--}}
    {{--</em></p>--}}
    {{--<p><em>--}}
    {{--Most of the time you don't forget to lock your car.--}}
    {{--</em></p>--}}
    <!--<em>-->
    <!--Hi Jolita. Hmm, looks like about a half of the time you forget to lock your car.-->
    <!--</em>-->
    <!--<em>-->
    <!--Hi Jolita. Oh no, the most of time your car was unlocked when checking.-->
    <!--</em>-->
    </h4>

    {{--<hr>--}}
    {{--<p>Only 23 others did this year better then you.</p>--}}
    {{--<p>You are however doing better then 65% of the users.</p>--}}
    {{--</div>--}}
    {{--</div>--}}

    <div class="panel panel-salmon center border-alert panel-msg">
    <div class="panel-heading">
    <h4>
        {{--<em> Hi Jolita, nice job. Most of the time you don't forget to lock your car.</em>--}}

    <em>
{{--    {{ $support }}--}}
    </em>
    {{--<em>--}}
    {{--Oh no, Jolita, the most of time your car was unlocked when checking.--}}
    {{--</em>--}}
    </h4>

    <hr>
    <p>About 100 other users did this year better then you.</p>
    </div>
    </div>

    {{--<div class="panel panel-red center border-alert" style="padding: 1rem;">--}}
    {{--<div class="panel-heading">--}}

    {{--<p><em>--}}
    {{--Hi Jolita.--}}
    {{--</em></p>--}}
    {{--<p><em>Oh no, seems like the most of time your car was unlocked when checking.</em></p>--}}
    {{--<hr>--}}
    {{--<p>About 100 others did this year better then you.</p>--}}
    {{--</div>--}}
    {{--</div>--}}

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
    <li>status: <span style="color: #97c4b0;"><em><strong>locked</strong></em></span></li>
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
                <div class="progress">

                    <div title="{{$percent_true}}%" class="progress-bar progress-bar-danger" role="progressbar" style="width:{{$percent_true}}%;">
                        open when checked
                    </div>

                    <div title="{{$percent_false}}%" class="progress-bar progress-bar-success" role="progressbar" style="width:{{$percent_false}}%;">
                        locked when cheched
                    </div>
                </div>
                <div class="bottom-padding">

                    <div class="pull-left">
                        <p> {{$percent_true}}% </p>
                    </div>

                    <div class="pull-right">
                        <p> {{$percent_false}}% </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
    <div class="col-lg-8">

    <div class="panel panel-default">
    <div class="panel-heading mostly-checking">
    Mostly checking: on weekends
    Mostly checking: in the week days
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

        @foreach($days as $day)

           <div class="stats-table-responsive">
               <table class="table table-bordered table-hover table-striped lon-table">
                   <thead>
                   <tr>
                       <td colspan="2">
                           <div title="total times checked">
                               {{  $totaL_daily[$day] }}
                           </div>
                           <div class="s-font">times checked</div>
                       </td>
                   </tr>
                   </thead>
                   <tbody>
                   <tr>
                       <td>
                           <span title="unlocked">
                                100
                           </span>
                       </td>

                       <td>
                           <span title="locked">
                                170
                           </span>
                       </td>
                   </tr>
                   </tbody>
                  <tfoot>
                  <tr>
                      <td colspan="2">
                          {{ strtoupper($day) }}
                      </td>
                  </tr>
                  </tfoot>
               </table>
           </div>

        @endforeach

        {{--<div class="table-responsive">--}}
        {{--<table class="table table-bordered table-hover table-striped lon-table">--}}

        {{--<thead>--}}
        {{--<tr>--}}
        {{--@for($i=1; $i <= 7; ++$i)--}}
        {{--<td colspan="2">--}}
        {{--<div title="total times checked">--}}
        {{--100--}}
        {{--</div>--}}
        {{--<div style="font-size: 10px">times checked</div>--}}
        {{--</td>--}}

        {{--@endfor--}}

        {{--</tr>--}}
        {{--</thead>--}}

        {{--<tbody>--}}
        {{--<tr>--}}
        {{--@for($i=1; $i <= 7; ++$i)--}}
        {{--<td>--}}
        {{--<span title="unlocked">--}}
        {{--100--}}
        {{--</span>--}}
        {{--</td>--}}
        {{--<td>--}}
        {{--<span title="locked">--}}
        {{--170--}}
        {{--</span>--}}
        {{--</td>--}}
        {{--@endfor--}}

        {{--</tr>--}}
        {{--</tbody>--}}

        {{--<tfoot>--}}
        {{--<tr>--}}
        {{--@foreach($days as $day)--}}

        {{--<td colspan="2">{{ strtoupper($day) }}</td>--}}

        {{--@endforeach--}}
        {{--</tr>--}}

        {{--</tfoot>--}}
        {{--</table>--}}
        {{--</div>--}}
                <!-- /.table-responsive -->

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
