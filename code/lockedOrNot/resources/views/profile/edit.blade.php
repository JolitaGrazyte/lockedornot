@extends('layouts.dashboard')

@section('title', 'Profile')

@include('partials.note', ['msg' => $msg])

@section('content')

    <div class="row">
        <div class="col-lg-12">
            @include('errors.errors')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-5 col-lg-offset-2">
                        <h2>
                            Update my profile
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 col-lg-offset-2">
                    <h4><a href="{{ route('edit-login', str_replace(' ', '-', Auth::user()->full_name)) }}">Update my login information</a></h4>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-lg-offset-2">
            @include('profile.edit-form', ['no_device' => $no_device, 'device_status' => $device_status])
        </div>
    </div>


@stop


@section('scripts')

@parent

<script>
    $(document).ready(function(){
//            console.log('hi');

        $('button.close, .note').on('click', function(){
//                console.log('clicked');
            $('.note').addClass('note-remove').removeClass('note-add');
        });
    });

</script>

@stop