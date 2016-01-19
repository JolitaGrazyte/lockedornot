@extends('layouts.master')

@section('title', 'Home')

@section('content')



    <div class="parallax-window-img" data-parallax="scroll" data-image-src="{{ url('img/car-lock-2-filter.jpg') }}" alt="This a background image of locked or not site.">


    </div>

    <div class="name-slogan-wrapper">
        <div class="site-name">Locked Or Not</div>
        {{--<h1 class="sitename">Locked or not</h1>--}}

        <h2 class="slogan pull-right">Get a peace of mind!</h2>

    </div>

    <div class="parallax-window-noimg" data-parallax="scroll" data-image-src="">

        @include('home.partials.how-it-works')

    </div>

   <div id="product-section-img" class="parallax-window-img" data-parallax="scroll" data-image-src="{{ url('img/car-lock-2-filter.jpg') }}" alt="This a background image of locked or not site."></div>

    <div id="about" class="parallax-window-noimg" data-parallax="scroll" data-image-src="">

        <h1 class="center">Product</h1>


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


