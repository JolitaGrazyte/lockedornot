<h3></h3>
<fieldset>
    <legend>Profile information</legend>

    <div class="col-lg-12">
        {{-- {!! Form::label('first_name', 'Your name:', ['class' => 'control-label']) !!}--}}
        <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
            {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Your name', 'required']) !!}
        </div>
        <div id="first_name-group">
            <p class="help-text"></p>
        </div>

    </div>

    <div class="col-lg-12">
        {{-- {!! Form::label('last_name', 'Your surname:', ['class' => 'control-label']) !!}--}}
        <div class="input-group margin-bottom-sm">
            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
            {!! Form::text('last_name',  null, ['class' => 'form-control', 'placeholder' => 'Your surname', 'required']) !!}
        </div>

        <div id="last_name-group">
            <p class="help-text"></p>
        </div>

        <p>(*) Mandatory</p>
    </div>


</fieldset>