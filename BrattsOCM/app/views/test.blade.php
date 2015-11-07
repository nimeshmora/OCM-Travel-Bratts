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
            <div class="container">
                <div class="row">
                    <div class="col s12 m12 l12">
                        <h5 class="breadcrumbs-title">Invoice</h5>
                        <ol class="breadcrumb">
                            <li><a href="index.html">Dashboard</a>
                            </li>
                            <li><a href="#">Pages</a>
                            </li>
                            <li class="active">Invoice</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
            <div id="invoice">
                <div class="invoice-header">
                    <div class="row section">
                        <div class="col s12 m6 l6">
                            <img src="images/generic-logo.png" alt="company logo">
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

                            <div class="invoce-company-contact right-align">
                                <span class="invoice-icon"><i class="mdi-communication-quick-contacts-mail cyan-text"></i></span>
                                <p><span class="strong">www.exampledomain.com</span>
                                    <br/>
                                    <span>info@exampledomain.com</span>
                                    <br/>
                                    <span>admin@exampledomain.com</span>
                                </p>
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
                                    <th data-field="no">No</th>
                                    <th data-field="item">Item</th>
                                    <th data-field="uprice">Unit Price</th>
                                    <th data-field="price">Unit</th>
                                    <th data-field="price">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>MacBook Pro</td>
                                    <td>$ 1,299.00</td>
                                    <td>2</td>
                                    <td>$ 1,100.00</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>iMAC</td>
                                    <td>$ 1,099.00</td>
                                    <td>2</td>
                                    <td>$ 2,198.00</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>iPhone</td>
                                    <td>$ 299.00</td>
                                    <td>5</td>
                                    <td>$ 1,495.00</td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>iPad 3</td>
                                    <td>$399.00</td>
                                    <td>1</td>
                                    <td>$ 399.00</td>
                                </tr>
                                <tr>
                                    <td>5.</td>
                                    <td>iPod</td>
                                    <td>$49.00</td>
                                    <td>2</td>
                                    <td>$ 98.00</td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="white"></td>
                                    <td>Sub Total:</td>
                                    <td>$ 5,290.00</td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="white"></td>
                                    <td>Service Tax</td>
                                    <td>11.00%</td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="white"></td>
                                    <td class="cyan white-text">Grand Total</td>
                                    <td class="cyan strong white-text">$ 5,871.90</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <div class="invoice-footer">
                    <div class="row">
                        <div class="col s12 m6 l6">
                            <p class="strong">Payment Method</p>
                            <p>Please make the cheque to: AMANDA ORTON</p>
                            <p class="strong">Terms & Condition</p>
                            <ul>
                                <li>You know, being a test pilot isn't always the healthiest business in the world.</li>
                                <li>We predict too much for the next year and yet far too little for the next 10.</li>
                            </ul>
                        </div>
                        <div class="col s12 m6 l6 center-align">
                            <p>Approved By</p>
                            <img src="images/signature-scan.png" alt="signature">
                            <p class="header">AMANDA ORTON</p>
                            <p>Managing Director</p>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Floating Action Button -->
            <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large red">
                    <i class="large mdi-editor-mode-edit"></i>
                </a>
                <ul>
                    <li><a href="css-helpers.html" class="btn-floating red"><i class="large mdi-communication-live-help"></i></a></li>
                    <li><a href="app-widget.html" class="btn-floating yellow darken-1"><i class="large mdi-device-now-widgets"></i></a></li>
                    <li><a href="app-calendar.html" class="btn-floating green"><i class="large mdi-editor-insert-invitation"></i></a></li>
                    <li><a href="app-email.html" class="btn-floating blue"><i class="large mdi-communication-email"></i></a></li>
                </ul>
            </div>
            <!-- Floating Action Button -->
        </div>
        <!--end container-->

    </section>
    @stop