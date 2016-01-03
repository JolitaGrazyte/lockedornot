{!!Form::model($user, ['route' =>  ['profile.update', $user->id], 'class' => 'form-horizontal', 'method' => 'PATCH'])  !!}

<div class="form-group">

    <div class="col-lg-12">
        {!! Form::label('device_nr', 'Your lockedOrNot serial nr:', ['class' => 'control-label']) !!}
        <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-gear fa-fw"></i></span>
            {!! Form::text('device_nr',  old('device_nr'), ['class' => 'form-control', 'placeholder' => 'your device serial nr.']) !!}
        </div>


    </div>
</div>

<div class="form-group">

    <div class="col-lg-12">
        {!! Form::label('first_name', 'Your name:', ['class' => 'control-label']) !!}
        <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
            {!! Form::text('first_name', null, ['class' => 'form-control col-lg-3', 'placeholder' => 'your name']) !!}{!! Form::text('last_name',  null, ['class' => 'form-control', 'placeholder' => 'your surname']) !!}
        </div>
    </div>
</div>

<div class="form-group">

    <div class="col-lg-12">
        {!! Form::label('last_name', 'About your car:', ['class' => 'control-label']) !!}
        <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-car fa-fw"></i></span>
            {!! Form::text('car_brand',  old('car_brand'), ['class' => 'form-control', 'placeholder' => 'your car brand']) !!}
            {!! Form::text('car_color',  old('car_color'), ['class' => 'form-control', 'placeholder' => 'your car color']) !!}
        </div>
    </div>
</div>

<div class="form-group">

    <div class="col-lg-12">

        {!! Form::submit('Update', ['class' => 'form-control']) !!}

    </div>

</div>