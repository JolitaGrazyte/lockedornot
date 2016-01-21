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
            <h2 class="page-header">
                Update my login info
            </h2>

          <div class="col-lg-8">
              {!!Form::model($user, ['route' =>  ['update-login', $user->id], 'class' => 'form-horizontal', 'method' => 'POST'])  !!}

                    @include('auth.partials.email-password')

              {!! Form::submit('update', ['class' => 'btn btn-primary']) !!}
              {!! Form::close() !!}
          </div>
        </div>


@stop
