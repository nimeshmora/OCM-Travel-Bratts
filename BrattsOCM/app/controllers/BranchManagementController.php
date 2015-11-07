<?php
/**
 * Created by PhpStorm.
 * User: Nimesha Jinarajadasa
 * Date: 9/10/2015
 * Time: 2:44 AM
 */

class BranchManagementController extends BaseController{

    public function getBranchAdd(){

    return View::make('branch-management.add-branch');
    }

    public function postBranchAdd(){

        $validator = Validator::make(Input::all(),

            array(
                'branch_name'=>  'required|max:250|min:5',
                'branch_code'=> 'required|max:250',
                'email'=> 'required|max:250|email',
                'address'=> 'required|max:250',
                'city'=> 'required',
                'country'=> 'required',
                'stats'=> 'required',
                'date'=> 'required',
                'description'=> 'required'

            )

        );

        if($validator->fails()){

            return Redirect::route('add-branch')
                ->withErrors($validator)
                ->withInput();
        }else {

            $authenticatedUserCompId = Auth::user()->comp_id;

            $branchname = Input::get('branch_name');
            $branchcode = Input::get('branch_code');
            $email = Input::get('email');
            $address = Input::get('address');
            $city = Input::get('city');
            $country = Input::get('country');
            $status = Input::get('stats');
            $date = Input::get('date');
            $description = Input::get('description');
            $mytime = Carbon\Carbon::now();

            $insertToBranchTable = DB::table('branch')->insert(
                ['branch_name' => $branchname,
                    'branch_code' => $branchcode,
                    'email' => $email,
                    'address' => $address,
                    'city' => $city,
                    'country' => $country,
                    'status' =>$status,
                    'description' => $description,
                    'company_id' => $authenticatedUserCompId,
                    'start_date' => $date,
                    'created_at' => $mytime->toDateTimeString(),
                    'updated_at' => $mytime->toDateTimeString()

                ]
            );

            if($insertToBranchTable){

               $role = Auth::user()->role;
                switch($role){
                   case 'hotel-admin':
                        return Redirect::route('dashboard-logged-admin');
                        break;
                    case 'hotel-staff':
                        return Redirect::route('dashboard-logged-staff');
                       break;
                }

            } else{

                return Redirect::route('add-branch');
            }
        }

    }
// ----------------------------------------------------------------------------------------------------------------------------
    public function getStaffAdd(){

        $company_id_logged_user = Auth::user()->comp_id;
        $data_branches = DB::table('branch')
            ->select('branch_code')
            ->where('company_id', '=',$company_id_logged_user )
            ->where('status', '=', 'enabled')
            ->get();

        return View::make('branch-management.add-staff', array(
            'data' => $data_branches
        ));

    }

    public function postStaffAdd(){

        $validator = Validator::make(Input::all(),

            array(
                'staff_name'=>  'required|max:250',
                'staff_code'=> 'required|max:250|unique:staff',
                'email'=> 'required|max:250|email|unique:staff',
                'branch'=> 'required',
                'tp'=> 'required|digits:10',
                'username'=> 'required|max:250|min:5|unique:person',
                'password'=> 'required|min:5',
                'confirm-password'=> 'required|same:password'
            )

        );

        if($validator->fails()){

            return Redirect::route('add-staff')
                ->withErrors($validator)
                ->withInput();
        }else {



            $staffname = Input::get('staff_name');
            $staffcode = Input::get('staff_code');
            $email = Input::get('email');
            $assignbranch = Input::get('branch');
            $tp = Input::get('tp');
            $username = Input::get('username');
            $password = Input::get('password');
            $mytime = Carbon\Carbon::now();

            $insertToPersonTable = DB::table('person')->insert(
                [   'username' => $username,
                    'password' => Hash::make($password),
                    'full_name' => $staffname,
                    'email' => $email,


                    'active' => 1,

                    'role' => 'hotel-staff',
                    'comp_id' =>Auth::user()->comp_id ,
                    // 'id' => $retrieve_id+1,
                    'created_at' => $mytime->toDateTimeString(),
                    'updated_at' => $mytime->toDateTimeString()

                ]
            );

            $insertToStaffTable = DB::table('staff')->insert(
                ['full_name' => $staffname,
                    'staff_code' => $staffcode,
                    'email' => $email,
                    'branch' => $assignbranch,
                    'telephone_no' => $tp,
                    'person_id' => DB::table('person')->max('id'),
                    'created_at' => $mytime->toDateTimeString(),
                    'updated_at' => $mytime->toDateTimeString()
                ]
            );


            $role = Auth::user()->role;

            if($insertToStaffTable && $insertToPersonTable){


                switch($role){
                    case 'hotel-admin':
                        return Redirect::route('dashboard-logged-admin');
                        break;
                    case 'hotel-staff':
                        return Redirect::route('dashboard-logged-staff');
                        break;
                }

            } else{

                return Redirect::route('add-staff');
            }
        }
    }

    //-------------------------------------------------------------------------------------------------------------------------

    public function getRoomAdd(){

        $company_id_logged_user = Auth::user()->comp_id;
        $data_branches = DB::table('branch')
            ->select('branch_code')
            ->where('company_id', '=',$company_id_logged_user )
            ->where('status', '=', 'enabled')
            ->get();

        return View::make('branch-management.add-rooms', array(
            'data' => $data_branches
        ));

    }

    public function postRoomAdd(){

        $validator = Validator::make(Input::all(),

            array(
                'room_code'=>  'required|max:250|unique:hotel_rooms',
                'branch'=> 'required|max:250',
                'price'=> 'required|max:250',
                //'status'=> 'required',
                'description'=> 'required'
            )

        );

        if($validator->fails()){

            return Redirect::route('add-room')
                ->withErrors($validator)
                ->withInput();
        }else {
            $roomcode = Input::get('room_code');
            $branchcode = Input::get('branch');
            $price = Input::get('price');
            //$status = Input::get('status');
            $description = Input::get('description');
            $mytime = Carbon\Carbon::now();
            $file = Input::file('photo');

            $destinationPath = 'uploads';

            $filename = str_random(12).'.png';

            $upload_success = Input::file('photo')->move($destinationPath, $filename);




            $insertToHotelRoomsTable = DB::table('hotel_rooms')->insert(
                ['room_code' => $roomcode,
                    'branch_code' => $branchcode,
                    'price_per_night' => $price,
                    'description' => $description,
                    'status' => 'available',
                    'image' => '/uploads/'.$filename,
                    'created_at' => $mytime->toDateTimeString(),
                    'updated_at' => $mytime->toDateTimeString()
                ]
            );


            if($insertToHotelRoomsTable){

                $role = Auth::user()->role;
                switch($role){
                    case 'hotel-admin':
                        return Redirect::route('dashboard-logged-admin');
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

    public function getPackageAdd(){

        return View::make('branch-management.add-package');
    }




}