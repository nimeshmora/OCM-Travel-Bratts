<?php


class ReservationController extends BaseController{

    public function getReservation(){
        Cart::destroy();
        $role = Auth::user()->role;

        if($role=='hotel-admin') {
            $company_id_logged_user = Auth::user()->comp_id;
            DB::setFetchMode(PDO::FETCH_ASSOC);
            $data_room_details = DB::table('hotel_rooms')
                ->join('branch', 'hotel_rooms.branch_code', '=', 'branch.branch_code')
                ->select('hotel_rooms.room_code', 'hotel_rooms.branch_code', 'hotel_rooms.price_per_night', 'hotel_rooms.description', 'hotel_rooms.status', 'hotel_rooms.image', 'branch.branch_name', 'branch.address', 'branch.email', 'branch.city')
                ->where('branch.company_id', '=', $company_id_logged_user)
                ->where('hotel_rooms.status', '=', 'available')
                ->get();
//            dd($data_room_details);
        }
        elseif($role == 'hotel-staff'){

            $staff_id = Auth::user()->id;
            DB::setFetchMode(PDO::FETCH_ASSOC);
            $owned_branch_code = DB::table('staff')
                ->select('staff.branch')
                ->where('person_id','=',$staff_id)
                ->first();

            $data_room_details = DB::table('hotel_rooms')
                ->join('branch', 'hotel_rooms.branch_code', '=', 'branch.branch_code')
                ->select('hotel_rooms.room_code', 'hotel_rooms.branch_code', 'hotel_rooms.price_per_night', 'hotel_rooms.description', 'hotel_rooms.status', 'hotel_rooms.image', 'branch.branch_name', 'branch.address', 'branch.email', 'branch.city')
                ->where('branch.branch_code', '=', $owned_branch_code)
                ->where('hotel_rooms.status', '=', 'available')
                ->get();
       // dd($data_room_details);
        }
        return View::make('reservations.available-bookings', array(
            'data' => $data_room_details

        ));

    }

    public function postReservation(){


    }

    public function getReservationUserDetails(){

        return View::make('reservations.reservation-user');
    }

    public function postReservationUserDetails(){

        $bookedData = Session::get('roomData');


        $validator = Validator::make(Input::all(),

            array(
                'full_name'=>  'required|max:250',
                'address'=> 'required|max:250',
                'email'=> 'required|max:250|email',
                'country'=> 'required|max:250',
                'phone'=> 'required'

            )

        );
        if($validator->fails()){

            return Redirect::route('reserve-user-details')
                ->withErrors($validator)
                ->withInput();
        }else{


            $customerCompany = Auth::user()->comp_id;
            $fullName_c = Input::get('full_name');
            $address_c = Input::get('address');
            $email_c = Input::get('email');
            $country_c = Input::get('country');
            $phone_c = Input::get('phone');


            $mytime = Carbon\Carbon::now();

            $insertToCustomerTable = DB::table('customer')->insert(
                    ['fullname' =>  $fullName_c,
                        'address' => $address_c,
                        'phonenumber' => $email_c,
                        'email' => $country_c,
                        'country' => $phone_c,
                        'company_id' => $customerCompany,
                        'created_at' => $mytime->toDateTimeString(),
                        'updated_at' => $mytime->toDateTimeString()

                    ]
                );

            if($insertToCustomerTable){

                $updatedCustomerId = DB::table('customer')->max('customer_id');
                Session::put('customerID' , $updatedCustomerId);


                return Redirect::route('accommodation-details');

            } else{

                return Redirect::route('reserve-user-details');
            }


        }
    }


    public function getReservationUserRoomDetails(){

        $bookedDetails = Input::all();
        Session::put('roomData',$bookedDetails);
        $isSaved=true;

        return Response::json($isSaved);
    }

    public function addRoomDetailsToCart(){

        $addToCartDetailsOfRoom = Input::all();


       Cart::add(array('id'=>$addToCartDetailsOfRoom['roomIDBook'],'name'=>$addToCartDetailsOfRoom['branchBook'],'qty'=>1,'price'=>$addToCartDetailsOfRoom['priceBook']));
       //Cart::destroy();

        $addedToCart=true;
        return Response::json($addedToCart);
    }

    public function getMyCart(){

        $cart = Cart::content();

        return View::make('reservations.cart',array(
            'cartDetails' => $cart

        ));
    }



    public function getBookings(){

        $role = Auth::user()->role;
        if($role=='hotel-admin') {
            DB::setFetchMode(PDO::FETCH_ASSOC);
            $data_room_details = DB::table('accommodation')
                ->join('customer', 'accommodation.customer_id', '=', 'customer.customer_id')
                ->select('accommodation.booking_id','customer.fullname', 'accommodation.branch_code', 'accommodation.room_code', 'accommodation.checkin_time', 'accommodation.checkout_time')
                ->where('accommodation.comp_id', '=', Auth::user()->comp_id)
                ->get();
        }elseif($role=='hotel-staff'){

            $staff_id = Auth::user()->id;
            DB::setFetchMode(PDO::FETCH_ASSOC);
            $owned_branch_code = DB::table('staff')
                ->select('staff.branch')
                ->where('person_id','=',$staff_id)
                ->first();

            $data_room_details = DB::table('accommodation')
                ->join('customer', 'accommodation.customer_id', '=', 'customer.customer_id')
                ->select('accommodation.booking_id','customer.fullname', 'accommodation.branch_code', 'accommodation.room_code', 'accommodation.checkin_time', 'accommodation.checkout_time')
                ->where('accommodation.branch_code', '=', $owned_branch_code)
                ->get();

        }
        return View::make('reservations.view-bookings',array(

            'dataBookings' =>$data_room_details
        ));
    }

    public function cancelBooking(){
        $cancelled = false;
        $accommodation_id = Input::all();
        DB::setFetchMode(PDO::FETCH_ASSOC);

        $branch = DB::table('hotel_rooms')
            ->select('branch_code')
            ->where('room_code','=',$accommodation_id['roomCode'])->first();

        $mytime = Carbon\Carbon::now();


        DB::table('refund')->insert(
            [

                'customer_name'=>$accommodation_id['customer_name'],
                'room_id' => $accommodation_id['roomCode'],
                'branch_id' => $branch['branch_code'],
              //  'date'=> $mytime->toDayDateTimeString()
                'date' => date('y-m-d')
               // 'amount' =>
            ]

        );

        $customer_id = DB::table('accommodation')
            ->select('customer_id')
            ->where('booking_id','=',$accommodation_id['accommodation_id'])->first();

        $other_bookings = DB::table('accommodation')
            ->where('customer_id','=',$customer_id)
            ->count('booking_id');

        if($other_bookings==1){
            $room_status = DB::table('hotel_rooms')
                ->where('room_code','=',$accommodation_id['roomCode'])
                ->update(array('status'=>'available'));


            $isDeleted = DB::table('accommodation')
                ->where('booking_id','=',$accommodation_id['accommodation_id'])
                ->delete();

            $isCustomerDeleted = DB::table('customer')
                ->where('customer_id','=',$customer_id)
                ->delete();


        }else{

            $isDeleted = DB::table('accommodation')
                ->where('booking_id','=',$accommodation_id['accommodation_id'])
                ->delete();

            $room_status = DB::table('hotel_rooms')
                ->where('room_code','=',$accommodation_id['roomCode'])
                ->update(array('status'=>'available'));


        }

        return Response::json($cancelled);
    }

    public function refundBooking(){

        $accommodation_id = Input::all();
        DB::setFetchMode(PDO::FETCH_ASSOC);
dd($accommodation_id);
        if(Auth::user()->role=='hotel-staff') {
            $user_name = Auth::user()->full_name;
            $company_id = Auth::user()->comp_id;

            $admin_email = DB::table('person')
                ->select('email')
                ->where('comp_id','=',$company_id)
                ->where('role','=','hotel-admin')->first();

            $data = array('adminEmail'=>$admin_email,'bookindID'=> $accommodation_id, 'userName'=> $user_name);
            Mail::send('emails.auth.activate', $data,function($message) use ($data){

                $message->to($data['adminEmail'])->subject('Staff member has been requested for refund of money for cancelled booking!');
            });

            }
        return Response::json();

    }
    public function getAvailableRooms(){

        $role = Auth::user()->role;

        if($role=='hotel-admin') {
            $company_id_logged_user = Auth::user()->comp_id;
            DB::setFetchMode(PDO::FETCH_ASSOC);
            $data_room_details = DB::table('hotel_rooms')
                ->join('branch', 'hotel_rooms.branch_code', '=', 'branch.branch_code')
                ->select('hotel_rooms.room_code', 'hotel_rooms.branch_code', 'hotel_rooms.price_per_night', 'hotel_rooms.description', 'hotel_rooms.status', 'hotel_rooms.image', 'branch.branch_name', 'branch.address', 'branch.email', 'branch.city')
                ->where('branch.company_id', '=', $company_id_logged_user)
                ->where('hotel_rooms.status', '=', 'available')
                ->get();
//            dd($data_room_details);
        }
        elseif($role == 'hotel-staff'){

            $staff_id = Auth::user()->id;
            DB::setFetchMode(PDO::FETCH_ASSOC);
            $owned_branch_code = DB::table('staff')
                ->select('staff.branch')
                ->where('person_id','=',$staff_id)
                ->first();

            $data_room_details = DB::table('hotel_rooms')
                ->join('branch', 'hotel_rooms.branch_code', '=', 'branch.branch_code')
                ->select('hotel_rooms.room_code', 'hotel_rooms.branch_code', 'hotel_rooms.price_per_night', 'hotel_rooms.description', 'hotel_rooms.status', 'hotel_rooms.image', 'branch.branch_name', 'branch.address', 'branch.email', 'branch.city')
                ->where('branch.branch_code', '=', $owned_branch_code)
                ->where('hotel_rooms.status', '=', 'available')
                ->get();
            // dd($data_room_details);
        }
        return View::make('reservations.available-rooms', array(
            'data' => $data_room_details
        ));

    }

    public function getImage()
    {

        $room_id_for_image = Input::get('roomID');
        DB::setFetchMode(PDO::FETCH_ASSOC);
        $imageURL = DB::table('hotel_rooms')
            ->join('branch', 'hotel_rooms.branch_code', '=', 'branch.branch_code')
            ->select('hotel_rooms.room_code','hotel_rooms.branch_code','hotel_rooms.price_per_night','hotel_rooms.description','hotel_rooms.status','hotel_rooms.image','branch.branch_name','branch.address','branch.email','branch.city')
            ->where('hotel_rooms.room_code', '=', $room_id_for_image)
            ->first();
        return Response::json($imageURL);

    }


    public function getBookedRoom(){

        $bookedRoomDetails = Input::get('r_code_book');
        alert($bookedRoomDetails);
    }


}