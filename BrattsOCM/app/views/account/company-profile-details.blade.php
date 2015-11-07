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
    <title>Reservation| Travel Bratts</title>
    <!-- Favicons-->
    <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->
    <!-- CORE CSS-->
    <link href="{{ URL::asset('css/materialize.css'); }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ URL::asset('css/style.css'); }}" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->
    <link href="{{ URL::asset('css/custom-style.css'); }}" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="{{ URL::asset('css/prism.css'); }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ URL::asset('js/plugins/perfect-scrollbar/perfect-scrollbar.css'); }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ URL::asset('js/plugins/chartist-js/chartist.min.css'); }}" type="text/css" rel="stylesheet" media="screen,projection">
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
                    <li>
                        <h1 class="logo-wrapper"><a href="index.html" class="brand-logo darken-1">
                                <img src="{{ URL::asset('images/dashlogo.png'); }}" alt="materialize logo">
                            </a> <span class="logo-text">Travel Bratts</span></h1>
                    </li>
                </ul>
                <div class="header-search-wrapper hide-on-med-and-down">
                    <i class="mdi-action-search"></i>
                    <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Search Your Hotel Room" />
                </div>
                <ul class="right hide-on-med-and-down">
                    <li>
                        <a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="waves-effect waves-block waves-light"><i class="mdi-navigation-apps"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="waves-effect waves-block waves-light"><i class="mdi-social-notifications"></i></a>
                    </li>
                    <li>
                        <a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse"><i class="mdi-communication-chat"></i></a>
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
                            <img src="{{ URL::asset('images/favicon/32x32.png'); }}" alt="" class="circle responsive-img valign profile-image">
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
                                    <a href="#"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                                </li>
                            </ul>
                            <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">Travel Bratts<i class="mdi-navigation-arrow-drop-down right"></i></a>
                            <p class="user-roal">Administrator</p>
                        </div>
                    </div>
                </li>
                <li class="bold active">
                    <a href="{{ URL::route('dashboard-logged') }}" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>
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
                                        <a href="css-icons.html">View Bookings</a>
                                    </li>
                                    <li>
                                        <a href="css-shadow.html">Available Rooms</a>
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
                                        <a href="ui-badges.html">Branches</a>
                                    </li>
                                    <li>
                                        <a href="ui-cards.html">Users</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="bold">
                            <a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-communication-call-merge"></i>Branch management</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li>
                                        <a href="ui-buttons.html">Add Branch</a>
                                    </li>
                                    <li>
                                        <a href="ui-badges.html">Add Rooms</a>
                                    </li>
                                    <li>
                                        <a href="ui-badges.html">Add Packages</a>
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
                            <a href="index.html" class="waves-effect waves-cyan"><i class="mdi-social-person"></i>My Account</a>
                        </li>
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
                <li class="li-hover">
                    <p class="ultra-small margin more-text">Daily Sales</p>
                </li>
                <li class="li-hover">
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div class="sample-chart-wrapper">
                                <div class="ct-chart ct-golden-section" id="ct2-chart"></div>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
            <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
        </aside>
        <!-- END LEFT SIDEBAR NAV-->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START CONTENT -->
        <section id="content">
            <!--breadcrumbs start-->
            <div id="breadcrumbs-wrapper" class=" grey lighten-3">
                <!-- Search for small screen -->
                <div class="header-search-wrapper grey hide-on-large-only">
                    <i class="mdi-action-search active"></i>
                    <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <h5 class="breadcrumbs-title">Customer Details - Reservation</h5>

                        </div>
                    </div>
                </div>
            </div>
            <!--breadcrumbs end-->
            <!--start container-->
            <div class="row">
                <div class="card-panel">
                    <h4 class="header2">Form with validation</h4>
                    <div class="row">
                        <form class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="mdi-action-account-circle prefix"></i>
                                    <input id="name4" type="text" class="validate">
                                    <label for="first_name">Name</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="mdi-communication-email prefix"></i>
                                    <input id="email4" type="email" class="validate">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="mdi-action-lock-outline prefix"></i>
                                    <input id="password5" type="password" class="validate">
                                    <label for="password">Password</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="mdi-action-question-answer prefix"></i>
                                    <textarea id="message4" class="materialize-textarea validate" length="120"></textarea>
                                    <label for="message">Message</label>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                                            <i class="mdi-content-send right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Floating Action Button -->
                <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                    <a class="btn-floating btn-large red"><i class="large mdi-editor-mode-edit"></i></a>
                    <ul>
                        <li>
                            <a href="css-helpers.html" class="btn-floating red"><i class="large mdi-communication-live-help"></i></a>
                        </li>
                        <li>
                            <a href="app-widget.html" class="btn-floating yellow darken-1"><i class="large mdi-device-now-widgets"></i></a>
                        </li>
                        <li>
                            <a href="app-calendar.html" class="btn-floating green"><i class="large mdi-editor-insert-invitation"></i></a>
                        </li>
                        <li>
                            <a href="app-email.html" class="btn-floating blue"><i class="large mdi-communication-email"></i></a>
                        </li>
                    </ul>
                </div>
                <!-- Floating Action Button -->
            </div>
            <!--end container-->
        </section>
        <!-- END CONTENT -->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START RIGHT SIDEBAR NAV-->
        <aside id="right-sidebar-nav">
            <ul id="chat-out" class="side-nav rightside-navigation">
                <li class="li-hover">
                    <a href="#" data-activates="chat-out" class="chat-close-collapse right"><i class="mdi-navigation-close"></i></a>
                    <div id="right-search" class="row">
                        <form class="col s12">
                            <div class="input-field">
                                <i class="mdi-action-search prefix"></i>
                                <input id="icon_prefix" type="text" class="validate">
                                <label for="icon_prefix">Search</label>
                            </div>
                        </form>
                    </div>
                </li>
                <li class="li-hover">
                    <ul class="chat-collapsible" data-collapsible="expandable">
                        <li>
                            <div class="collapsible-header teal white-text active">
                                <i class="mdi-social-whatshot"></i>Recent Activity
                            </div>
                            <div class="collapsible-body recent-activity">
                                <div class="recent-activity-list chat-out-list row">
                                    <div class="col s3 recent-activity-list-icon">
                                        <i class="mdi-action-add-shopping-cart"></i>
                                    </div>
                                    <div class="col s9 recent-activity-list-text">
                                        <a href="#">just now</a>
                                        <p>Jim Doe Purchased new equipments for zonal office.</p>
                                    </div>
                                </div>
                                <div class="recent-activity-list chat-out-list row">
                                    <div class="col s3 recent-activity-list-icon">
                                        <i class="mdi-device-airplanemode-on"></i>
                                    </div>
                                    <div class="col s9 recent-activity-list-text">
                                        <a href="#">Yesterday</a>
                                        <p>Your Next flight for USA will be on 15th August 2015.</p>
                                    </div>
                                </div>
                                <div class="recent-activity-list chat-out-list row">
                                    <div class="col s3 recent-activity-list-icon">
                                        <i class="mdi-action-settings-voice"></i>
                                    </div>
                                    <div class="col s9 recent-activity-list-text">
                                        <a href="#">5 Days Ago</a>
                                        <p>Natalya Parker Send you a voice mail for next conference.</p>
                                    </div>
                                </div>
                                <div class="recent-activity-list chat-out-list row">
                                    <div class="col s3 recent-activity-list-icon">
                                        <i class="mdi-action-store"></i>
                                    </div>
                                    <div class="col s9 recent-activity-list-text">
                                        <a href="#">Last Week</a>
                                        <p>Jessy Jay open a new store at S.G Road.</p>
                                    </div>
                                </div>
                                <div class="recent-activity-list chat-out-list row">
                                    <div class="col s3 recent-activity-list-icon">
                                        <i class="mdi-action-settings-voice"></i>
                                    </div>
                                    <div class="col s9 recent-activity-list-text">
                                        <a href="#">5 Days Ago</a>
                                        <p>Natalya Parker Send you a voice mail for next conference.</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header light-blue white-text active">
                                <i class="mdi-editor-attach-money"></i>Sales Repoart
                            </div>
                            <div class="collapsible-body sales-repoart">
                                <div class="sales-repoart-list  chat-out-list row">
                                    <div class="col s8">Target Salse</div>
                                    <div class="col s4">
                                        <span id="sales-line-1"></span>
                                    </div>
                                </div>
                                <div class="sales-repoart-list chat-out-list row">
                                    <div class="col s8">Payment Due</div>
                                    <div class="col s4">
                                        <span id="sales-bar-1"></span>
                                    </div>
                                </div>
                                <div class="sales-repoart-list chat-out-list row">
                                    <div class="col s8">Total Delivery</div>
                                    <div class="col s4">
                                        <span id="sales-line-2"></span>
                                    </div>
                                </div>
                                <div class="sales-repoart-list chat-out-list row">
                                    <div class="col s8">Total Progress</div>
                                    <div class="col s4">
                                        <span id="sales-bar-2"></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header red white-text">
                                <i class="mdi-action-stars"></i>Favorite Associates
                            </div>
                            <div class="collapsible-body favorite-associates">
                                <div class="favorite-associate-list chat-out-list row">
                                    <div class="col s4">
                                        <img src="images/avatar.jpg" alt="" class="circle responsive-img online-user valign profile-image">
                                    </div>
                                    <div class="col s8">
                                        <p>Eileen Sideways</p>
                                        <p class="place">Los Angeles, CA</p>
                                    </div>
                                </div>
                                <div class="favorite-associate-list chat-out-list row">
                                    <div class="col s4">
                                        <img src="images/avatar.jpg" alt="" class="circle responsive-img online-user valign profile-image">
                                    </div>
                                    <div class="col s8">
                                        <p>Zaham Sindil</p>
                                        <p class="place">San Francisco, CA</p>
                                    </div>
                                </div>
                                <div class="favorite-associate-list chat-out-list row">
                                    <div class="col s4">
                                        <img src="images/avatar.jpg" alt="" class="circle responsive-img offline-user valign profile-image">
                                    </div>
                                    <div class="col s8">
                                        <p>Renov Leongal</p>
                                        <p class="place">Cebu City, Philippines</p>
                                    </div>
                                </div>
                                <div class="favorite-associate-list chat-out-list row">
                                    <div class="col s4">
                                        <img src="images/avatar.jpg" alt="" class="circle responsive-img online-user valign profile-image">
                                    </div>
                                    <div class="col s8">
                                        <p>Weno Carasbong</p>
                                        <p>Tokyo, Japan</p>
                                    </div>
                                </div>
                                <div class="favorite-associate-list chat-out-list row">
                                    <div class="col s4">
                                        <img src="images/avatar.jpg" alt="" class="circle responsive-img offline-user valign profile-image">
                                    </div>
                                    <div class="col s8">
                                        <p>Nusja Nawancali</p>
                                        <p class="place">Bangkok, Thailand</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </aside>
        <!-- LEFT RIGHT SIDEBAR NAV-->
    </div>
    <!-- END WRAPPER -->
</div>
<!-- END MAIN -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START FOOTER -->
<footer class="page-footer">
    <div class="footer-copyright">
        <div class="container">
            <span>Copyright © 2015 <a class="grey-text text-lighten-4" href="http://themeforest.net/user/geekslabs/portfolio?ref=geekslabs" target="_blank">GeeksLabs</a> All rights reserved.</span>
            <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="http://geekslabs.com/">GeeksLabs</a></span>
        </div>
    </div>
</footer>
<!-- END FOOTER -->
<!-- ================================================
Scripts
================================================ -->
<!-- jQuery Library -->
<script type="text/javascript" src="{{ URL::asset('js/jquery-1.11.2.min.js'); }}"></script>
<!--materialize js-->
<script type="text/javascript" src="{{ URL::asset('js/materialize.js'); }}"></script>
<!--prism-->
<script type="text/javascript" src="{{ URL::asset('js/prism.js'); }}"></script>
<!--scrollbar-->
<script type="text/javascript" src="{{ URL::asset('js/plugins/perfect-scrollbar/perfect-scrollbar.min.js'); }}"></script>
<!-- chartist -->
<script type="text/javascript" src="{{ URL::asset('js/plugins/chartist-js/chartist.min.js'); }}"></script>
<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="{{ URL::asset('js/plugins.js'); }}"></script>
</body>
</html>












