@extends('layouts.dashboard')

@section('title', 'Profile')

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
                        <div class="col-lg-6 col-lg-offset-2">
                            <h2>
                                Update my login info
                            </h2>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6 col-lg-offset-2">
                {!!Form::model($user, ['route' =>  ['update-login', $user->id], 'class' => 'form-horizontal', 'method' => 'POST'])  !!}

                @include('auth.partials.email-password')

                {!! Form::submit('Update', ['class' => 'form-control']) !!}
                {!! Form::close() !!}
            </div>
        </div>


@stop
