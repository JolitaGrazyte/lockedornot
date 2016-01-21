<div class="form-group">
    <div class="col-lg-12">
        @if(Request::is('update-login-info/*'))
            {!! Form::label('email', 'Your e-mail:', ['class' => 'control-label']) !!}
        @endif

        <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
            {{--<span class="fa fa-times-circle-o"></span>--}}
            {{--<span class="fa fa-circle-thin">*</span>--}}

            {!! Form::email('email', old('email'), ['   class' => 'form-control', 'placeholder' => 'Your email', 'required']) !!}

        </div>
        <div id="email-group">
            <p class="help-text"></p>
        </div>
    </div>

</div>


<div class="form-group">

    <div class="col-lg-12">
        @if(Request::is('update-login-info/*'))
            {!! Form::label('email', 'Your password:', ['class' => 'control-label']) !!}
        @endif
        {{--{!! Form::label('password', 'Choose your password:', ['class' => 'control-label']) !!}--}}
        <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
            {{--<span class="fa fa-circle-thin"></span>--}}


            {!! Form::password('password', ['class' => 'form-control',  'placeholder' => 'Your password', 'required']) !!}

        </div>
            @if(Request::is('update-login-info/*'))
                <div style="color: red; "><em> Enter Your NEW password here, only if you want to change it. </em></div>
            @endif

        <div id="password-group">
            <p class="help-text"></p>
        </div>
    </div>

</div>
