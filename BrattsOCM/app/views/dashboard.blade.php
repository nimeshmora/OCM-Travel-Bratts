
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
            <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
            <link href="{{ URL::asset('js/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
            <link href="{{ URL::asset('js/plugins/jvectormap/jquery-jvectormap.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
            <link href="{{ URL::asset('js/plugins/chartist-js/chartist.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
            <link href="{{ URL::asset('js/plugins/morris-chart/morris.css') }}" type="text/css" rel="stylesheet" media="screen,projection"
                    >
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
                                    <li><h1 class="logo-wrapper"><a href="index.html" class="brand-logo darken-1"><img src="images/travelbratts.png" alt="materialize logo" height="50" width="300"></a> <span class="logo-text"></span></h1></li>
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
                                        <img src="images/avatar.jpg" class="circle responsive-img valign profile-image">
                                    </div>
                                    <div class="col col s8 m8 l8">
                                        <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">

                                            {{ Auth::user()->username }}<i class="mdi-navigation-arrow-drop-down right"></i></a>
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
                                        <a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-editor-mode-edit"></i>External Bookings</a>
                                        <div class="collapsible-body">
                                            <ul>
                                                <li>
                                                    <a href="page-contact.html">New Booking</a>
                                                </li>
                                                <li>
                                                    <a href="page-todo.html">Existing Bookings</a>
                                                </li>
                                                <li>
                                                    <a href="{{ URL::route('available-external-hotels') }}">Available Hotels</a>
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
                    <!-- END LEFT SIDEBAR NAV-->
                    <!-- //////////////////////////////////////////////////////////////////////////// -->
                    <!-- START CONTENT -->


                    <section id="content">
                        <!--start container-->
                        <div class="container">
                            <!--chart dashboard start-->
                            <div class="row">

                                <div class="move-up cyan darken-1 ">

                                    <div>

                                        <div>
                                            <span class="chart-title white-text">Room Details</span>
                                            <div class="switch chart-revenue-switch right">
                                            </div>
                                        </div>             @if(Auth::user()->role==="hotel-admin")

                                    </div>
                                    <div class="trending-line-chart-wrapper">
                                        <canvas id="trending-line-chart" height="70"></canvas>
                                    </div>
                                </div>
                                <div>

                                </div>


                                <div class="card-move-up waves-effect waves-block waves-light">
                                    <div class="move-up cyan darken-1">
                                        <div>
                                            <div class="switch chart-revenue-switch right">
                                            </div>


                                        </div>

                                    </div>
                                    @endif
                                </div>


                                <div class="col s12 m6 l4">

                                    <div class="card">
                                        <div class="card-content green white-text">
                                            <p class="card-stats-title"><i class="mdi-communication-vpn-key"></i> Booked</p>
                                            <h4 class="card-stats-number">{{ $booked }}</h4>
                                            <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 50% <span class="green-text text-lighten-5">from yesterday</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m6 l4">
                                    <div class="card">
                                        <div class="card-content green white-text">
                                            <p class="card-stats-title"><i class="mdi-content-add-box"></i> Available</p>
                                            <h4 class="card-stats-number">{{ $data }}</h4>
                                            <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 50% <span class="green-text text-lighten-5">from yesterday</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m6 l4">
                                    <div class="card">
                                        <div class="card-content  pink lighten-1 white-text">
                                            <p class="card-stats-title"><i class="mdi-content-clear"></i> Cancelled</p>
                                            <h4 class="card-stats-number">{{$cancelled}}</h4>
                                            <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 50% <span class="green-text text-lighten-5">from yesterday</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-reveal">
                                </div>
                            </div>
                            <div class="row">

                                <div class="col s12 m12 l8">


                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="row">
                                            <div class="col s12 m8 l8">
                                                <div>
                                                    <div class="card-move-up waves-effect waves-block waves-light">
                                                        <div class="move-up cyan darken-1">
                                                            <div>
                                                                <span class="chart-title white-text">Booking Details</span>
                                                                <div class="switch chart-revenue-switch right">
    </div>
                                                            </div>
                                                            <div class="trending-line-chart-wrapper">
    </div>
                                                        </div>
                                                    </div>
                                                    <div class="col s12 m6 l3">
                                                        <div class="card">
                                                            <div class="card-content  grey white-text">
                                                                <p class="card-stats-title"><i class="mdi-social-group-add"></i> Revenue</p>
                                                                <h4 class="card-stats-number">$435.7</h4>
                                                                <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 50% <span class="green-text text-lighten-5">from yesterday</span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col s12 m6 l3">
                                                        <div class="card">
                                                            <div class="card-content  grey white-text">
                                                                <p class="card-stats-title"><i class="mdi-social-group-add"></i> Total Sales</p>
                                                                <h4 class="card-stats-number">${{ $sales }}</h4>
                                                                <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 50% <span class="green-text text-lighten-5">from yesterday</span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col s12 m6 l3">
                                                        <div class="card">
                                                            <div class="card-content  grey white-text">
                                                                <p class="card-stats-title"><i class="mdi-social-group-add"></i> Total Refund</p>
                                                                <h4 class="card-stats-number">$23.56</h4>
                                                                <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 50% <span class="green-text text-lighten-5">from yesterday</span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col s12 m6 l3">
                                                        <div class="card">
                                                            <div class="card-content  green white-text">
                                                                <p class="card-stats-title"><i class="mdi-social-group-add"></i> Total clients</p>
                                                                <h4 class="card-stats-number">{{ $clients }}</h4>
                                                                <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 50% <span class="green-text text-lighten-5">from yesterday</span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-reveal">
    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--chart dashboard end-->
                            <!-- //////////////////////////////////////////////////////////////////////////// -->
                            <!--card stats start-->
                            <div id="card-stats">
    </div>

                        <!--card stats end-->
                            <!-- //////////////////////////////////////////////////////////////////////////// -->
                            <!--card widgets start-->
                            <div id="card-widgets">
                                <div class="row">
    </div>
                                <!--card widgets end-->
                                <!-- //////////////////////////////////////////////////////////////////////////// -->
                                <!--work collections start-->
                                <div id="work-collections">
                                    <div class="row">
                                        <div class="col s12 m12 l6">
                                            <ul id="projects-collection" class="collection">
                                                <li class="collection-item avatar">
                                                    <i class="mdi-image-wb-incandescent circle light-blue darken-2"></i>
                                                    <span class="collection-header">Available Rooms</span>
                                                    <p>Check Out</p>
                                                    <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>
                                                </li>
                                @if(isset($room_details))
                                    @foreach($room_details as $roomsData)
                                                <li class="collection-item">
                                                    <div class="row">
                                                        <div class="col s6">
                                                            <p class="collections-title">{{ $roomsData['branch_code'] }}</p>
                                                            <p class="collections-content">{{ $roomsData['room_code'] }}</p>
                                                        </div>
                                                        <div class="col s3">
                                                            <span class="task-cat grey darken-3">{{$roomsData['price_per_night']}}</span>
                                                        </div>
                                                        <div class="col s3">
                                                            <span class="task-cat grey darken-3">Two Beds</span>
                                                        </div>
                                                    </div>
                                                </li>
                                    @endforeach
                                    @endif
                                            </ul>
                                        </div>
                                        <div class="col s12 m12 l6">
                                            <ul id="issues-collection" class="collection">
                                                <li class="collection-item avatar">
                                                    <i class="mdi-maps-hotel circle red darken-2"></i>
                                                    <span class="collection-header">Booked Rooms</span>
                                                    <p>Assigned to Customers</p>
                                                    <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>
                                                </li>
                                    @if(isset($room_booked))

                                        @foreach($room_booked as $books)
                                                <li class="collection-item">
                                                    <div class="row">
                                                        <div class="col s7">
                                                            <p class="collections-title">{{ $books['branch_code'] }}</p>
                                                            <p class="collections-content">{{ $books['room_code'] }}</p>
                                                        </div>
                                                        <div class="col s2">
                                                            <span class="task-cat pink accent-2">{{$books['checkout_time'] }}</span>
                                                        </div>
                                                    </div>
                                                </li>
                                        @endforeach

                                            @endif

                                            </ul>
                                        </div>
                                    </div>
                                </div>


                                <!--work collections end-->
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

                            </div>

                            <!--end container-->
                    </section>
                    <!-- END CONTENT -->

                </div>
                <!-- END WRAPPER -->
            </div>
            <!-- END MAIN -->
            <!-- //////////////////////////////////////////////////////////////////////////// -->
            <!-- START FOOTER -->
            <footer class="page-footer">
                <div class="container">
                    <div class="row">
    </div>
                </div>
                <div class="footer-copyright">
                    <div class="container">
                        Copyright © 2015
                        <a class="grey-text text-lighten-4" href="http://themeforest.net/user/geekslabs/portfolio?ref=geekslabs" target="_blank">Travel Bratts</a> All rights reserved.
                        <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="http://geekslabs.com/">Travel Bratts</a></span>
                    </div>
                </div>
            </footer>
            <!-- END FOOTER -->
            <!-- ================================================
    Scripts
    ================================================ -->
            <!-- jQuery Library -->
            <script type="text/javascript" src="{{URL::asset('js/jquery-1.11.2.min.js')}}"></script>
            <!--materialize js-->
            <script type="text/javascript" src="{{URL::asset('js/materialize.js')}}"></script>
            <!--scrollbar-->
            <script type="text/javascript" src="{{URL::asset('js/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
            <!-- chartist -->
            <script type="text/javascript" src="{{URL::asset('js/plugins/chartist-js/chartist.min.js')}}"></script>
            <!-- chartjs -->
            <script type="text/javascript" src="{{URL::asset('js/plugins/chartjs/chart.min.js')}}"></script>
            <script type="text/javascript" src="{{URL::asset('js/plugins/chartjs/chart-script.js')}}"></script>
            <!-- sparkline -->
            <script type="text/javascript" src="{{URL::asset('js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
            <script type="text/javascript" src="{{URL::asset('js/plugins/sparkline/sparkline-script.js')}}"></script>
            <!-- google map api -->
            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAZnaZBXLqNBRXjd-82km_NO7GUItyKek"></script>
            <!--jvectormap-->
            <script type="text/javascript" src="{{URL::asset('js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
            <script type="text/javascript" src="{{URL::asset('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
            <script type="text/javascript" src="{{URL::asset('js/plugins/jvectormap/vectormap-script.js')}}"></script>
            <!--plugins.js - Some Specific JS codes for Plugin Settings-->
            <script type="text/javascript" src="{{URL::asset('js/plugins.js')}}"></script>

            <!-- morris -->
            <script type="text/javascript" src="{{ URL::asset('js/raphael-min.js') }}"></script>
            <script type="text/javascript" src="{{ URL::asset('js/plugins/morris-chart/morris.min.js') }}"></script>
            <script type="text/javascript" src="{{ URL::asset('js/plugins/morris-chart/morris-script.js') }}"></script>


        </body>
    </html>