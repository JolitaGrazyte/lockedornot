@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

    <div class="container-fluid">

        <div class="row">
            <h1>Stats</h1>

            <canvas id="stats" width="600" height="400"></canvas>

            <canvas id="freq" width="600" height="400"></canvas>

        </div>
    </div>

@stop
