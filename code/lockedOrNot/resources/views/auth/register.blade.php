@extends('layouts.master')

@section('title', 'Register')

@section('content')

       <div class="content">
           <h1>Register</h1>

           {{--@include('errors.errors')--}}

           {!!Form::open(['route' =>  ['post-register'], 'id' => 'register-form'])  !!}

           @include('auth.partials.step-register')

           {{--@include('auth.partials.register-form')--}}

           {{--@include('auth.partials.social-login')--}}


           {!! Form::close() !!}

       </div>


@stop
