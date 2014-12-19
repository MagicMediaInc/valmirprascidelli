<?php

class NewsletterController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		if(Auth::check()):
			$informations = Newsletter::orderBy("created_at","DESC")->get();
			return View::make("backend.newsletters.index")->with("informations",$informations);
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
			$page = Pages::where('description','=','Noticias')->take(1)->get();
			$informations = Information::where('idPage','=',$page[0]->id)->orderBy("orden","ASC")->orderBy("dateInformation","DESC")->get();
			return View::make("backend.newsletters.create")->with("informations",$informations);
		else:
			return Redirect::to('/gd-admin');
		endif;
		
	}


	public function postCreate(){
		if(Auth::check()):
			$newsletter = new Newsletter();
			$newsletter->description = Input::get('description');
			$newsletter->noticias = Input::get('content');
			$newsletter->dateInformation = Input::get('dainfo');
			$newsletter->order = Newsletter::count() + 1;
			$newsletter->save();
			return Redirect::to("dashboard/newsletter");
		else:
			return Redirect::to('/gd-admin');
		endif;
	}

	public function getDelete($idHash = ''){
		if(Auth::check()):
			if($idHash!=''):
				$videos = Newsletter::all();

				if(!empty($videos[0])):
					$counter = 0;
					$bool = false;
					do{
						if( Hash::check( (string) $videos[$counter]->id, str_replace('!','/',$idHash ))):
							#return View::make('users.permissions')->with('user', $users[$counter]);
							$bool = true;
						else:
							$counter++;
						endif;
					}while(!$bool && $counter <= count($videos)-1);
					if($bool):
						$videos[$counter]->delete();
						return Redirect::to('/dashboard/newsletter');
					else:
						return Redirect::to('/dashboard/newsletter');
					endif;
				else:
					return Redirect::to('/dashboard/newsletter');
				endif;
			else:
				return Redirect::to('/dashboard');
			endif;
		else:
			return Redirect::to('/gd-admin');
		endif;

	}

	public function getVer($idHash=""){
		if(Auth::check()):
			if($idHash!=''):
				$videos = Newsletter::all();

				if(!empty($videos[0])):
					$counter = 0;
					$bool = false;
					do{
						if( Hash::check( (string) $videos[$counter]->id, str_replace('!','/',$idHash ))):
							#return View::make('users.permissions')->with('user', $users[$counter]);
							$bool = true;
						else:
							$counter++;
						endif;
					}while(!$bool && $counter <= count($videos)-1);
					if($bool):
						$noticias=[];
						$noti=explode(",",$videos[$counter]->noticias);
						foreach ($noti as $noticia):
						 	$info=Information::find($noti);
							array_push($noticias, $info);
						endforeach;



							$path = "newsletter/img/header.png";
							$fotos=[];

							// for ($i=0; $i <=count($info) ; $i++) { 
								// $img=substr($info[0]->mainImage,9);
								// $imgcompleta=substr_replace($info[0]->mainImage,"uploads/medium_".$img,0);
								// $source = public_path($imgcompleta);
								// var_dump($path);
								// Image::make($source)->mask(public_path("newsletter/img/header.png"))->save(public_path("newsletter/img/nw_".$img));
								// array_push($fotos, public_path("newsletter/img/nw_".$img));
							// }


						return View::make('backend.newsletters.template')->with(array("information"=>$videos[$counter],"noticias"=>$info,"fotos"=>$fotos, "pos"=>$noti));
					else:
						return Redirect::to('/dashboard/newsletter');
					endif;
				else:
					return Redirect::to('/dashboard/newsletter');
				endif;
			else:
				return Redirect::to('/dashboard');
			endif;
		else:
			return Redirect::to('/gd-admin');
		endif;
	}


}
