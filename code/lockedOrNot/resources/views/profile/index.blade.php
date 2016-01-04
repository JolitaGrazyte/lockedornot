
@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <style>
        .dashboard-container .row:not(:first-child){
            border: red 1px dotted;
        }
        [class^='col-lg']:not(.col-lg-12){
            border: seagreen 1px dotted;
            min-height: 300px;

        }
    </style>


    <div class="container">

        <div class="dashboard-container">

            <div class="row">
                <div class="col-lg-12">
                    @include('partials.messages')
                </div>
                {{--<h2>My place</h2>--}}
            </div>

            @if(is_null(Auth::user()->device))
                <div class="row">
                    <h3 class="urgent">You must urgently update your profile and add a device serial number for a further interaction. </h3>
                    <a href=""
                       data-toggle="modal"
                       data-target="#editModal">Update my profile</a>

                </div>
            @else

                <div class="row">

                    <div class="col-lg-4 col-lg-offset-4">
                        <h2>My car state</h2>
                        <div>My device nr.: {{Auth::user()->device->device_nr}}</div>
                        <div>

                            <h3 class="{{ Auth::user()->device->state == 0?'urgent':'' }}">{{$msg}}</h3>

                        </div>
                    </div>
                </div>

                <h2>My personal stats</h2>

                <div class="row">
                    <div class="col-lg-4">
                        <h3>Total times checked: {{ $stats_total }} </h3>
                    </div>
                    <div class="col-lg-8">
                        <h3>At what time you check the most: </h3>
                    </div>
                    <div class="col-lg-4">
                        <h3>How many times it was true: {{ $stats_true }}</h3>
                    </div>
                    <div class="col-lg-4">
                        <h3>How many times it was false: {{ $paranoia_stats }}</h3>
                    </div>
                    <div class="col-lg-4">
                        <h3>Real danger percent: {{ $percent_true }}</h3>
                    </div>

                </div>

                <div class="row">



                </div>
            @endif

        </div>
    </div>

@stop