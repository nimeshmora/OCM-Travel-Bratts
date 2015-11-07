<?php
use Illuminate\Support\Facades\Auth;

/**
 * Created by PhpStorm.
 * User: Nimesha Jinarajadasa
 * Date: 9/6/2015
 * Time: 1:58 PM
 */

class MyChannelController extends BaseController {

    public function getCompanyProfile(){

        $userId= Auth::user()->id;

        $data_comp_details = DB::table('person')
            ->join('company', 'comp_id', '=', 'company.company_id')
            ->select('company.company_name', 'company.about', 'company.address', 'company.city','company.country','company.admin_name')
            ->where('id', '=',$userId )
            ->first();

        $data_admin_details = DB::table('person')
        ->select('full_name')
        ->where('role', '=', 'hotel-admin' )
        ->where('comp_id', '=', Auth::user()->comp_id)
        ->first();

        $userCompanyId = Auth::user()->comp_id;
        $data_owner_details = DB::table('hotel_owner')
        ->select('fullname','address','city','country','telephone','email','details')
        ->where('company_id','=',$userCompanyId )
        ->first();

        $userImage = DB::table('hotel_rooms')
            ->join('branch', 'hotel_rooms.branch_code', '=', 'branch.branch_code' )
            ->select('hotel_rooms.image')
            ->where('room_code','=','r1' )
            ->first();


        $company_branches= DB::table('branch')
            ->select('branch_code')
            ->where('branch.company_id','=',$userCompanyId)
            ->count();

        $company_rooms = DB::table('hotel_rooms')
            ->join('branch','hotel_rooms.branch_code','=','branch.branch_code')
            ->select('hotel_rooms.branch_code')
            ->where('branch.company_id','=',$userCompanyId)
            ->count('hotel_rooms.branch_code');

        $profit = DB::table('sales')
            ->where('company_id','=',$userCompanyId)
            ->sum('sale_value');

        $clients = DB::table('customer')
            ->where('.company_id','=',$userCompanyId)
            ->count('customer_id');

        return View::make('my-channel.company-profile', array(
            'data' => $data_comp_details,
            'data_admin' => $data_admin_details,
            'data_owner' => $data_owner_details,
            'data_image' => $userImage,
            'data_branches' => $company_branches,
            'company_room_count' => $company_rooms,
            'company_profit' =>$profit,
            'client' =>$clients
        ));


    }

    public function postOwnerDetail(){

        $validator = Validator::make(Input::all(),

            array(
                'full_name'=>  'required|max:250',
                'address'=> 'required|max:250',
                'city'=> 'required|max:250',
                'country'=> 'required|max:250',
                'email'=> 'required|email|max:250',
                'tele'=> 'required|max:250',
                'description'=> 'required|max:600'
            )

        );

        if($validator->fails()){

            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }else {
            $fullname = Input::get('full_name');
            $address = Input::get('address');
            $city = Input::get('city');
            $country = Input::get('country');
            $email = Input::get('email');
            $tele = Input::get('tele');
            $mobile = Input::get('mobile');
            $description = Input::get('description');
            $mytime = Carbon\Carbon::now();

            $insertToHotelOwnerTable = DB::table('hotel_owner')->insert(
                ['fullname' => $fullname,
                    'address' => $address,
                    'city' => $city,
                    'country' =>  $country,
                    'telephone' => $tele,
                    'mobile' => $mobile,
                    'email' => $email,
                    'details' => $description,
                    'company_id' => Auth::user()->comp_id,
                    'created_at' => $mytime->toDateTimeString(),
                    'updated_at' => $mytime->toDateTimeString()
                ]
            );

            if($insertToHotelOwnerTable){

                $role = Auth::user()->role;
                switch($role){
                    case 'hotel-admin':
                        return Redirect::route('company-profile');
                        break;
                    case 'hotel-staff':
                        return Redirect::route('dashboard-logged-staff');
                        break;
                }

            } else{

                return Redirect::route('add-room');
            }

        }
    }

    public function getCompanyBranches(){

        $company_id_logged_user = Auth::user()->comp_id;
        $data_branch_details = DB::table('branch')
            ->select('branch_code','branch_name','address','city','country','email','status','start_date','description')
            ->where('company_id', '=',$company_id_logged_user )
            ->get();

        return View::make('my-channel.company-branches', array(
            'data' => $data_branch_details
        ));
    }

    public function getCompanyUsers(){

        $company_id_logged_user = Auth::user()->comp_id;
        $data_user_details = DB::table('person')
            ->select('full_name','email','company_name','role')
            ->where('comp_id', '=',$company_id_logged_user )
            ->get();

        return View::make('my-channel.company-users', array(
            'data' => $data_user_details
        ));

    }

    public function getCompanyImage(){


        App::error(function (\Symfony\Component\HttpFoundation\File\Exception\FileException $exception) {
            Log::error($exception);

            return 'Sorry! Your Image File is too large!';
        });

        $img = Input::all();

        $valid = Validator::make($img, array('file' => 'max:2048|mimes:jpeg,bmp,png,gif'));
        if ($valid->fails()) {
            return $valid->messages();
        } else {

            return Input::file('file')->move('uploads/', Auth::user()->profile_pic);
            //return "success";
        }

    }
}