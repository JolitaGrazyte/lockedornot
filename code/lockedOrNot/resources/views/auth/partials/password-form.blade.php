<div class="content">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
        <h2 class="modal-title">Reset password</h2>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <div class="col-lg-12">
                {{--{!! Form::label('email', 'Your e-mail:', ['class' => 'control-label']) !!}--}}
                <div class="input-group margin-bottom-sm">
                    <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'your email']) !!}
                </div>
            </div>

        </div>
        <div class="form-group">
            <div class="col-lg-12">
                {!! Form::submit('Submit', ['class' => 'form-control']) !!}
            </div>

        </div>

    </form>
</div>