

  <div class="content">

      {!!Form::open(['route' => 'post-login', 'id' => 'Form', 'class' => 'form-horizontal', 'role' => 'form'])  !!}

      <div class="error-message">
          <p>these credentials do not match our records</p>
      </div>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
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

              {!! Form::submit('Login', ['class' => 'my-btn form-control']) !!}

              <a class="btn btn-link" onclick="$('#loginModal').modal('hide');" data-toggle="modal" data-target="#passwordModal">Forgot your password?</a>
          </div>
      </div>


      @include('auth.partials.social-login')

      {!! Form::close() !!}

  </div>
