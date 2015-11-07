@extends('layouts.master-layout')

@section('content')

    <section id="content">
        <!--start container-->
        <div class="container">
            <div id="profile-page" class="section">
                <!-- profile-page-header -->
                <div id="profile-page-header" class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="" alt="user background">
                    </div>
                    <figure class="card-profile-image">
                        <img src="" alt="profile image" class="ct-square z-depth-2 responsive-img activator">
                    </figure>
                    <div class="card-content">
                        <div class="row">
                            @if(isset($data_admin))
                                <div class="col s3 offset-s2">
                                    <h4 class="card-title grey-text text-darken-4">{{ $data_admin->full_name }}</h4>
                                    <p class="medium-small grey-text">Hotel Administrator</p>
                                </div>
                            @endif
                            <div class="col s2 center-align">
                                <h4 class="card-title grey-text text-darken-4">{{ $data_branches }}</h4>
                                <p class="medium-small grey-text">Branches</p>
                            </div>
                            <div class="col s2 center-align">
                                <h4 class="card-title grey-text text-darken-4">{{$company_room_count}}</h4>
                                <p class="medium-small grey-text">Rooms</p>
                            </div>
                            <div class="col s2 center-align">
                                <h4 class="card-title grey-text text-darken-4">${{ $company_profit }}.00</h4>
                                <p class="medium-small grey-text">Busness Profit</p>
                            </div>
                            <div class="col s1 right-align">
                                <a class="btn-floating activator waves-effect waves-light darken-2 right"> <i class="mdi-action-perm-identity"></i> </a>
                            </div>
                        </div>
                    </div>
                    @if(isset($data_owner))
                        <div class="card-reveal">
                            <p> <span class="card-title grey-text text-darken-4">{{ $data_owner->fullname }} <i class="mdi-navigation-close right"></i></span> <span><i class="mdi-action-perm-identity cyan-text text-darken-2"></i> Hotel Owner</span> </p>
                            <p>{{ $data_owner->details }}</p>
                            <p><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i> {{ $data_owner->telephone }}</p>
                            <p><i class="mdi-communication-email cyan-text text-darken-2"></i> {{ $data_owner->email }}</p>
                            <p><i class="mdi-social-cake cyan-text text-darken-2"></i>{{ $data_owner->address }}</p>
                            <p><i class="mdi-device-airplanemode-on cyan-text text-darken-2"></i> {{ $data_owner->city }}</p>
                        </div>
                    @endif
                </div>
                <!--/ profile-page-header -->
                <!-- profile-page-content -->
                <div id="profile-page-content" class="row">
                    <!-- profile-page-sidebar-->
                    <div id="profile-page-sidebar" class="col s12 m12">
                        <!-- Profile About  -->
                        @if(isset($data))
                            <div class="card light-blue">
                                <div class="card-content white-text">
                                    <span class="card-title">About Us!</span>
                                    <p>{{ $data->about }}</p>

                                </div>
                            </div>
                            @endif



                                    <!-- Profile About  -->
                            <!-- Profile About Details  -->
                            @if(isset($data))
                                <ul id="profile-page-about-details" class="collection z-depth-1">
                                    <li class="collection-item">
                                        <div class="row">
                                            <div class="col s5 grey-text darken-1">
                                                <i class="mdi-action-wallet-travel"></i> Company
                                            </div>
                                            <div class="col s7 grey-text text-darken-4 right-align">{{ $data->company_name }}</div>
                                        </div>
                                    </li>
                                    <li class="collection-item">
                                        <div class="row">
                                            <div class="col s5 grey-text darken-1">
                                                <i class="mdi-social-poll"></i>City
                                            </div>
                                            <div class="col s7 grey-text text-darken-4 right-align">{{ $data->city }}</div>
                                        </div>
                                    </li>
                                    <li class="collection-item">
                                        <div class="row">
                                            <div class="col s5 grey-text darken-1">
                                                <i class="mdi-social-domain"></i> Country
                                            </div>
                                            <div class="col s7 grey-text text-darken-4 right-align">{{ $data->country }}</div>
                                        </div>
                                    </li>
                                    <li class="collection-item">
                                        <div class="row">
                                            <div class="col s5 grey-text darken-1">
                                                <i class="mdi-social-cake"></i> Address
                                            </div>
                                            <div class="col s7 grey-text text-darken-4 right-align">{{ $data->address }}</div>
                                        </div>
                                    </li>
                                </ul>
                                @endif
                                        <!--/ Profile About Details  -->
                                <!-- Profile About  -->
                                <div class="card amber darken-2">
                                    <div class="card-content white-text center-align">
                                        <p class="card-title"><i class="mdi-social-group-add"></i> {{ $client }}</p>
                                        <p>Customers</p>
                                    </div>
                                </div>
                                <!-- Profile About  -->
                                <!-- Profile feed  -->
                                <ul id="profile-page-about-feed" class="collection z-depth-1">
                                </ul>
                                <!-- Profile feed  -->
                                <!-- task-card -->
                                <ul id="task-card" class="collection with-header">
                                </ul>
                                <!-- task-card -->
                                <!-- Profile Total sell -->
                                <div class="card center-align">
                                    <div class="card-content purple white-text">
                                        <p class="card-stats-title"><i class="mdi-editor-attach-money"></i>Your Profit</p>
                                        <h4 class="card-stats-number">${{$company_profit}}.00</h4>
                                        <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 70% <span class="purple-text text-lighten-5">last month</span> </p>
                                    </div>
                                </div>
                                <!-- flight-card -->
                                <div id="flight-card" class="card">
                                    <div class="card-header amber darken-2">
                                    </div>
                                    <div class="card-content-bg white-text">
                                    </div>
                                </div>
                                <!-- flight-card -->
                                <!-- Map Card -->
                                <div class="map-card">
                                    <div class="card">
                                        <div class="card-image waves-effect waves-block waves-light">
                                        </div>
                                        <div class="card-reveal">
                                            <span class="card-title grey-text text-darken-4">Company Name LLC <i class="mdi-navigation-close right"></i></span>
                                            <p>Here is some more information about this company. As a creative studio we believe no client is too big nor too small to work with us to obtain good advantage.By combining the creativity of artists with the precision of engineers we develop custom solutions that achieve results.Some more information about this company.</p>
                                            <p><i class="mdi-action-perm-identity cyan-text text-darken-2"></i> Manager Name</p>
                                            <p><i class="mdi-communication-business cyan-text text-darken-2"></i> 125, ABC Street, New Yourk, USA</p>
                                            <p><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i> +1 (612) 222 8989</p>
                                            <p><i class="mdi-communication-email cyan-text text-darken-2"></i> support@geekslabs.com</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Map Card -->
                    </div>
                    <!-- profile-page-sidebar-->
                    <!-- profile-page-wall -->
                    <div id="profile-page-wall" class="col s12 m8">
                        <!-- profile-page-wall-share -->
                        <div id="profile-page-wall-share" class="row">
                        </div>
                        <!--/ profile-page-wall-share -->
                        <!-- profile-page-wall-posts -->



                        <!--/ profile-page-wall-posts -->
                    </div>
                    <div>
                        @if(Auth::user()->role==="hotel-admin")
                            <div class="col s1 right-align right">
                                <a class="btn-floating activator waves-effect waves-light darken-2 modal-trigger" href="#modal1"> <i class="mdi-content-create"></i> </a>
                            </div>

                        @endif
                    </div>



                    <div id="modal1" class="modal">
                        <div class="modal-content">
                            <h4 class="header2">Update Hotel Owner Details</h4>
                            <form class="col s12" action="{{ URL::route('owner-details-modal') }}" method="post">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="full_name" type="text" {{ (Input::old('full_name')) ? 'value="'. Input::old('full_name').'"' : '' }}>
                                        @if($errors ->has('full_name'))

                                            {{ $errors->first('full_name', '<small class=error>:message</small>') }}
                                        @endif
                                        <label for="full_name">Full Name</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="address" type="text" {{ (Input::old('address')) ? 'value="'. Input::old('address').'"' : '' }}>
                                        @if($errors ->has('address'))

                                            {{ $errors->first('address', '<small class=error>:message</small>') }}
                                        @endif
                                        <label for="address">Address</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="city" type="text" {{ (Input::old('city')) ? 'value="'. Input::old('city').'"' : '' }}>
                                        @if($errors ->has('city'))

                                            {{ $errors->first('city', '<small class=error>:message</small>') }}
                                        @endif
                                        <label for="city">City</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="country" type="text" {{ (Input::old('country')) ? 'value="'. Input::old('country').'"' : '' }}>
                                        @if($errors ->has('country'))

                                            {{ $errors->first('country', '<small class=error>:message</small>') }}
                                        @endif
                                        <label for="country">Country</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="email" type="email" {{ (Input::old('email')) ? 'value="'. Input::old('email').'"' : '' }}>
                                        @if($errors ->has('email'))

                                            {{ $errors->first('email', '<small class=error>:message</small>') }}
                                        @endif
                                        <label for="email">Email</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="tele" type="tel" {{ (Input::old('tele')) ? 'value="'. Input::old('tele').'"' : '' }}>
                                        @if($errors ->has('tele'))

                                            {{ $errors->first('tele', '<small class=error>:message</small>') }}
                                        @endif
                                        <label for="tele">Telephone</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <input name="mobile" type="tel" {{ (Input::old('mobile')) ? 'value="'. Input::old('mobile').'"' : '' }}>
                                        @if($errors ->has('mobile'))

                                            {{ $errors->first('mobile', '<small class=error>:message</small>') }}
                                        @endif
                                        <label for="mobile">Mobile</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea name="description" class="materialize-textarea" length="120" {{ (Input::old('description')) ? 'value="'. Input::old('description').'"' : '' }}></textarea>
                                        @if($errors ->has('description'))

                                            {{ $errors->first('description', '<small class=error>:message</small>') }}
                                        @endif
                                        <label for="description">Descripiton</label>
                                    </div>

                                    <div class="row">
                                        <input type="file"  name="photo" accept="image/*" class="upload_photo left-buffer">
                                    </div>


                                    <div class="modal-footer">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <div class="row">
                                                    <button class="btn cyan waves-effect waves-light imageup_btn right" type="submit" name="action">Submit
                                                        <i class="mdi-content-send right"></i>
                                                    </button>

                                                    <a href="{{ URL::route('book-room-own-hotel') }}"><button class="btn cyan waves-effect waves-light left"  name="action">Cancel
                                                            <i class="mdi-content-clear left"></i>
                                                        </button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>



        <!--end container-->
    </section>

    @stop

@section('scripts')
    @parent
    <script type="text/javascript">
        $(document).ready(function(){

            $('.imageup_btn').on('click',function(){


                var file_data = $('.upload_photo').prop('files')[0];
                var form_data = new FormData();
                form_data.append('file', file_data);

                $.ajax({
                    url: '{{action('image-upload-company')}}', // point to server-side PHP script
                    dataType: 'text',  // what to expect back from the PHP script, if anything
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    success: function (response) {
                        $('.image-container').notify("Profile Picture Upload Success", {position:"bottom center",className:"success",autoHideDelay: 5000});
                    }

            });



        });


    </script>
    @stop