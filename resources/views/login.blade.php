
<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->


    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                          <p>
                            {{ $message }}
                          </p>
                        </div>
    @endif
    @if ($message = Session::get('warning'))
                        <div class="alert alert-warning">
                          <p>
                            {{ $message }}
                          </p>
                        </div>
                      @endif

<?php   $email = Cookie::get('loginemail'); $password = Cookie::get('loginpassword'); $remember=Cookie::get('rememberme') ?>
  <form method="POST" action="login">
<div class="limiter">
  <div class="container-login100" style="background-image: url('images/bg-01.jpg');">

    <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
      <form class="login100-form validate-form flex-sb flex-w" method="POST" action="login">
        <span class="login100-form-title p-b-53">
          Sign In With
        <div class="col-md-6">
            {!! csrf_field() !!}
        <a href="#" class="btn-face m-b-50">
          <i class="fa fa-facebook-official"></i>
          Facebook
        </a>
      </div>

        <a href="login/google" class="btn-google m-b-15">
          <img src="images/icons/icon-google.png" alt="GOOGLE">
          Google
        </a>
      </span>

                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                      <div class="col-md-6">
                          <input id="email" type="email" class="form-control" name="email" value="{{ $email ? $email :old('email') }}" required autofocus>

                          @if ($errors->has('email'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                      <label for="password" class="col-md-4 control-label">Password</label>

                      <div class="col-md-6">
                          <input id="password" type="password" class="form-control" name="password" value="{{ $password ? $password :'' }}" required>

                          @if ($errors->has('password'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="col-md-6 col-md-offset-4">
                          <div class="checkbox">
                              <label>
                                  <input type="checkbox" name="remember" value="1" {{ $remember ? 'checked' :'' }} > Remember Me
                              </label>
                          </div>
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="col-md-8 col-md-offset-4">
                          <button type="submit" class="btn btn-primary">
                              Login
                          </button>

                          <a class="btn btn-link" href="{{ url('/forgot-password') }}">
                              Forgot Your Password?
                          </a>


                      </div>




<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>
</div>
