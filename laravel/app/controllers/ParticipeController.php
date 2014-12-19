<?php

class ParticipeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		//
		if(Auth::check()):
			$participes = Participe::all()->sortBy("tema")->sortBy("created_at");
			#return var_dump($videos);

			return View::make("backend.participe.index")->with("participes",$participes);
		else:
			return Redirect::to('/gd-admin');
		endif;
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */



	public function getVer($idHash=''){
		if(Auth::check()):
			if($idHash!=''):
				$participe = Participe::all();

				if(!empty($participe[0])):
					$counter = 0;
					$bool = false;
					do{
						if( Hash::check( (string) $participe[$counter]->id, str_replace('!','/',$idHash ))):
							$bool = true;
						else:
							$counter++;
						endif;
					}while(!$bool && $counter <= count($participe)-1);
					if($bool):
						return View::make('backend.participe.ver')->with('participe', $participe[$counter]);
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



	public function getDelete($idHash = ''){
		if(Auth::check()):
			if($idHash!=''):
				$participe = Participe::all();

				if(!empty($participe[0])):
					$counter = 0;
					$bool = false;
					do{
						if( Hash::check( (string) $participe[$counter]->id, str_replace('!','/',$idHash ))):
							#return View::make('users.permissions')->with('user', $users[$counter]);
							$bool = true;
						else:
							$counter++;
						endif;
					}while(!$bool && $counter <= count($participe)-1);
					if($bool):
						$participe[$counter]->delete();
						return Redirect::to('/dashboard/participe');
					else:
						return Redirect::to('/dashboard/participe');
					endif;
				else:
					return Redirect::to('/dashboard/participe');
				endif;
			else:
				return Redirect::to('/dashboard');
			endif;
		else:
			return Redirect::to('/gd-admin');
		endif;

	}

	


}
