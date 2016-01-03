
@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

    @include('profile.edit-modal', ['user'=> Auth::user()])

    <div class="container">

        <div class="dashboard-container">
            <div class="row">
                <h2>Personal statistics</h2>

                <div class="col-lg-12">

                    <canvas></canvas>
                </div>
            </div>
        </div>

    </div>

@stop