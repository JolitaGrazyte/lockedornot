@extends('layouts.master')

@section('title', 'Home')

@section('content')

    <h1 class="site-name">Locked Or Not</h1>

    <div class="slogan">
        <h3>Get a peace of mind!</h3>
    </div>


    <div class="parallax-window-img" data-parallax="scroll" data-image-src="{{ url('img/car-lock-2-bl-filter.jpg') }}"></div>

    <div class="parallax-window-noimg" data-parallax="scroll" data-image-src="">

        @include('home.partials.how-it-works')

    </div>

    <div class="parallax-window-img" data-parallax="scroll" data-image-src="{{ url('img/car-lock-2.jpg') }}"></div>

@stop
