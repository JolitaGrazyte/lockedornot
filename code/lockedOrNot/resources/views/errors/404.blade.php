@extends('layouts.master')

@section('title', 'Page not found')

@section('content')

    <div class="wrapper-404">
    <h1 class="h1-404">Oh snap, looks like the page you are looking for does not exist.</h1>
    <a class="go-back" href="{{ route('home') }}"><--- go back to the home page</a>
    </div>

    <div class="img-wrapper-404">
        <img src="{{ url('img/car-lock-2-filter.jpg') }}"  width="100%" alt="">
    </div>

@stop

@section('scripts')

    @parent

    <script src="{{ url('js/parallax.js') }}"></script>

@stop
