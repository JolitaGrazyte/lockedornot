@extends('layouts.dashboard')

@section('title', 'Stats')

@include('partials.note', ['msg' => $msg])
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header dash-page-header">
                How i'm doing ?
            </h2>
            <h4 class="o-font margin-l-20">
                my overall statistics
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

        <div class="col-lg-4 col-sm-6">
            @include('stats.partials.busiest-day', ['userBusiestDay' => $userBusiestDay])
        </div>

        <div class="col-lg-4 col-sm-6">
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