<?php

class InformationController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getLogout()
	{
		Auth::logout();
		return Redirect::to('/gd-admin');
	}
	public function getIndex(){
		$this->getNoticias();
	}

	public function getNoticias()
	{
		//
		if(Auth::check()):
			$page = Pages::where('description','=','Noticias')->take(1)->get();
			$informations = Information::where('idPage','=',$page[0]->id)->orderBy("orden","ASC")->orderBy("dateInformation","DESC")->get();
			return View::make("backend.informations.index")->with("informations",$informations)->with(array("i"=>1,"pages"=>$page));
		else:
			return Redirect::to('/gd-admin');
		endif;
	}
	public function getCampanhas()
	{
		//
		if(Auth::check()):
			$page = Pages::where('description','=','Campanha')->take(1)->get();
			$informations = Information::where('idPage','=',$page[0]->id)->orderBy("orden","ASC")->orderBy("dateInformation","DESC")->get();
			return View::make("backend.informations.index")->with("informations",$informations)->with(array("i"=>1,"pages"=>$page));
		else:
			return Redirect::to('/gd-admin');
		endif;
	}

	public function getBiografia()
	{
		//
		if(Auth::check()):
			$page = Pages::where('description','=','Biografia')->take(1)->get();
			$informations = Information::where('idPage','=',$page[0]->id)->orderBy("orden","ASC")->orderBy("dateInformation","DESC")->get();
			return View::make("backend.informations.index")->with("informations",$informations)->with(array("i"=>1,"pages"=>$page));
		else:
			return Redirect::to('/gd-admin');
		endif;
	}
	public function getPropostas()
	{
		//
		if(Auth::check()):
			$page = Pages::where('description','=','Propostas')->take(1)->get();
			$informations = Information::where('idPage','=',$page[0]->id)->orderBy("orden","ASC")->orderBy("dateInformation","DESC")->get();
			return View::make("backend.informations.index")->with("informations",$informations)->with(array("i"=>1,"pages"=>$page));
		else:
			return Redirect::to('/gd-admin');
		endif;
	}
	public function getArtigos()
	{
		//
		if(Auth::check()):
			$page = Pages::where('description','=','Artigos')->take(1)->get();
			$informations = Information::where('idPage','=',$page[0]->id)->orderBy("orden","ASC")->orderBy("dateInformation","DESC")->get();
			return View::make("backend.informations.index")->with("informations",$informations)->with(array("i"=>1,"pages"=>$page));
		else:
			return Redirect::to('/gd-admin');
		endif;
	}
	public function getApoios()
	{
		//
		if(Auth::check()):
			$page = Pages::where('description','=','Apoio')->take(1)->get();
			$informations = Information::where('idPage','=',$page[0]->id)->orderBy("orden","ASC")->orderBy("dateInformation","DESC")->get();
			return View::make("backend.informations.index")->with("informations",$informations)->with(array("i"=>1,"pages"=>$page));
		else:
			return Redirect::to('/gd-admin');
		endif;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate($id="")
	{
		//
		if(Auth::check()):
			$pages = Pages::all();
			$actual = Pages::find($id);
			return View::make("backend.informations.create")->with(array('pages'=>$pages,"actual"=>$actual));
		else:
			return Redirect::to('/gd-admin');
		endif;
		
	}


	public function postCreate(){
		if(Auth::check()):
			$content = Input::get('content');
			$image = Input::file('image');
			#return var_dump($dateInfo);
			$validator = Validator::make(
				array(
					'title' => Input::get('title'),
					'description' => Input::get('description'),
					'content' => $content,
					'image' => $image
					), 
				array(
					'title' => 'required',
					'description' => 'required',
					'image' => 'mimes:png,jpeg,gif'
					),
				array(
					'required' => 'El campo :attribute es Requerido',
					'mimes' => 'Tipo de imagen inválido, solo se admite el formato PNG'
					)
				);

			if($validator->fails()):
				$pages = Pages::all();
				return View::make("backend.informations.create")->with(array('err' => $validator->errors(), 'pages' => $pages));
			else:
				$album = new Album();
				$album->title = 'Album sin título';
				$album->description = 'Album sin descripción';
				$album->type = 'dependent';
				if(Input::get('dateInfo') != ''):
					$album->datePublication = date('Y-m-d H:i:s', strtotime(str_replace('.', '-', Input::get('dateInfo'))));
				else:
					$album->datePublication = date('Y-m-d H:i:s');
				endif;
				$album->status = 'off';
				$album->save();
				$information = new Information();
				$information->title = Input::get('title');
				$information->description = Input::get('description');
				$information->content = $content;
				$information->idAlbum = $album->id;
				$information->idPage = Input::get('idPage');
				if(Input::get('dateInfo') != ''):
					$information->dateInformation = date('Y-m-d H:i:s', strtotime(str_replace('.', '-', Input::get('dateInfo'))));
				else:
					$information->dateinformation = date('Y-m-d H:i:s');
				endif;
				$information->status = (Input::get('status')==null) ? 0 : 1;

				$imgValidator = Validator::make(
					array(
						'image' => $image
						),
					array(
						'image' => 'required'
						)
					);

				if(!$imgValidator->fails()):
					$info_image = getimagesize($image);
					$ratio = $info_image[0] / $info_image[1];
					$newheight=array();
					$width=array("200","410",$info_image[0]);
					// $height=array("140","280",$info_image[1]);
					foreach ($width as $ancho) {
						$newheight = round($ancho / $ratio);
					}
					$ext=explode(".",$image->getClientOriginalName());
					$ext = strtolower($ext[count($ext) - 1]);
					$filename = str_replace('/', '!', Hash::make($image->getClientOriginalName().date('Y-m-d H:i:s'))).".".$ext;
					$nombres=["small_".$filename,"medium_".$filename,$filename];
					for ($i=0; $i <count($width) ; $i++) { 
						$path = public_path("uploads/".$nombres[$i]);
						Image::make($image->getRealPath())->resize($width[$i],null,function ($constraint) {$constraint->aspectRatio();})->save($path);
					}
					$information->mainImage = '/uploads/'.$filename;
				endif;
				
				$information->save();
				return Redirect::to("dashboard/noticias");
			endif;
		else:
			return Redirect::to('/gd-admin');
		endif;

		#return var_dump($fileName);
		#return var_dump($image->getMimeType());
		#$temp = $image->move("uploads",$image->getClientOriginalName());
		#return var_dump($temp);
		#$information->save();
		#return Redirect::to("dashboard/noticias");
	}


	public function getUpdate($idHash=''){
		if(Auth::check()):
			if($idHash!=''):
				$informations = Information::all();
				$pages = Pages::all();

				if(!empty($informations[0])):
					$counter = 0;
					$bool = false;
					do{
						if( Hash::check( (string) $informations[$counter]->id, str_replace('!','/',$idHash ))):
							$bool = true;
						else:
							$counter++;
						endif;
					}while(!$bool && $counter <= count($informations)-1);
					if($bool):
						return View::make('backend.informations.update')->with(array('information' => $informations[$counter], 'pages' => $pages));
					else:
						return View::make('backend.dashboard');
					endif;
				else:
					return View::make('backend.dashboard');
				endif;
			else:
				return Redirect::to('/dashboard');
			endif;
		else:
			return Redirect::to('/gd-admin');
		endif;
	}


	public function postUpdate($idHash=''){
		if(Auth::check()):
			if($idHash!= ''):
				// $idHash = Input::get('idHash');
				$informations = Information::all();

				if(!empty($informations[0])):
					$counter = 0;
					$bool = false;
					do{
						if( Hash::check( (string) $informations[$counter]->id, str_replace('!','/',$idHash ))):
							$bool = true;
						else:
							$counter++;
						endif;
					}while(!$bool && $counter <= count($informations)-1);
					if($bool):

						$image = Input::file('image');

						$validator = Validator::make(
							array(
								'title' => Input::get('title'),
								'description' => Input::get('description'),
								'content' => Input::get('content'),
								'image' => $image
								), 
							array(
								'title' => 'required',
								'description' => 'required',
								'image' => 'mimes:png,jpeg,gif'
								),
							array(
								'required' => 'El campo :attribute es Requerido',
								'mimes' => 'Tipo de imagen inválido, solo se admite el formato PNG'
								)
							);

						$information = $informations[$counter];
						$information->title = Input::get("title");
						$information->description = Input::get('description');
						$information->content = Input::get('content');
						$information->idPage = Input::get('idPage');
						if(Input::get('dateInfo') != ''):
							$information->dateInformation = date('Y-m-d H:i:s', strtotime(str_replace('.', '-', Input::get('dateInfo'))));
						endif;
						$information->status = (Input::get('status')==null) ? 0 : 1;

						$imgValidator = Validator::make(
							array(
								'image' => $image
								),
							array(
								'image' => 'required'
								)
							);

						if(!$imgValidator->fails()):
							$info_image = getimagesize($image);
							$ratio = $info_image[0] / $info_image[1];
							$newheight=array();
							$width=array("200","410",$info_image[0]);
							// $height=array("140","280",$info_image[1]);
							foreach ($width as $ancho) {
								$newheight = round($ancho / $ratio);
							}
							$ext=explode(".",$image->getClientOriginalName());
							$ext = strtolower($ext[count($ext) - 1]);
							$filename = str_replace('/', '!', Hash::make($image->getClientOriginalName().date('Y-m-d H:i:s'))).".".$ext;
							$nombres=["small_".$filename,"medium_".$filename,$filename];
							for ($i=0; $i <count($width) ; $i++) { 
								$path = public_path("uploads/".$nombres[$i]);
								Image::make($image->getRealPath())->resize($width[$i],null,function ($constraint) {$constraint->aspectRatio();})->save($path);
							}
							$information->mainImage = '/uploads/'.$filename;
						endif;

						$information->save();

						return Redirect::to('/dashboard/noticias');
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
			if($idHash!= ''):
				$pages = Information::all();

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
						return Redirect::to('/dashboard/noticias');
					else:
						return Redirect::to('/dashboard/noticias');
					endif;
				else:
					return Redirect::to('/dashboard/noticias');
				endif;
			else:
				return Redirect::to('/dashboard');
			endif;
		else:
			return Redirect::to('/gd-admin');
		endif;
	}

	public function postOrder(){
		if(Request::ajax()){
			$datos=array();
			$datos=Input::all();
			for($i=0; $i < count($datos); $i++){
				var_dump($i+1);
				$id=$datos["id".$i];
				$galeria=Information::find($id);
				$galeria->orden=$i + 1;
				var_dump($galeria->orden);
				$galeria->save();
			}

		}
	}

}
