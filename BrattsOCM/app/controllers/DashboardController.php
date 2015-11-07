<?php


class DashboardController extends BaseController{

    public function getStaffBranch(){

            $staff_id = Auth::user()->id;
            DB::setFetchMode(PDO::FETCH_ASSOC);
            $owned_branch_code = DB::table('staff')
                ->select('staff.branch')
                ->where('person_id','=',$staff_id)
                ->first();

            return $owned_branch_code;

        }

    public function getLoggedinDashboard()
    {

        $role = Auth::user()->role;

        if ($role == 'hotel-staff') {

            $branch_code = $this->getStaffBranch();
            $data_room_booked_details = DB::table('hotel_rooms')
                ->join('branch', 'hotel_rooms.branch_code', '=', 'branch.branch_code')
                ->where('branch.branch_code', '=', $branch_code)
                ->where('hotel_rooms.status', '=', 'booked')
                ->count();

            $data_room_details = DB::table('hotel_rooms')
                ->join('branch', 'hotel_rooms.branch_code', '=', 'branch.branch_code')
                ->where('branch.branch_code', '=', $branch_code)
                ->where('hotel_rooms.status', '=', 'available')
                ->count();

            $data_total_sales = DB::table('sales')
                ->where('branch_code', '=',$branch_code )
                ->sum('sale_value');

            $total_client = DB::table('customer')
                ->join('accommodation','customer.customer_id','=','accommodation.customer_id')
                ->select('customer.customer_id','accommodation.branch_code')
                ->where('accommodation.branch_code', '=',$branch_code )
                ->count();

            $data_room = DB::table('hotel_rooms')
                ->join('branch', 'hotel_rooms.branch_code', '=', 'branch.branch_code')
                ->select('hotel_rooms.room_code', 'hotel_rooms.branch_code', 'hotel_rooms.price_per_night', 'hotel_rooms.description', 'hotel_rooms.status', 'hotel_rooms.image', 'branch.branch_name', 'branch.address', 'branch.email', 'branch.city')
                ->where('branch.branch_code', '=', $branch_code)
                ->where('hotel_rooms.status', '=', 'available')
                ->take(5)
                ->get();

            $data_room_booked = DB::table('accommodation')
                ->join('customer', 'accommodation.customer_id', '=', 'customer.customer_id')
                ->select('customer.fullname', 'accommodation.branch_code', 'accommodation.room_code', 'accommodation.checkin_time', 'accommodation.checkout_time')
                ->where('accommodation.branch_code', '=',$branch_code )
                ->orderBy('checkout_time')
                ->take(5)
                ->get();

            $cancelled = DB::table('refund')
                ->where('date','=',date('y-m-d'))
                ->where('branch_id','=',$branch_code)
                ->count('refund_id');
        } else {
            DB::setFetchMode(PDO::FETCH_ASSOC);
            $company_id_logged_user = Auth::user()->comp_id;
            $data_room_details = DB::table('hotel_rooms')
                ->join('branch', 'hotel_rooms.branch_code', '=', 'branch.branch_code')
                ->where('branch.company_id', '=', $company_id_logged_user)
                ->where('hotel_rooms.status', '=', 'available')
                ->count();


            $data_room_booked_details = DB::table('hotel_rooms')
                ->join('branch', 'hotel_rooms.branch_code', '=', 'branch.branch_code')
                ->where('branch.company_id', '=', $company_id_logged_user)
                ->where('hotel_rooms.status', '=', 'booked')
                ->count();

            $data_total_sales = DB::table('sales')
                ->where('company_id', '=', Auth::user()->comp_id)
                ->sum('sale_value');

            $total_client = DB::table('customer')
                ->select('customer_id')
                ->where('company_id', '=', Auth::user()->comp_id)
                ->count();

            $company_id_logged_user = Auth::user()->comp_id;
            $data_room = DB::table('hotel_rooms')
                ->join('branch', 'hotel_rooms.branch_code', '=', 'branch.branch_code')
                ->select('hotel_rooms.room_code', 'hotel_rooms.branch_code', 'hotel_rooms.price_per_night', 'hotel_rooms.description', 'hotel_rooms.status', 'hotel_rooms.image', 'branch.branch_name', 'branch.address', 'branch.email', 'branch.city')
                ->where('branch.company_id', '=', $company_id_logged_user)
                ->where('hotel_rooms.status', '=', 'available')
                ->take(5)
                ->get();

            $data_room_booked = DB::table('accommodation')
                ->join('customer', 'accommodation.customer_id', '=', 'customer.customer_id')
                ->select('customer.fullname', 'accommodation.branch_code', 'accommodation.room_code', 'accommodation.checkin_time', 'accommodation.checkout_time')
                ->where('accommodation.comp_id', '=', Auth::user()->comp_id)
                ->orderBy('checkout_time')
                ->take(5)
                ->get();

            $cancelled = DB::table('refund')
                ->join('branch', 'refund.branch_id','=','branch.branch_code')
                ->where('branch.company_id','=',Auth::user()->comp_id)
                ->count('refund_id');
        }

            return View::make('dashboard', array(
                'data' => $data_room_details,
                'booked' => $data_room_booked_details,
                'sales' => $data_total_sales,
                'clients' => $total_client,
                'room_details' => $data_room,
                'room_booked' => $data_room_booked,
                'cancelled' => $cancelled
            ));


    }
        public function getAvailableRoomCount(){


        }


}

