@extends('layouts.master')

@section('title', 'Dashboard')


@section('content')

    <div class="container-fluid">

            <div class="row">
               <div class="container stats-container">
                   <div class="col-lg-12">
                       <h1>Stats</h1>

                       <div class="col-lg-4">
                           <canvas id="stats" width="400" height="400"></canvas>
                       </div>

                       <div class="col-lg-4">
                           <canvas id="freq" width="600" height="400"></canvas>
                       </div>

                   </div>
               </div>
            </div>
    </div>

@stop


@section('scripts')

    @parent

    <script type="text/javascript" src='{{url('js/Chart.min.js')}}'></script>

    <script type="text/javascript" src="{{ url('js/stats.js') }}"></script>



@stop