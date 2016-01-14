@extends('layouts.master')

@section('title', 'Page not found')

@section('content')

    <div style="position: absolute; z-index: 1200; top: 50%; left: 50%; transform: translate(-50%); color: white; font-family: Helvetica;  ">
    <h1 style="font-size: 5rem;">Ooops... Looks like the page you are looking for does not exist.</h1>
    <a style="color: #2ef4ab; font-size: 2.7rem; font-family: exo-regular" href="{{ route('home') }}"><--- go back to the home page</a>
    </div>

    <div style="width: 100%; position: absolute; overflow: hidden"  class="img-wrapper">
        <img src="{{ url('img/car-lock-2-filter.jpg') }}"  width="100%" alt="">
    </div>

@stop

@section('scripts')

    @parent

    <script src="{{ url('js/parallax.js') }}"></script>

@stop
