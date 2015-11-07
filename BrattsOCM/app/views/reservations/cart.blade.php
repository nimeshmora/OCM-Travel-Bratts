@extends('layouts.master-layout')

@section('content')


    <!--start container-->

    <!-- START CONTENT -->

    <section id="content">
        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper" class=" grey lighten-3">
            <!-- Search for small screen -->
            <div class="header-search-wrapper grey hide-on-large-only">
                <i class="mdi-action-search active"></i>
                <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
            </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
            <div id="invoice">
                <div class="invoice-header">
                    <div class="row section">
                        <div class="col s12 m6 l6">
                            <!--<img src="images/generic-logo.png" alt="company logo"> -->
                            <p>To,
                                <br/>
                                <span class="strong">Jonathan Doe</span>
                                <br/>
                                <span>125, ABC Street,</span>
                                <br/>
                                <span>New Yourk, USA</span>
                                <br/>
                                <span>+91-(444)-(333)-(221)</span>
                            </p>
                        </div>

                        <div class="col s12 m6 l6">
                            <div class="invoce-company-address right-align">
                                <span class="invoice-icon"><i class="mdi-social-location-city cyan-text"></i></span>

                                <p><span class="strong">Company Name LLC</span>
                                    <br/>
                                    <span>125, ABC Street,</span>
                                    <br/>
                                    <span>New Yourk, USA</span>
                                    <br/>
                                    <span>+91-(444)-(333)-(221)</span>
                                </p>
                            </div>



                        </div>
                    </div>
                </div>

                <div class="invoice-lable">
                    <div class="row">
                        <div class="col s12 m3 l3 cyan">
                            <h4 class="white-text invoice-text">MY CART</h4>
                        </div>
                        <div class="col s12 m9 l9 invoice-brief cyan white-text">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="invoice-table">
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <table class="striped">
                                <thead>
                                <tr>
                                    <th data-field="no">Room ID</th>
                                    <th data-field="item">Branch Code</th>
                                    <th data-field="price">Price</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @if(isset($cartDetails))
                                @foreach($cartDetails as $data)

                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->price }} </td>

                                    <td></td>
                                    <td><p><a class="waves-effect waves-light btn light-pink mdi-action-delete  bookings" ></a></p>

                                    </td>
                                </tr>

                               @endforeach
                                    @endif
                                <tr>
                                    <td colspan="3" class="white"></td>
                                    <td>Sub Total</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="white"></td>
                                    <td>Service Tax</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="white"></td>
                                    <td class="cyan white-text">Grand Total</td>
                                    <td class="cyan strong white-text"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Floating Action Button -->
           <!-- <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red">
                    <i class="large mdi-editor-mode-edit"></i>
                </a>
                <ul>
                    <li><a href="css-helpers.html" class="btn-floating red"><i class="large mdi-communication-live-help"></i></a></li>
                    <li><a href="app-widget.html" class="btn-floating yellow darken-1"><i class="large mdi-device-now-widgets"></i></a></li>
                    <li><a href="app-calendar.html" class="btn-floating green"><i class="large mdi-editor-insert-invitation"></i></a></li>
                    <li><a href="app-email.html" class="btn-floating blue"><i class="large mdi-communication-email"></i></a></li>
                </ul>
            </div>  -->
            <!-- Floating Action Button -->
        </div>
        <!--end container-->

    </section>
    <div class="row top-buffer right-buffer ">
        <div class="right margin">

            <button class="btn pink waves-effect waves-light  right" type="submit" name="action"><a href="{{URL::route('reserve-user-details')}}">Submit
                <i class="mdi-content-send right"></i>
          </a>  </button>

        </div>

    </div>

@stop