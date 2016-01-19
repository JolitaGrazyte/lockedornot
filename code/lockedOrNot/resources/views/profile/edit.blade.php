@extends('layouts.dashboard')

@section('title', 'Profile')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-8">
                    @include('errors.errors')
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    @include('profile.edit-form', ['no_device' => $no_device])
                </div>
            </div>
        </div>

    </div>


@stop
