@extends('layouts.master')

@section('title', 'Profile')

@section('content')

    <div class="container-fluid">

        <div class="dashboard-container">
            <div class="row">
                <div class="col-lg-2">
                    @include('partials.sidebar')
                </div>
                <div class="col-lg-7">
                    @include('errors.errors')



                </div>
            </div>
        </div>

    </div>



@stop

@section('footer')

@stop
