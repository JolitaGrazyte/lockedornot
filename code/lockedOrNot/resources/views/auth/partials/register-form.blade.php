{!!Form::open(['route' =>  ['post-register'], 'class' => 'form-horizontal', 'role' => 'form'])  !!}

<div class="form-group">

    <div class="col-lg-12">
{{--        {!! Form::label('device_nr', 'Device Serial Nr:', ['class' => 'control-label']) !!}--}}
        <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-gear fa-fw"></i></span>

            <span class="fa fa-circle-thin"></span>
            {{--<span class="fa fa-check"></span>--}}
            {!! Form::text('device_nr',  null, ['class' => 'form-control', 'placeholder' => 'your device serial nr.', 'required']) !!}
        </div>


    </div>
</div>

<div class="form-group">

    <div class="col-lg-12">
{{--        {!! Form::label('first_name', 'Your name:', ['class' => 'control-label']) !!}--}}
        <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
            {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'your name']) !!}
        </div>
    </div>
</div>

<div class="form-group">

    <div class="col-lg-12">
{{--        {!! Form::label('last_name', 'Your surname:', ['class' => 'control-label']) !!}--}}
        <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
            {!! Form::text('last_name',  null, ['class' => 'form-control', 'placeholder' => 'your surname']) !!}
        </div>
    </div>
</div>

@include('auth.partials.email-password')

<div class="form-group">

    <div class="col-lg-12">
        {{--{!! Form::label('password_confirmation', 'Re-type your password:', ['class' => 'control-label']) !!}--}}
        <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
            <span class="fa fa-circle-thin"></span>
            {{--<span class="fa fa-check"></span>--}}
            {!! Form::password('password_confirmation', ['class' => 'form-control',  'placeholder' => 'Re-type your password', 'required']) !!}
        </div>
    </div>

</div>


<div class="form-group">

    <div class="col-lg-12">

        {!! Form::submit('Register', ['class' => 'form-control']) !!}

    </div>

</div>


