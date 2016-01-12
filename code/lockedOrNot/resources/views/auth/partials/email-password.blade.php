<div class="form-group">
    <div class="col-lg-12">
        {{--{!! Form::label('email', 'Your e-mail:', ['class' => 'control-label']) !!}--}}
        <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
            <span class="fa fa-check-circle-o"></span>
            <span class="fa fa-times-circle-o"></span>
            <span class="fa fa-circle-thin"></span>
            {{--<span class="fa fa-smile-o"></span>--}}
            {{--<span class="fa fa-frown-o"></span>--}}
            {{--<span class="fa fa-meh-o"></span>--}}
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Your email', 'required', 'title' => 'Type your email address here']) !!}
        </div>
    </div>

</div>


<div class="form-group">

    <div class="col-lg-12">
        {{--{!! Form::label('password', 'Choose your password:', ['class' => 'control-label']) !!}--}}
        <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>

            <span class="fa fa-circle-thin"></span>
            {{--<span class="fa fa-check"></span>--}}
            {!! Form::password('password', ['class' => 'form-control',  'placeholder' => 'Your password']) !!}
        </div>
    </div>

</div>
