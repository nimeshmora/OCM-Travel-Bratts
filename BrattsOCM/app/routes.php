<?php

/*
 Home Pages
 */

Route::get('/', array(

     'as' => 'login-page',
     'uses' => 'HomeController@showLogin'
    ));

Route::get('user-login', array(
    'as' => 'login-page',
    'uses' => 'HomeController@showLogin'
));

Route::get('user-pay', array(

    'as' => 'registration-payment',
    'uses' => 'HomeController@showPayment'
));

/*
  ------------------------------------------------------ Un Authenticated Group ------------------------------------
  */

    /*
     User Registered and Create Account (POST)
     */

Route::post('user-register',array(

    'before' => 'csrf|guest',
    'as' => 'register-account-post',
    'uses' => 'AccountController@postRegister'

));

    /*
     User SignIn (POST)
     */

Route::post('user-signin', array(

    'before' => 'csrf',
    'as' => 'signin-user-post',
    'uses' => 'AccountController@postSignIn'

));

    /*
     User Registration(GET)
     */

Route::get('user-register', array(

        'before' => 'guest',
        'as' => 'register-account',
        'uses' => 'AccountController@getRegister'
));

    /*
      User SignIn (GET)
     */

Route::get('user-signin', array(

        'before' => 'guest',
        'as' => 'login-user',
        'uses' => 'AccountController@getSignIn'

));

    /*
     company register (GET)
     * */

Route::get('company-details', array(

    'before' => 'guest',
    'as' => 'comapny-register',
    'uses' => 'AccountController@getCompanyDetails'

));

/*
     company register (POST)
     * */

Route::post('company-details', array(

    'before' => 'csrf|guest',
    'as' => 'comapny-register-post',
    'uses' => 'AccountController@postCompanyDetails'

));


Route::get('admin-dashboard', array(

    'before' => 'auth',
    'as' => 'dashboard-logged-admin',
    'uses' => 'DashboardController@getLoggedinDashboard'
));

Route::get('staff-dashboard', array(

    'before' => 'auth',
    'as' => 'dashboard-logged-staff',
    'uses' => 'DashboardController@getLoggedinDashboard'
));



/*
 ---------------------------------- Authenticatied Group --------------------------------------------------------
 */

Route::group(array('before' => 'auth'), function(){

    /*
     CSRF Protection Group
     */
    Route::group(array('before' => 'csrf'), function(){

        /*
         Change Password POST
         */
        Route::post('change-password', array(


            'as' => 'forgot-password-post',
            'uses' => 'AccountController@postForgotPassword'

        ));

    } );



    /*
     Change Password GET
     */
    Route::get('change-password', array(

       'as' => 'forgot-password',
        'uses' => 'AccountController@getForgotPassword'

    ));

    /*
     Signout GET
     */
    Route::get('sign-out', array(


        'as' => 'sign-out-user',
        'uses' => 'AccountController@getSignOut'
    ));

});


Route::get('link-sent', array(

        'as' => 'link-sent',
        'uses' => 'HomeController@getActivationLinkPage'
));

Route::get('user-register/{code}',array(

    'before' => 'guest',
    'as' => 'account-activate',
    'uses' => 'AccountController@getActivate'

));





/*
 -------------------------------------------------- Left side Bar Menu Routes -------------------------------------------------------
  */
    /*
     ----------------------------------------------- Authenticated Group -----------------------------------------------------
     **/
Route::group(array('before' => 'auth'),function(){

    /*
     * Dashboard Reservations Menu Routes
     *
     * */

    Route::get('user-dashboard/our-reservation/new-booking', array(

        'as' => 'book-room-own-hotel',
        'uses' => 'ReservationController@getReservation'
    ));

    Route::get('user-dashboard/our-reservation/new-booking/reserve-user',array(

        'as' => 'reserve-user-details',
        'uses' => 'ReservationController@getReservationUserDetails'
    ));

    Route::post('user-dashboard/our-reservation/new-booking/reserve-user',array(

        'as' => 'reserve-user-details-post',
        'uses' => 'ReservationController@postReservationUserDetails'
    ));



    Route::get('user-dashboard/our-reservation/new-booking/reserve-user-room-details',array(

        'as' => 'reserve-user-room-details',
        'uses' => 'ReservationController@getReservationUserRoomDetails'
    ));

    Route::get('user-dashboard/our-reservation/new-booking/room-details-to-cart',array(

        'as' => 'reserve-room-to-cart',
        'uses' => 'ReservationController@addRoomDetailsToCart'
    ));
    Route::get('user-dashboard/our-reservation/new-booking/my-cart',array(

        'as' => 'view-cart',
        'uses' => 'ReservationController@getMyCart'
    ));


    Route::get('user-dashboard/our-reservation/new-booking/reserve-user-room-details/accommodation-details',array(

        'as' => 'accommodation-details',
        'uses' => 'AccommodationDetailsController@getAccommodationDetails'
    ));

    Route::post('user-dashboard/our-reservation/new-booking/reserve-user-room-details/accommodation-details',array(

        'as' => 'accommodation-details-post',
        'uses' => 'AccommodationDetailsController@postAccommodationDetails'
    ));





    Route::get('user-dashboard/our-reservation/view-booking', array(

        'as' => 'view-booked-own-hotel',
        'uses' => 'ReservationController@getBookings'
    ));

    Route::get('user-dashboard/our-reservation/cancel-booking', array(

        'as' => 'cancel-booking',
        'uses' => 'ReservationController@cancelBooking'
    ));

    Route::get('user-dashboard/our-reservation/refund-booking', array(

        'as' => 'refund-booking',
        'uses' => 'ReservationController@refundBooking'
    ));


    Route::get('user-dashboard/our-reservation/available-rooms', array(

        'as' => 'view-availables-own-hotel',
        'uses' => 'ReservationController@getAvailableRooms'
    ));

    Route::get('user-dashboard/our-reservation/available-rooms/get-image', array(

        'as' => 'get-room-image',
        'uses' => 'ReservationController@getImage'
    ));

    /*Route::get('user-dashboard/our-reservation/new-booking/get-booked-room-detail', array(

        'as' => 'get-booked-room',
        'uses' => 'ReservationController@getBookedRoom'
    ));*/


    /*
     * Dashboard MyChannel Menu Routes
     *
     * */

    Route::get('user-dashboard/my-channel/company-profile', array(

        'as' => 'company-profile',
        'uses' => 'MyChannelController@getCompanyProfile'
    ));

    Route::post('user-dashboard/my-channel/company-profile/owner-detail', array(

        'as' => 'owner-details-modal',
        'uses' => 'MyChannelController@postOwnerDetail'
    ));


    Route::get('user-dashboard/my-channel/branches', array(

        'as' => 'company-branches',
        'uses' => 'MyChannelController@getCompanyBranches'
    ));



    Route::get('user-dashboard/my-channel/users', array(

        'as' => 'company-users',
        'uses' => 'MyChannelController@getCompanyUsers'
    ));

    Route::get('user-dashboard/my-channel/image-upload-company', array(

        'as' => 'image-upload-company',
        'uses' => 'MyChannelController@getCompanyImage'
    ));



    /*
     * Dashboard Branch Management Menu Routes
     *
     * */

    Route::get('user-dashboard/branch-management/add-branch', array(

        'as' => 'add-branch',
        'uses' => 'BranchManagementController@getBranchAdd'
    ));

    Route::post('user-dashboard/branch-management/add-branch', array(

        'as' => 'add-branch-post',
        'uses' => 'BranchManagementController@postBranchAdd'
    ));

    Route::get('user-dashboard/branch-management/add-staff', array(

        'as' => 'add-staff',
        'uses' => 'BranchManagementController@getStaffAdd'
    ));

    Route::post('user-dashboard/branch-management/add-staff', array(

        'as' => 'add-staff-post',
        'uses' => 'BranchManagementController@postStaffAdd'
    ));

    Route::get('user-dashboard/branch-management/add-room', array(

        'as' => 'add-room',
        'uses' => 'BranchManagementController@getRoomAdd'
    ));

    Route::post('user-dashboard/branch-management/add-room', array(

        'as' => 'add-room-post',
        'uses' => 'BranchManagementController@postRoomAdd'
    ));

    Route::get('user-dashboard/branch-management/add-package', array(

        'as' => 'add-package',
        'uses' => 'BranchManagementController@getPackageAdd'
    ));


    /*
     * Dashboard External Bookings Menu Routes
     *
     * */

    Route::get('user-dashboard/external-bookings/available-hotels', array(

        'as' => 'available-external-hotels',
        'uses' => 'ExternalBookingController@getAvailableBookings'
    ));

    /*
     * Dashboard User Profile Menu Routes
     *
     * */

    Route::get('user-dashboard/user-profile', array(

        'as' => 'user-profile',
        'uses' => 'UserProfileController@getUserProfile'
    ));

    Route::post('user-dashboard/user-profile', array(

        'as' => 'post-user-profile',
        'uses' => 'UserProfileController@getUserProfile'
    ));

});





Route::get('user-test',array(
        'uses' => 'TestController@cartTest'
    )


);

Route::get('user-test2', function(){

    return View::make('test');
});





