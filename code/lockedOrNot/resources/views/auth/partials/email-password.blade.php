<div class="form-group">
    <div class="col-lg-12">
        {{--{!! Form::label('email', 'Your e-mail:', ['class' => 'control-label']) !!}--}}
        <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'your email']) !!}
        </div>
    </div>

</div>


<div class="form-group">

    <div class="col-lg-12">
        {{--{!! Form::label('password', 'Choose your password:', ['class' => 'control-label']) !!}--}}
        <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>

            {!! Form::password('password', ['class' => 'form-control',  'placeholder' => 'Choose your password']) !!}
        </div>
    </div>

</div>
