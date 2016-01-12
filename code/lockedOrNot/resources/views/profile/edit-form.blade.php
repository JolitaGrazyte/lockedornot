{!!Form::model($user, ['route' =>  ['profile.update', $user->id], 'class' => 'form-horizontal', 'method' => 'PATCH'])  !!}

<div class="form-group">

    @if(empty($user->devices))
        <div class="col-lg-12">
            <h5 class="urgent">You must urgently update your profile and add a device serial number for a further interaction. </h5>
        </div>
    @endif



            <div class="col-lg-12">

                {!! Form::label('package', 'My "locked or not" device package contains:', ['class' => 'control-label']) !!}
                <div class="input-group margin-bottom-sm">
                    {{--<span class="input-group-addon">--}}
                    {{--<i class="fa fa-gear fa-fw"></i>--}}
                    {{--</span>--}}

                    {{--<span class="fa fa-circle-thin"></span>--}}
                    {{--<span class="fa fa-check"></span>--}}
                    <label for="package"></label>
                    {!! Form::radio('quantity',  5, ['class' => '']) !!}
                    <span class="radio-text">5 devices</span>

                    {!! Form::radio('quantity',  1, ['class' => '']) !!}
                    <span class="radio-text"> 1 devices </span>

                </div>


            </div>

    <div class="col-lg-12">
        {!! Form::label('device_nr', 'Your lockedOrNot serial nr:', ['class' => 'control-label']) !!}
        <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-gear fa-fw"></i></span>
            {!! Form::text('device_nr',  $no_device ? null : substr($user->devices->first()->device_nr, 0, 7), ['class' => $no_device ? 'urgent form-control':'form-control', 'placeholder' => 'your device serial nr.']) !!}
        </div>


    </div>
</div>

<div class="form-group">

    <div class="col-lg-12">
        {!! Form::label('first_name', 'Your name and surname:', ['class' => 'control-label']) !!}
        <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
            {!! Form::text('first_name', null, ['class' => 'form-control col-lg-3', 'placeholder' => 'your name']) !!}{!! Form::text('last_name',  null, ['class' => 'form-control', 'placeholder' => 'your surname']) !!}
        </div>
    </div>
</div>

<div class="form-group">

    <div class="col-lg-12">
        <h5>Please fill in also these fields. We need your help to be able to generate the correct statistics that you can see on the front-page and on the statistics page.</h5>
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

<a href="">Update my login information</a>

<div class="form-group">

    <div class="col-lg-12">

        {!! Form::submit('Update', ['class' => 'form-control']) !!}

    </div>

</div>