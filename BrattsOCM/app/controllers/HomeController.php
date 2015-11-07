<?php

class HomeController extends BaseController {



	public function showLogin()
    {
		return View::make('account.user-login');
	}

    public function getActivationLinkPage(){

        return View::make('account.registration-link-sent');
    }

    public function showPayment(){

        return View::make('account.user-payment');
    }
}
