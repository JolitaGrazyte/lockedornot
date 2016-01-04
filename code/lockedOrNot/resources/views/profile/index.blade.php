
@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')


    <div class="container">
        <div class="dashboard-container">
            <div class="row">
                <div class="col-lg-12">
                    @include('partials.messages')
                </div>
                <h2>My place</h2>

                @if(is_null(Auth::user()->device))
                    <h3 class="urgent">You must urgently update your profile and add a device serial number for a further interaction. </h3>
                    <a href=""
                       data-toggle="modal"
                       data-target="#editModal">Update my profile</a>

                    @else

                    <div>My device nr.: {{Auth::user()->device->device_nr}}</div>
                    <div>
                        @if(Auth::user()->device->state == 0)
                            <h3 class="urgent">Your car is not locked!</h3>

                        @else
                            <h3 class="">Your car is locked!</h3>

                        @endif
                    </div>

                @endif

                <div class="col-lg-12">
                    {{--<h2>My personal stats</h2>--}}
                    How i'm doing?
                    <canvas width=""></canvas>
                </div>
            </div>
        </div>

    </div>

@stop