<h3></h3>
{{--<h3>Device</h3>--}}
<fieldset>
    <legend style="font-family: sans-serif;">
        Please enter your "Locked Or Not" device serial number.
        <em>
            <a href="">Where to find it ?</a>
        </em>
    </legend>

        <div class="col-lg-12">

            {!! Form::label('package', 'My "locked or not" device package contains:', ['class' => 'control-label']) !!}
            <div class="input-group margin-bottom-sm">
                <label for="package"></label>
                {!! Form::radio('package',  5, ['class' => '']) !!}
                <span class="register-radio-text">5 devices</span>

                {!! Form::radio('package',  1, ['class' => '']) !!}
                <span class="register-radio-text"> 1 devices </span>

            </div>


        </div>

        <div class="col-lg-12">

            {!! Form::label('device_nr', 'Locked Or Not Device Serial Nr:', ['class' => 'control-label']) !!}
            <div class="input-group margin-bottom-sm">
                <span class="input-group-addon">
                    <i class="fa fa-gear fa-fw"></i>
                </span>

                <span class="fa fa-circle-thin"></span>
                {{--<span class="fa fa-check"></span>--}}
                {!! Form::text('device_nr',  null, ['class' => 'form-control required', 'placeholder' => 'your device serial nr.']) !!}
            </div>


        </div>

</fieldset>