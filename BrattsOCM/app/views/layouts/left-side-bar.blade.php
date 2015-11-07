

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
    <title>Travel Bratts - Administrator Dashboard</title>
    <!-- Favicons-->
    <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
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
    <!-- Custome CSS-->
    <link href="css/custom-style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="js/plugins/jvectormap/jquery-jvectormap.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
</head>
<body>
<!-- Start Page Loading -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!-- End Page Loading -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START HEADER -->
<header id="header" class="page-topbar">
    <!-- start header nav-->
    <div class="navbar-fixed">
        <nav class="cyan">
            <div class="nav-wrapper">
                <ul class="left">
                    <div class="imgLogoheader">
                        <img src="images/tb6.png" width="" height="45">
                    </div>
                    <li>
                        <h1 class="logo-wrapper"><a href="index.html" class="brand-logo darken-1"></a><span class="logo-text">Bratts OCM</span></h1>
                    </li>
                </ul>
                <div class="header-search-wrapper hide-on-med-and-down">
                    <i class="mdi-action-search"></i>
                    <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Search Your Hotel Room"/>
                </div>
                <ul class="right hide-on-med-and-down">
                    <li>
                        <a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                    </li>

                </ul>

            </div>
        </nav>
    </div>
    <!-- end header nav-->
</header>
<!-- END HEADER -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START MAIN -->
<div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">
        <!-- START LEFT SIDEBAR NAV-->
        <aside id="left-sidebar-nav">
            <ul id="slide-out" class="side-nav fixed leftside-navigation">
                <li class="user-details cyan darken-2">
                    <div class="row">
                        <div class="col col s4 m4 l4">
                            <img src="images/favicon/32x32.png">
                        </div>
                        <div class="col col s8 m8 l8">
                            <ul id="profile-dropdown" class="dropdown-content">
                                <li>
                                    <a href="#"><i class="mdi-action-face-unlock"></i> Profile</a>
                                </li>
                                <li>
                                    <a href="#"><i class="mdi-action-settings"></i> Settings</a>
                                </li>
                                <li>
                                    <a href="#"><i class="mdi-communication-live-help"></i> Help</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#"><i class="mdi-action-lock-outline"></i> Lock</a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('sign-out?_token='.csrf_token())  }}"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                                </li>
                                {{ Form::token() }}
                            </ul>
                            <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">{{ Auth::user()->username }}<i class="mdi-navigation-arrow-drop-down right"></i></a>
                            <p class="user-roal">{{ Auth::user()->role }}</p>
                        </div>
                    </div>
                </li>
                <li class="bold active">
                    <a href="@if(Auth::user()->role==="hotel-admin"){{ URL::route('dashboard-logged-admin')}} @else {{ URL::route('dashboard-logged-staff')}} @endif " class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold">
                            <a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-invert-colors"></i>Our Reservations</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li>
                                        <a href="{{ URL::route('book-room-own-hotel') }}">New Booking</a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::route('view-booked-own-hotel') }}">View Bookings</a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::route('view-availables-own-hotel') }}">Available Rooms</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="bold">
                            <a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-action-class"></i>My Channel</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li>
                                        <a href="{{ URL::route('company-profile') }}">Company Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::route('company-branches') }}">Branches</a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::route('company-users') }}">Users</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @if(Auth::user()->role==="hotel-admin")
                            <li class="bold">
                                <a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-communication-call-merge"></i>Branch management</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li>

                                            <a href="{{ URL::route('add-branch') }}">Add Branch</a>

                                        </li>
                                        <li>

                                            <a href="{{ URL::route('add-staff') }}">Add Staff</a>

                                        </li>
                                        <li>
                                            <a href="{{ URL::route('add-room') }}">Add Rooms</a>
                                        </li>
                                        <li>
                                            <a href="{{ URL::route('add-package') }}">Add Packages</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>



                            <li class="bold">
                                <a href="index.html" class="waves-effect waves-cyan"><i class="mdi-image-filter-1"></i>Create Voucher Code</a>
                            </li>
                            <li class="bold">
                                <a href="index.html" class="waves-effect waves-cyan"><i class="mdi-action-credit-card"></i>Redeem Voucher</a>
                            </li>
                            <li class="bold">
                                <a href="index.html" class="waves-effect waves-cyan"><i class="mdi-device-airplanemode-on"></i>Redeem Tour Code</a>
                            </li>
                        @endif


                        <li class="bold">
                            <a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-editor-mode-edit"></i>Bookings</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li>
                                        <a href="page-contact.html">New Booking</a>
                                    </li>
                                    <li>
                                        <a href="page-todo.html">Existing Bookings</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="bold">
                            <a href="{{ URL::route('user-profile') }}" class="waves-effect waves-cyan"><i class="mdi-social-person"></i>My Account</a>
                        </li>

                        @if(Auth::user()->role==="hotel-admin")
                            <li class="bold">
                                <a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-content-report"></i>Reports</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li>
                                            <a href="eCommerce-products-page.html">Sales Report</a>
                                        </li>
                                        <li>
                                            <a href="eCommerce-pricing.html">Cancellation Report</a>
                                        </li>
                                        <li>
                                            <a href="eCommerce-invoice.html">Revenue Report</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                        @endif

                    </ul>
                </li>
                <li class="li-hover">
                    <div class="divider"></div>
                </li>
                <li class="li-hover">
                    <p class="ultra-small margin more-text">MORE</p>
                </li>
                <li>
                    <a href="css-grid.html"><i class="mdi-image-grid-on"></i>Settings</a>
                </li>
                <li>
                    <a href="css-color.html"><i class="mdi-editor-format-color-fill"></i>Theme Customize</a>
                </li>
                <li>
                    <a href="css-helpers.html"><i class="mdi-communication-live-help"></i>Help</a>
                </li>
                <li class="li-hover">
                    <div class="divider"></div>
                </li>

            </ul>
            <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
        </aside>
    </div>