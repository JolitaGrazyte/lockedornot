{!!Form::open(['route' => 'post-login', 'class' => 'form-horizontal'])  !!}

@include('auth.partials.email-password')

<div class="form-group">
    <div class="col-lg-12 col-sm-12">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="remember"> Remember Me
            </label>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-12 col-sm-12">

        {!! Form::submit('Login', ['class' => 'my-btn form-control']) !!}

        <a class="btn btn-link" onclick="$('#loginModal').modal('hide');" data-toggle="modal" data-target="#passwordModal">Forgot Your Password?</a>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-6 col-sm-12">


    </div>
</div>