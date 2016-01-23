@extends('layouts.dashboard')

@section('title', 'Stats')

@include('partials.note', ['msg' => $msg])
@section('content')

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
                    <div class="panel-heading user-status">
                        <div class="first-line">
                            {{ $support['msg']['f-line'] }}
                        </div>

                        @foreach($support['msg']['m-body'] as $line)
                        <div>
                            {{ $line }}
                        </div>
                        @endforeach
                        <hr>

                        {{--Todo--}}
                        <p>{{ $support['compare_msg'] }} </p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 right">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default text-right padding-right-20">
                    <h2>My car</h2>
                   @include('partials.user-info')
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="row">
        @each('stats.partials.single-panel', $panels, 'panel')

        </div>

        <div class="row">

            <div class="col-lg-12">

            @include('stats.partials.progressbar')
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-8 mstl-checking-panel">
            @include('stats.partials.mostly-checking-panel', ['total_daily' => $total_daily, 'days' => $days])
        </div>

        <div class="col-lg-4">
            @include('stats.partials.busiest-day', ['userBusiestDay' => $userBusiestDay])
        </div>

        <div class="col-lg-4">
           @include('stats.partials.busiest-month', ['userBusiestMonth' => $userBusiestMonth])
        </div>


    </div>
    <!-- /.panel -->

    <div class="row">

        @include('stats.partials.weekend-vs-weekdays-doughnut')

        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading mostly-checking">
                   Me vs others:
                </div>
                {{--<!-- /.panel-heading -->--}}

                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">

                            <p>== From all users ... many users checked more/less times per month then me ==</p>
                            <p>== From all users ... many users car locked when checked more/less times per month then me ==</p>
                            <p>== From all users ... many users car unlocked when checked more/less times per month then me ==</p>

                            <p>== Others check mostly on weekend/ in the weekdays ==</p>

                            {{--@include('stats.mostly-checking-panel', ['total_daily' => $total_daily, 'days' => $days])--}}

                        {{--</div>--}}
                        {{--<!-- /.col-lg-8 (nested) -->--}}
                    {{--</div>--}}
                    {{--<!-- /.row -->--}}

                    {{--<div class="row">--}}
                        {{--<div class="col-lg-2 pull-left">--}}
                            {{--<a href="{{ route('filter-interval-plus', [Auth::user()->full_name, 'week','prev']) }}">--}}
                                {{--<i class="fa fa-angle-double-left"> </i><span> previous week</span>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-2 pull-right">--}}
                            {{--<a href="{{ route('filter-interval-minus', [Auth::user()->full_name, 'week','next']) }}">--}}
                                {{--<span>next week </span> <i class="fa fa-angle-double-right"> </i>--}}
                            {{--</a>--}}
                        </div>
                    </div>
                </div>
                {{--<!-- /.panel-body -->--}}
            </div>
            {{--<!-- /.panel -->--}}
        </div>
    </div>
@stop

@section('scripts')

    @parent
    <script>
        $(document).ready(function(){
//            console.log('hi');

            $('button.close, .note').on('click', function(){
//                console.log('clicked');
                $('.note').addClass('note-remove').removeClass('note-add');
            });
        });

    </script>

    <script type="text/javascript" src='{{url('js/Chart.min.js')}}'></script>
    <script src="{{ url('js/stats/doughnut-stats.js') }}"></script>
@stop