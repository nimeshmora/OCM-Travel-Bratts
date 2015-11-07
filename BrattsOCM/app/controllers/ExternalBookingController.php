<?php
/**
 * Created by PhpStorm.
 * User: Nimesha Jinarajadasa
 * Date: 9/22/2015
 * Time: 1:54 PM
 */

class ExternalBookingController extends BaseController {

        public function getAvailableBookings(){

            $company_id_logged_user = Auth::user()->comp_id;
            $data_room_details =



                DB::table('hotel_rooms')
                ->join('branch', 'hotel_rooms.branch_code', '=', 'branch.branch_code')
                ->join('company','branch.company_id','=','company.company_id')
                ->select('hotel_rooms.room_code','hotel_rooms.branch_code','hotel_rooms.price_per_night','hotel_rooms.description','hotel_rooms.status','hotel_rooms.image','branch.branch_name','branch.address','branch.email','branch.city','company.company_name')
                ->where('branch.company_id', '!=',$company_id_logged_user )
                ->where('hotel_rooms.status', '=', 'available')

                ->get();

            return View::make('external-bookings.available-hotels',array(
                    'data' => $data_room_details

                )


            );
        }
}