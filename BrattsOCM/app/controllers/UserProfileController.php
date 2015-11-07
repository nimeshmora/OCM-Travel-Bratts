<?php
/**
 * Created by PhpStorm.
 * User: Nimesha Jinarajadasa
 * Date: 9/10/2015
 * Time: 11:49 AM
 */

class UserProfileController extends BaseController {

    public function getUserProfile(){

        return View::make('user-profile.user-profile');
    }

    /*public function postUserProfile(){

        return View::make('user-profile');
    }*/

}