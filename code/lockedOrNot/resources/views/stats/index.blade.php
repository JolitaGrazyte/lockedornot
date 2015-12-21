@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

    <div class="container-fluid">

        <div class="content-main">

            <div class="col-lg-8 col-sm-12">
                <h1>Stats</h1>

                <canvas id="stats" width="600" height="400"></canvas>

                <canvas id="income" width="600" height="400"></canvas>

            </div>
        </div>
    </div>

@stop


@section('extra-scripts')

    <script type="text/javascript" src='{{url('js/Chart.min.js')}}'></script>

    <script type="text/javascript" src="{{ url('js/stats.js') }}"></script>

@stop