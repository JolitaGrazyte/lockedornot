@extends('layouts.master')

@section('title', 'Home')

@section('content')

    <div class="front-wrapper">

        @include('home.partials.img')

        @include('home.partials.site-name-slogan')

    </div>

    <div class="parallax-window-noimg" data-parallax="scroll" data-image-src="">

        @include('home.partials.how-it-works')

    </div>

    @include('home.partials.img')

    <div id="about" class="parallax-window-noimg" data-parallax="scroll" data-image-src="">

        <h1 class="center">Product</h1>

    </div>

@stop

@section('scripts')

    @parent

    <script src="{{ url('js/parallax.js') }}"></script>
    {{--<script src="{{ url('js/noframework.waypoints.min.js') }}"></script>--}}
    {{--<script src="{{ url('js/waypoints.js') }}"></script>--}}

@stop


