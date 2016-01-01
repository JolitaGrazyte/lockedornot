@extends('layouts.master')

@section('title', 'Home')

@section('content')

    <h1 class="site-name">Locked Or Not</h1>

    <div class="slogan">
        <h3>Get a peace of mind!</h3>
    </div>


    {{--<div class="img-container">--}}
    <div class="parallax-window-img" data-parallax="scroll" data-image-src="{{ url('img/car-lock-2-filter.jpg') }}"></div>

    <div class="parallax-window-noimg" data-parallax="scroll" data-image-src="">

        <div class="container">
            <div class="row">
                <div class="front-info">
                    <div class="col-lg-4 col-sm-12">
                        <h4>Register your device</h4>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <h4>Login and check if your car is locked.</h4>

                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <h4>Track your activity related... </h4>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="parallax-window-img" data-parallax="scroll" data-image-src="{{ url('img/car-lock-2.jpg') }}"></div>
    {{--<img class="main-bckgr-img" src="{{ url('img/car-lock-2.jpg') }}" alt="main background image on home page">--}}
    {{--</div>--}}


@stop
