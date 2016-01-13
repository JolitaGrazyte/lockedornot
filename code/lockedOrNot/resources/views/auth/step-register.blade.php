
{{--<style></style>--}}
{{--<div></div>--}}

{{--<form id="register-form" action="#">--}}

<h3></h3>
{{--<h3>Account</h3>--}}
<fieldset>
    <legend>Account</legend>

    <div class="form-group">

        <div class="col-lg-12">
            {{--        {!! Form::label('first_name', 'Your name:', ['class' => 'control-label']) !!}--}}
            <div class="input-group margin-bottom-sm">
                <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Your username']) !!}
            </div>
        </div>
    </div>


    @include('auth.partials.email-password')

    <p>(*) Mandatory</p>
</fieldset>

<h3></h3>
{{--<h3>Profile</h3>--}}
<fieldset>
    <legend>Profile Information</legend>

    <div class="form-group">

        <div class="col-lg-12">
            {{--        {!! Form::label('first_name', 'Your name:', ['class' => 'control-label']) !!}--}}
            <div class="input-group margin-bottom-sm">
                <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Your name']) !!}
            </div>
        </div>
    </div>

    <div class="form-group">

        <div class="col-lg-12">
            {{--        {!! Form::label('last_name', 'Your surname:', ['class' => 'control-label']) !!}--}}
            <div class="input-group margin-bottom-sm">
                <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                {!! Form::text('last_name',  null, ['class' => 'form-control', 'placeholder' => 'Your surname']) !!}
            </div>
        </div>
    </div>

    <p>(*) Mandatory</p>
</fieldset>

<h3></h3>
{{--<h3>Device</h3>--}}
<fieldset>
    <legend>Please enter your "Locked Or Not" device serial number</legend>

    <div class="form-group">

        <div class="col-lg-12">

            {!! Form::label('package', 'My "locked or not" device package contains:', ['class' => 'control-label']) !!}
            <div class="input-group margin-bottom-sm">
                {{--<span class="input-group-addon">--}}
                    {{--<i class="fa fa-gear fa-fw"></i>--}}
                {{--</span>--}}

                {{--<span class="fa fa-circle-thin"></span>--}}
                {{--<span class="fa fa-check"></span>--}}
                <label for="package"></label>
                {!! Form::radio('package',  5, ['class' => '']) !!}
                <span class="radio-text">5 devices</span>

                {!! Form::radio('package',  1, ['class' => '']) !!}
                <span class="radio-text"> 1 devices </span>

            </div>


        </div>
    </div>
    <div class="form-group">

        <div class="col-lg-12">

            {!! Form::label('device_nr', 'Locked Or Not Device Serial Nr:', ['class' => 'control-label']) !!}
            <div class="input-group margin-bottom-sm">
                <span class="input-group-addon"><i class="fa fa-gear fa-fw"></i></span>

                <span class="fa fa-circle-thin"></span>
                {{--<span class="fa fa-check"></span>--}}
                {!! Form::text('device_nr',  null, ['class' => 'form-control required', 'placeholder' => 'your device serial nr.']) !!}
            </div>


        </div>
    </div>
</fieldset>


<h3></h3>
{{--<h3>Additional info</h3>--}}
<fieldset>
    <legend> Additional information</legend>
    <div class="form-group">

        <div class="col-lg-12">
            <h5>Please fill in also these fields. We need your help to generate some general statistics. We wont expose them to others as your personal. </h5>
        </div>
        <div class="col-lg-12">
            {!! Form::label('last_name', 'Your car (brand and color)', ['class' => 'control-label']) !!}
            <div class="input-group margin-bottom-sm">
                <span class="input-group-addon"><i class="fa fa-car fa-fw"></i></span>
                {!! Form::text('car_brand',  old('car_brand'), ['class' => 'form-control', 'placeholder' => 'your car brand']) !!}
                {!! Form::text('car_color',  old('car_color'), ['class' => 'form-control', 'placeholder' => 'your car color']) !!}
            </div>
        </div>
    </div>
</fieldset>



