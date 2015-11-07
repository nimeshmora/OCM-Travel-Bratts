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
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>Login Page|TraveBratts</title>
    <!-- Favicons-->
    <link rel="icon" href="images/favicon/32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->
    <!-- CORE CSS-->
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->
    <link href="css/custom-style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="css/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
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
    <div class="col s12 z-depth-4 card-panel">
        <form class="login-form" action="{{ URL::route('signin-user-post') }}" method="post">
            <div class="row">
                <div class="input-field col s12 center">

                    <img src="images/u.png" alt="" class="circle responsive-img valign profile-image-login">
                    <p class="center login-form-text">Login Area</p>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-social-person-outline prefix"></i>
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

                    <label for="password">Password</label>
                </div>
            </div>

            <div>
                @if(Session::has('global'))
                    <h6 class="error" >{{ Session::get('global') }}</h6>

                @endif

            </div>
            <div class="row">
                <div class="input-field col s12 m12 l12  login-text">
                    <input type="checkbox" name="remember-me" id="remember"/>
                    <label for="remember">Remember me</label>
                </div>

            </div>
            <div class="row">
                <div class="input-field col s12">
                    <Button type="submit" class="btn waves-effect waves-light col s12">Login</button>
                    {{ Form::token() }}

                </div>
            </div>
            <div class="row">
                <div class="input-field col s6 m6 l6">
                  <p class="margin medium-small">


                      <a href="{{URL::route('comapny-register')}}"> Register Now!</a>

                  </p>
                </div>
                <div class="input-field col s6 m6 l6">

                    @if(Auth::check())
                        <p class="margin right-align medium-small"><a href="{{URL::route('forgot-password')}}">Forgot password ?</a></p>
                    @else

                    @endif

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