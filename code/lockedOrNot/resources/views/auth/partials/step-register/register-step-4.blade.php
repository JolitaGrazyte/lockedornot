<h3></h3>
<fieldset>
    <legend> Additional information</legend>


    <div class="col-lg-12">

            <p>Please, fill in also these fields.</p>
            <p>We need your help.</p>
            <p>This information will only used to generate some general statistics.</p>
            <p> We wont expose this information to the others.</p>

    </div>
    <div class="col-lg-12">
        {!! Form::label('last_name', 'Your car (brand and color)', ['class' => 'control-label']) !!}
        <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-car fa-fw"></i></span>
            {!! Form::text('car_brand',  old('car_brand'), ['class' => 'form-control', 'placeholder' => 'your car brand']) !!}
            {!! Form::text('car_color',  old('car_color'), ['class' => 'form-control', 'placeholder' => 'your car color']) !!}
        </div>
        <p>(-) Optional fields</p>
    </div>

</fieldset>
