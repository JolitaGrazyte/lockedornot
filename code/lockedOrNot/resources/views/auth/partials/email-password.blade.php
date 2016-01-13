<div class="form-group">
    <div class="col-lg-12">
        {{--{!! Form::label('email', 'Your e-mail:', ['class' => 'control-label']) !!}--}}
        <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
            <span class="fa fa-times-circle-o"></span>
            <span class="fa fa-circle-thin"></span>

            {!! Form::email('email', null, ['   class' => 'form-control', 'placeholder' => 'Your email', 'required', 'title' => 'Your email']) !!}

        </div>
        <div id="email-group">
            <p class="help-text"></p>
        </div>
    </div>

</div>


<div class="form-group">

    <div class="col-lg-12">
        {{--{!! Form::label('password', 'Choose your password:', ['class' => 'control-label']) !!}--}}
        <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
            <span class="fa fa-circle-thin"></span>

            {!! Form::password('password', ['class' => 'form-control',  'placeholder' => 'Your password ']) !!}

        </div>
        <div id="password-group">
            <p class="help-text"></p>
        </div>
    </div>

</div>
