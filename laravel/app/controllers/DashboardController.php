<?php

class DashboardController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		//
		if(Auth::check()){
			return View::make("backend.pages.index");
		}
		else{
			return Redirect::to('/gd-admin/login');
		}
	}

	public function getDashboard(){
		if(Auth::check()):
			return View::make('backend.pages.index');
		else:
			return Redirect::to('/gd-admin');
		endif;
	}


	public function getLogout(){
		if(Auth::check()):
			Auth::logout();
			return Redirect::to('/gd-admin');
		else:
			return Redirect::to('/gd-admin');
		endif;
	}
	

}
