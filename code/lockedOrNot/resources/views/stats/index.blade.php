@extends('layouts.dashboard')

@section('title', 'Stats')

<div class="hidden-xs">
    @include('partials.note', ['msg' => $msg])
</div>
@section('content')
    <div class="hidden-sm">
        <div class="panel panel-green height-100vh" id="pnl-locked">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-12 text-right">
                        <div class="huge">locked</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-red unlocked" id="pnl-unlocked">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-12 text-right">
                        <div class="huge">unlocked</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="hidden-xs">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header dash-page-header">
                    How I'm doing ?
                </h2>
                <h4 class="o-font margin-l-20">
                    My overall statistics
                </h4>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="col-lg-4 pull-right">
            <div class="row">
                <div class="col-lg-12 status-msg">
                    @include('stats.partials.status-msg')
                </div>
            </div>
        </div>

        <div class="col-lg-4 right">
            <div class="row">
                <div class="hidden-xs col-lg-12">
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

            <div class="col-lg-4 col-sm-6">

                @include('stats.partials.busiest-day', ['userBusiestDay' => $userBusiestDay])

            </div>

            {{--<div class="col-lg-4 col-sm-6">--}}
               {{--@include('stats.partials.busiest-month', ['userBusiestMonth' => $userBusiestMonth])--}}
            {{--</div>--}}


        </div>
        <!-- /.panel -->

        <div class="row">
            <div class="col-lg-8">
                @include('stats.partials.weekend-vs-weekdays-doughnut')
            </div>

        </div>
    </div>

@stop

@section('scripts')

    @parent
    <script>
        $(document).ready(function(){
//            console.log('hi');

            $('[data-toggle="tooltip"]').tooltip();

            $('button.close, .note').on('click', function(){
//                console.log('clicked');
                $('.note').addClass('note-remove').removeClass('note-add');
            });
        });

    </script>

    <script type="text/javascript" src='{{url('js/Chart.min.js')}}'></script>
    <script src="{{ url('js/stats/doughnut-stats.js') }}"></script>
@stop