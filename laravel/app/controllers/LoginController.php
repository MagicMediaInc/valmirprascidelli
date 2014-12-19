<?php

class LoginController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		//
		if(Auth::check()){
			return Redirect::to("/dashboard/noticias");
		}
		else{
			return Redirect::to('/gd-admin/login');
		}
		//return View::make('backend.auth.login');

	}
	
	public function getLogin(){

		return View::make('backend.auth.login');

	}

	public function postLogin(){

		$credentials = array(
			'login' => Input::get('login'),
			'password' => Input::get('password')
			);

		if(Auth::attempt($credentials)):
			return Redirect::to('/dashboard/noticias');
			//return Redirect::to('/ingreso');

		else:
			return View::make('backend.auth.login')->with('err', 'Usuario o Contraseña Inválidos');
		endif;

	}

	
	


}
