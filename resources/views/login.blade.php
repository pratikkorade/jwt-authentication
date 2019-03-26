
  
<!DOCTYPE html>
<html>

<head>
    
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="google-signin-client_id" content="469707559402-52lvoielarr6rgr810svlsna3gke5veu.apps.googleusercontent.com">
</head>
<style>
    :root {
        --input-padding-x: 1.5rem;
        --input-padding-y: .75rem;
    }
    .inline-block{
        float: left;
    }
    body {
        background: #007bff;
        background: linear-gradient(to right, #0062E6, #33AEFF);
    }
    .card-signin {
        border: 0;
        border-radius: 1rem;
        box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
    }
    .card-signin .card-title {
        margin-bottom: 2rem;
        font-weight: 300;
        font-size: 1.5rem;
    }
    .card-signin .card-body {
        padding: 2rem;
    }
    .form-signin {
        width: 100%;
    }
    .form-signin .btn {
        font-size: 80%;
        border-radius: 5rem;
        letter-spacing: .1rem;
        font-weight: bold;
        padding: 1rem;
        transition: all 0.2s;
    }
    .form-label-group {
        position: relative;
        margin-bottom: 1rem;
    }
    .form-label-group input {
        height: auto;
        border-radius: 2rem;
    }
    .form-label-group>input,
    .form-label-group>label {
        padding: var(--input-padding-y) var(--input-padding-x);
    }
    .form-label-group>label {
        position: absolute;
        top: 0;
        left: 0;
        display: block;
        width: 100%;
        margin-bottom: 0;
        /* Override default `<label>` margin */
        line-height: 1.5;
        color: #495057;
        border: 1px solid transparent;
        border-radius: .25rem;
        transition: all .1s ease-in-out;
    }
    #forgot{
        font-size: 14px;
    }
    .form-label-group input::-webkit-input-placeholder {
        color: transparent;
    }
    .form-label-group input:-ms-input-placeholder {
        color: transparent;
    }
    .form-label-group input::-ms-input-placeholder {
        color: transparent;
    }
    .form-label-group input::-moz-placeholder {
        color: transparent;
    }
    .form-label-group input::placeholder {
        color: transparent;
    }
    .form-label-group input:not(:placeholder-shown) {
        padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
        padding-bottom: calc(var(--input-padding-y) / 3);
    }
    .form-label-group input:not(:placeholder-shown)~label {
        padding-top: calc(var(--input-padding-y) / 3);
        padding-bottom: calc(var(--input-padding-y) / 3);
        font-size: 12px;
        color: #777;
    }
    .btn-google {
        color: white;
        background-color: #ea4335;
    }
    .btn-facebook {
        color: white;
        background-color: #3b5998;
    }
    a{
        color: white;
    }
    .sinreg{
        margin-top: 10px;
    }
    #g-captcha{
        margin-left: 20px;
    }
    .gofb{
        width: 90%;
        margin-left: 22px;
    }
    .fb{
        margin-bottom: 10px;
    }
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sign In</h5>
                        <form class="form-signin" method="POST" action="/login">
                            <div class="form-label-group">
                                <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address"
                                    required autofocus>
                                <label for="inputEmail">Email address</label>
                            </div>

                            <div class="form-label-group">
                                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password"
                                    required>
                                <label for="inputPassword">Password</label>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox mb-3">
                                        <div class="col-lg-7 inline-block">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Remember password</label>
                                        </div>
                                        <div class="col-md-5 inline-block" id="forgot">
                                            <a class="" href="#">Forgot password?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="g-captcha" data-callack="onsubmit"></div>
                                @if($errors->getMessages() && isset($errors->getMessages()['g-captcha']))
                                @foreach($errors->getMessages()['g-captcha'] as $error)
                                    <p class="mark">{{ $error }}</p>
                                @endforeach
                                @endif
                                <span id="g-captcha_error"></span>
                             <div class="row sinreg">
                                   <div class="col-md-6">
                                       <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" value>Sign in</button>
                                   </div>
                                   <div class="col-md-6">
                                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="button" onclick="window.location.href='register';">Register</button>
                                   </div>
                                </div>
                             </div>
                            <hr class="my-4">
                           <div class="form-signin gofb">
                                <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit" onclick="gp_login()">
                                        <i class="fab fa-google-f mr-2"></i><a href="">Sign in with google</a></button>
                                <button class="btn btn-lg btn-facebook btn-block text-uppercase fb" type="submit" onclick="fbLogin()">
                                        <i class="fab fa-facebook-f mr-2"></i><a href="">Sign in with Facebook</a></button>
                        </form>                
                           </div>
                        </div>        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="assets/scripts/login.js"></script>
    
    <script type="text/javascript">
        var onloadCallback = function() {
            grecaptcha.render(
                'g-captcha',
                {"sitekey":"6LfMGZcUAAAAAPDbxwPTpOfYUq1yCjwc17bNJzN2"}
            )
        };
    </script>
   

<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script> 
</body>
</html>