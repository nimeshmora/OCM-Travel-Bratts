<!DOCTYPE html>
<html lang="en">
<!--================================================================================
Item Name: Materialize - Material Design Admin Template
Version: 2.1
Author: GeeksLabs
Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description"
          content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords"
          content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>Register Page|TravelBratts</title>
    <!-- Favicons-->
    <link rel="icon" href="{{ URL::asset('images/favicon/32x32.png') }}" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="{{ URL::asset('images/favicon/apple-touch-icon-152x152.png') }}">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->
    <!-- CORE CSS-->
    <link href="{{ URL::asset('css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ URL::asset('css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->
    <link href="{{ URL::asset('css/custom-style.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ URL::asset('css/page-center.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="{{ URL::asset('css/prism.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ URL::asset('js/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" type="text/css" rel="stylesheet"
          media="screen,projection">
</head>
<body class="cyan">
<!-- Start Page Loading -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!-- End Page Loading -->
<div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel company-reg-div">
        <form class="login-form company-reg-div" action="{{ URL::route('register-account-post') }}" method="post">
            <div class="row">
                <div class="input-field col s12 center">
                    <p class="center">Join with TravelBratts !</p>

                    <div class="">
                        <img src="images/u.png">
                    </div>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-social-person-outline prefix"></i>
                    <input name="fullname"
                           type="text" {{ (Input::old('fullname')) ? 'value="'. Input::old('fullname').'"' : '' }}>

                    @if($errors ->has('fullname'))

                        {{ $errors->first('fullname', '<small class=error>:message</small>') }}
                    @endif
                    <label for="fullname" class="center-align">Full Name</label>

                </div>


            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-social-domain prefix"></i>
                    <input name="hotelname" type="text" {{ (Input::old('hotelname')) ? 'value="'. Input::old('hotelname').'"' : '' }}>
                    @if($errors ->has('hotelname'))

                        {{ $errors->first('hotelname', '<small class=error>:message</small>') }}
                    @endif

                    <label for="hotelname">Company/Hotel Name</label>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-communication-email prefix"></i>
                    <input name="email" type="email" {{ (Input::old('email')) ? 'value="'. Input::old('email').'"' : '' }}>
                    @if($errors ->has('email'))

                        {{ $errors->first('email', '<small class=error>:message</small>') }}
                    @endif
                    <label for="email" class="center-align">Email</label>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-image-timer-auto prefix"></i>
                    <input name="username" type="text" {{ (Input::old('username')) ? 'value="'. Input::old('username').'"' : '' }}>
                    @if($errors ->has('username'))

                        {{ $errors->first('username', '<small class=error>:message</small>') }}
                    @endif
                    <label for="username" class="center-align">Username</label>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-action-lock-outline prefix"></i>
                    <input name="password" type="password" {{ (Input::old('password')) ? 'value="'. Input::old('password').'"' : '' }}>
                    @if($errors ->has('password'))

                        {{ $errors->first('password', '<small class=error>:message</small>') }}
                    @endif
                    <label for="password" class="center-align">Password</label>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-action-lock-outline prefix"></i>
                    <input name="confirm-password" type="password" {{ (Input::old('confirm-password')) ? 'value="'. Input::old('confirm-password').'"' : '' }}>
                    @if($errors ->has('confirm-password'))

                        {{ $errors->first('confirm-password', '<small class=error>:message</small>') }}
                    @endif
                    <label for="password-again" class="center-align">Confirm Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <button type="submit" class="btn waves-effect waves-light col s12">Register Now</button>
                    {{ Form::token() }}
                </div>
                <div class="input-field col s12">
                    <p class="margin center medium-small sign-up" onclick="window.location='{{  url("user-login") }}'">
                        Already have an account? <a>Login</a></p>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- ================================================
Scripts
================================================ -->
<!-- jQuery Library -->
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<!--materialize js-->
<script type="text/javascript" src="js/materialize.js"></script>
<!--prism-->
<script type="text/javascript" src="js/prism.js"></script>
<!--scrollbar-->
<script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="js/plugins.js"></script>
</body>
</html>