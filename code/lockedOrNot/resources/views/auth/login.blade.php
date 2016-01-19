

  <div class="content">

      {!!Form::open(['route' => 'post-login', 'id' => 'Form', 'class' => 'form-horizontal', 'role' => 'form'])  !!}

      <div class="other-error-message">
          <p>We are very sorry to tell you, that we are experiencing some troubles with a server.</p>
          <p> Please be patient. We are working on it.</p>
      </div>
      <div class="error-message">
          <p>these credentials do not match our records</p>
      </div>

      <h2 class="modal-title">Login</h2>
      @include('auth.partials.email-password')

      <div class="form-group">
          <div class="col-lg-12 col-sm-12">
              <div class="checkbox">
                  <label>
                      <input type="checkbox" name="remember"> Remember me
                  </label>
              </div>
          </div>
      </div>

      <div class="form-group">
          <div class="col-lg-12 col-sm-12">

              {!! Form::submit('Login', ['class' => 'btn-login form-control']) !!}

              {{--<p>--}}
              {{--<a href="{{ url('/password/email .content') }}" id="reset-password" data-toggle="modal" data-target="#myModal">Forgot your password?</a>--}}
              {{--</p>--}}

              <a class="btn btn-link" onclick="$('#myModal').modal('hide');" data-toggle="modal" data-target="#passwordModal">Forgot your password?</a>
          </div>
      </div>


      @include('auth.partials.social-login')

      {!! Form::close() !!}

  </div>
