<?php
/**
 * Created by PhpStorm.
 * User: Nimesha Jinarajadasa
 * Date: 9/21/2015
 * Time: 8:13 PM
 */

class AccommodationDetailsController extends BaseController {

    public function getAccommodationDetails(){

        return View::make('reservations.accommodation-details');
    }

    public function postAccommodationDetails()
    {

        //   dd($bookedDetails);
        $items = Cart::count(false);
        if ($items) {

            $items_in_cart = Cart::content();

            foreach ($items_in_cart as $data) {
                $roomBooked_id = $data->id;
                $branch_id = $data->name;
                $price_for_room = $data->price;
                $customer_booked = Session::get('customerID');

                $validator = Validator::make(Input::all(),

                    array(
                        'number_of_people' => 'required|integer',
                        'number_of_days' => 'required|integer',
                        'checkin' => 'required',
                        'checkout' => 'required',
                        'payment' => 'required',


                    )

                );
                if ($validator->fails()) {

                    return Redirect::route('accommodation-details')
                        ->withErrors($validator)
                        ->withInput();
                } else {

                    $authenticatedUserCompId = Auth::user()->comp_id;


                    $branchcode = $branch_id;
                    $customerID = $customer_booked;
                    $roomcode = $roomBooked_id;
                    $peoplecount = Input::get('number_of_people');
                    $days = Input::get('number_of_days');
                    $checkin = Input::get('checkin');
                    $checkout = Input::get('checkout');
                    $paymehod = Input::get('payment');
                    $payedamount = $price_for_room;
                    $bookedrooms = 1;
                    $mytime = Carbon\Carbon::now();


                    $insertToAccommodationTable = DB::table('accommodation')->insert(
                        ['branch_code' => $branchcode,
                            'customer_id' => $customerID,
                            'room_code' => $roomcode,
                            'no_people' => $peoplecount,
                            'no_days' => $days,
                            'no_booked_rooms' => $bookedrooms,
                            'checkin_time' => $checkin,
                            'checkout_time' => $checkout,
                            'paid_amount' => $payedamount,
                            'paidby' => $paymehod,
                            'comp_id' => $authenticatedUserCompId,
                            'created_at' => $mytime->toDateTimeString(),
                            'updated_at' => $mytime->toDateTimeString()
                        ]
                    );

                    $updateHotelRoomsTable = DB::table('hotel_rooms')
                        ->where('room_code', '=', $roomcode)
                        ->update(array('status' => 'booked'));


                    DB::table('sales')->insert(

                      [
                        'company_id' => Auth::user()->comp_id,
                          'room_code' => $roomcode,
                          'branch_code' => $branchcode,
                          'sale_value' => $payedamount

                      ]
                    );

                }

            }

            if ($insertToAccommodationTable && $updateHotelRoomsTable) {

                Session::forget('roomData', 'customerID');
                return Redirect::route('book-room-own-hotel');

            } else {

                return Redirect::route('accommodation-details');
            }

        } else {


            $branchBooked = Session::get('roomData');
            $room_id = $branchBooked['roomIDBook'];
            $branch_code = $branchBooked['branchBook'];
            $room_price = $branchBooked['priceBook'];
            $cutomerBooked = Session::get('customerID');

            $validator = Validator::make(Input::all(),

                array(
                    'number_of_people' => 'required|integer',
                    'number_of_days' => 'required|integer',
                    'checkin' => 'required',
                    'checkout' => 'required',
                    'payment' => 'required',


                )

            );
            if ($validator->fails()) {

                return Redirect::route('accommodation-details')
                    ->withErrors($validator)
                    ->withInput();
            } else {

                $authenticatedUserCompId = Auth::user()->comp_id;


                $branchcode = $branch_code;
                $customerID = $cutomerBooked;
                $roomcode = $room_id;
                $peoplecount = Input::get('number_of_people');
                $days = Input::get('number_of_days');
                $checkin = Input::get('checkin');
                $checkout = Input::get('checkout');
                $paymehod = Input::get('payment');
                $payedamount = $room_price;
                $bookedrooms = 1;
                $mytime = Carbon\Carbon::now();

                $insertToAccommodationTable = DB::table('accommodation')->insert(
                    ['branch_code' => $branchcode,
                        'customer_id' => $customerID,
                        'room_code' => $roomcode,
                        'no_people' => $peoplecount,
                        'no_days' => $days,
                        'no_booked_rooms' => $bookedrooms,
                        'checkin_time' => $checkin,
                        'checkout_time' => $checkout,
                        'paid_amount' => $payedamount,
                        'paidby' => $paymehod,
                        'comp_id' => $authenticatedUserCompId,
                        'created_at' => $mytime->toDateTimeString(),
                        'updated_at' => $mytime->toDateTimeString()
                    ]
                );


                $updateHotelRoomsTable = DB::table('hotel_rooms')
                    ->where('room_code', '=', $roomcode)
                    ->update(array('status' => 'booked'));


                DB::table('sales')->insert(

                    [
                        'company_id' => Auth::user()->comp_id,
                        'room_code' => $roomcode,
                        'branch_code' => $branchcode,
                        'sale_value' => $payedamount

                    ]
                );

                if ($insertToAccommodationTable && $updateHotelRoomsTable) {

                    Session::forget('roomData', 'customerID');
                    return Redirect::route('book-room-own-hotel');

                } else {

                    return Redirect::route('accommodation-details');
                }
            }

        }
    }
}