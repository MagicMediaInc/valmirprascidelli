<?php

class PagesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		//
		if(Auth::check()):
			$pages = Pages::all();

			return View::make("backend.pages.index")->with("pages",$pages)->with("i",1);
		else:
			return Redirect::to('/gd-admin');
		endif;
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		//
		if(Auth::check()):
			return View::make("backend.pages.create");
		else:
			return Redirect::to('/gd-admin');
		endif;
		
	}


	public function postCreate(){
		if(Auth::check()):
			$page = new Pages;
			$page->Description = Input::get('descripcion');
			$page->status = (Input::get('status')=="") ? "off" : "on";
			$page->save();
			return Redirect::to("dashboard/pages");
		else:
			return Redirect::to('/gd-admin');
		endif;
	}


	public function getUpdate($idHash=''){
		if(Auth::check()):
			if($idHash!=''):
				$pages = Pages::all();

				if(!empty($pages[0])):
					$counter = 0;
					$bool = false;
					do{
						if( Hash::check( (string) $pages[$counter]->id, str_replace('!','/',$idHash ))):
							$bool = true;
						else:
							$counter++;
						endif;
					}while(!$bool && $counter <= count($pages)-1);
					if($bool):
						return View::make('backend.pages.update')->with('page', $pages[$counter]);
					else:
						return Redirect::to('/dashboard');
					endif;
				else:
					return Redirect::to('/dashboard');
				endif;
			else:
				return Redirect::to('/dashboard');
			endif;
		else:
			return Redirect::to('/gd-admin');
		endif;
	}


	public function postUpdate(){
		if(Auth::check()):
			$idHash = Input::get('idHash');

			$pages = Pages::all();

			if(!empty($pages[0])):
				$counter = 0;
				$bool = false;
				do{
					if( Hash::check( (string) $pages[$counter]->id, str_replace('!','/',$idHash ))):
						$bool = true;
					else:
						$counter++;
					endif;
				}while(!$bool && $counter <= count($pages)-1);
				if($bool):
					$page = $pages[$counter];
					$page->description = Input::get('descripcion');
					$page->status = (Input::get('status')=="") ? "off" : "on";
					$page->save();

					return Redirect::to('/dashboard/pages');
				else:
					return Redirect::to('/dashboard');
				endif;
			else:
				return Redirect::to('/dashboard');
			endif;

		else:
			return Redirect::to('/gd-admin');
		endif;

	}


	public function getDelete($idHash = ''){
		if(Auth::check()):
			if($idHash!=''):
				$pages = Pages::all();

				if(!empty($pages[0])):
					$counter = 0;
					$bool = false;
					do{
						if( Hash::check( (string) $pages[$counter]->id, str_replace('!','/',$idHash ))):
							#return View::make('users.permissions')->with('user', $users[$counter]);
							$bool = true;
						else:
							$counter++;
						endif;
					}while(!$bool && $counter <= count($pages)-1);
					if($bool):
						$pages[$counter]->delete();
						return Redirect::to('/dashboard/pages');
					else:
						return Redirect::to('/dashboard/pages');
					endif;
				else:
					return Redirect::to('/dashboard/pages');
				endif;
			else:
				return Redirect::to('/dashboard');
			endif;
		else:
			return Redirect::to('/gd-admin');
		endif;

	}


}
