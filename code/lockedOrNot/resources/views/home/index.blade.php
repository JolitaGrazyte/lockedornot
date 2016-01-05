@extends('layouts.master')

@section('title', 'Home')

@section('content')

    <h1 class="site-name">Locked Or Not</h1>


        <h2 class="slogan">Get a peace of mind!</h2>

    <div class="tweet">

    </div>

    <div class="parallax-window-img" data-parallax="scroll" data-image-src="{{ url('img/car-lock-2-filter.jpg') }}" alt=""></div>

    {{--@if ( Auth::guest() )--}}
        {{--@include('partials.front-login')--}}

    {{--@endif--}}


        <div id="hiw"></div>
    <div class="parallax-window-noimg" data-parallax="scroll" data-image-src="">

        @include('home.partials.how-it-works')

    </div>

    {{--<div id="after-hiw"></div>--}}
    {{--<div class="parallax-window-img" data-parallax="scroll" data-image-src="{{ url('img/car-lock-2.jpg') }}"></div>--}}

    {{--<div class="parallax-window-noimg" data-parallax="scroll" data-image-src="">--}}

            {{--@include('stats.stats-partial')--}}

    {{--</div>--}}

@stop

@section('scripts')

    @parent

    <script src="{{ url('js/parallax.js') }}"></script>
    <script src="{{ url('js/noframework.waypoints.min.js') }}"></script>
    <script src="{{ url('js/waypoints.js') }}"></script>

    <script type="text/javascript" src='{{url('js/Chart.min.js')}}'></script>
    {{--<script type="text/javascript" src="{{ url('js/stats.js') }}"></script>--}}

@stop