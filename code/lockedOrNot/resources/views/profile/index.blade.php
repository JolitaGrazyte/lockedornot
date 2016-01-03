
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

                @if(empty(Auth::user()->device_nr))
                    <h3 class="urgent">You must urgently update your profile and add a device serial number for a further interaction. </h3>
                    <a href=""
                       data-toggle="modal"
                       data-target="#editModal">Update my profile</a>
                @endif

                <div class="col-lg-12">
                    {{--<h2>My personal stats</h2>--}}

                    <canvas></canvas>
                </div>
            </div>
        </div>

    </div>

@stop