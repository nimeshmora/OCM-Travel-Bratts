<?php


class AccountController extends BaseController {

    public function getSignIn(){

        return View::make('user-login');
    }

    public function postSignIn(){

        if(Auth::check()){
            $role = Auth::user()->role;
        switch($role) {
            case 'hotel-admin':
                return Redirect::route('dashboard-logged-admin');
                break;
            case 'hotel-staff':
                return Redirect::route('dashboard-logged-staff');
                break;
        }
        }else {

            $validator = Validator::make(Input::all(), array(

                'username' => 'required',
                'password' => 'required'
            ));

            if ($validator->fails()) {

                return Redirect::route('login-page')
                    ->withErrors($validator)
                    ->withInput();
            } else {

                $remember = (Input::has('remember-me')) ? true : false;


                $auth = Auth::attempt(array(

                    'username' => Input::get('username'),
                    'password' => Input::get('password'),
                    'active' => 1
                ), $remember);

                if ($auth) {

                    $role = Auth::user()->role;
                    switch ($role) {
                        case 'hotel-admin':
                            return Redirect::route('dashboard-logged-admin');
                            break;
                        case 'hotel-staff':
                            return Redirect::route('dashboard-logged-staff');
                            break;

                        default:
                            $this::logOut();
                    }


                } else {
                    return Redirect::route('login-page')
                        ->with('global', 'Wrong Username or Password!');
                }

            }
        }
        //return Redirect::route('dashboard-logged');

    }


    public function getSignOut(){

        Auth::logout();
        Cart::destroy();
        return Redirect::route('login-page');
    }


    public function getRegister(){
        return View::make('account.user-register')
            ->with('global', 'You Are Already Registered User with this Email!');
    }

    public function postRegister(){
        $validator = Validator::make(Input::all(),

            array(
                'fullname'=>  'required|max:250|min:5',
                'hotelname'=> 'required|max:250',
                'email'=> 'required|max:250|email|unique:person',
                'username'=> 'required|max:250|min:5|unique:person',
                'password'=> 'required|min:5',
                'confirm-password'=> 'required|same:password'

            )

        );

        if($validator->fails()){

            return Redirect::route('register-account')
                ->withErrors($validator)
                ->withInput();
        }else{

            $updatedCompanyId = DB::table('company')->max('company_id');

            $fullname = Input::get('fullname');
            $hotelname = Input::get('hotelname');
            $email = Input::get('email');
            $username = Input::get('username');
            $password = Input::get('password');
            $mytime = Carbon\Carbon::now();


            $code = str_random(60);




            $updatedId = DB::table('person')->insertGetId(
                            [   'username' => $username,
                                'full_name' => $fullname,
                                'email' => $email,
                                'password' => Hash::make($password),
                                'code' => $code,
                                'active' => 0,
                                'company_name' => $hotelname,
                                'role' => 'hotel-admin',
                                'comp_id' =>$updatedCompanyId  ,
                               // 'id' => $retrieve_id+1,
                                'created_at' => $mytime->toDateTimeString(),
                                'updated_at' => $mytime->toDateTimeString()

                            ]
            );



            if($updatedId){
                $data = array('email'=>$email, 'username'=>$username, 'link'=>URL::route('account-activate',$code));
                Mail::send('emails.auth.activate', $data,function($message) use ($data){

                    $message->to($data['email'])->subject('Activate Your Account');
                });

                return Redirect::route('link-sent');
            } else{

                return Redirect::route('register-account');
            }
        }

    }

    public function getActivate($code){

        $user = DB::table('person')->where('code', $code)->where('active', 0)->update(array('active'=>1,'code'=> ''));
        return Redirect::route('registration-payment');

    }

    public function getForgotPassword(){

        return View::make('account.user-forgot-password');
    }

    public function postForgotPassword(){

        $validator = Validator::make(Input::all(),

            array(

                'old-password' => 'required',
                'new-password' => 'required|min:6',
                'confirm-password' => 'required|same:new-password'
            )
            );

        if($validator->fails()){

            return Redirect::route('forgot-password')
                   ->withErrors($validator);
        }else{

            $user = Auth::user();


            $old_pass = Input::get('old-password');
            $new_pass = Input::get('new-password');

            if(Hash::check($old_pass, $user->getAuthPassword())){
                DB::table('person')->where('username','=',$user->username)->update(['password'=> Hash::make($new_pass)]);
                Auth::logout();
                return Redirect::route('login-page')->with(array(
                        'target'=>'.navbar-form',
                        'message'=>'Password reset Successful ! Please Login With New Password',
                        'style'=>'success',
                        'position'=>'left'
                    )
                );

            }else{
                return Redirect::route('login-page')->with(array(
                        'target'=>'.navbar-form',
                        'message'=>'Enter Correct Old Password!',
                        'style'=>'success',
                        'position'=>'left'
                    )
                );
            }


        }

    }


    public function getCompanyDetails(){

        return View::make('account.company-details');

    }

    public function postCompanyDetails()
    {

        $validator = Validator::make(Input::all(),

            array(
                'companyname' => 'required|max:250|min:5',
                'about' => 'required|max:600',
                'admin' => 'required|max:250',
                'companycountry' => 'required|max:250',
                'companyaddress' => 'required|max:250|min:5',
                'city' => 'required|min:5',
                'tax' => 'required',

            )

        );

        if ($validator->fails()) {

            return Redirect::route('comapny-register')
                ->withErrors($validator)
                ->withInput();
        } else {

            $companyname = Input::get('companyname');
            $about = Input::get('about');
            $admin = Input::get('admin');
            $country = Input::get('companycountry');
            $address = Input::get('companyaddress');
            $city = Input::get('city');
            $tax = Input::get('tax');
            $mytime = Carbon\Carbon::now();





            $updatedId = DB::table('company')->insertGetId(
                ['company_name' => $companyname,
                    'about' => $about,
                    'address' =>  $address,
                    'city' => $city,
                    'country' =>$country,
                    'tax' => $tax,
                    'admin_name' => $admin,


                    'created_at' => $mytime->toDateTimeString(),
                    'updated_at' => $mytime->toDateTimeString()

                ]


            );


            if($updatedId){
                return Redirect::route('register-account');
            } else{

                return Redirect::route('comapny-register');
            }


        }
    }
}











