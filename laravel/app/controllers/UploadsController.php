<?php

class UploadsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function getIndex()
	{
		//
		if(Auth::check()):
			$informations = Upload::orderBy('orden', 'ASC')->orderBy('created_at', 'ASC')->get();
			return View::make("backend.uploads.index")->with("informations",$informations);
		else:
			return Redirect::to('/gd-admin');
		endif;
	}

	public function getCreate(){
		if(Auth::check()):
			return View::make("backend.uploads.create");
		else:
			return Redirect::to('/gd-admin');
		endif;
	}

	public function postCreate(){
		if(Auth::check()):
			$archivo = Input::file('archivo');
			$image = Input::file('destaque');
			#return var_dump($dateInfo);
			$validator = Validator::make(
				array(
					'title' => Input::get('title'),
					'description' => Input::get('description'),
					'archivo' => $archivo
					), 
				array(
					'title' => 'required',
					'description' => 'required',
					'archivo' => 'required'
					),
				array(
					'required' => 'El campo :attribute es Requerido',
					)
				);

			if($validator->fails()):
				$pages = Pages::all();
				return View::make("backend.uploads.create")->with(array('err' => $validator->errors()));
			else:
				$information = new Upload();
				$information->title = Input::get('title');
				$information->description = Input::get('description');
				$information->status = (Input::get('status')=='') ? 0 : 1;

				$imgValidator = Validator::make(
					array(
						'archivo' => $archivo,
						'destaque'=> $image
						),
					array(
						'archivo' => 'required',
						'destaque'=>'required'
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


					$ext=explode(".",$archivo->getClientOriginalName());
					$ext = strtolower($ext[count($ext) - 1]);
					
					$ext2=explode(".",$image->getClientOriginalName());
					$ext2 = strtolower($ext2[count($ext2) - 1]);


					$filename = str_replace('/', '!', Hash::make($archivo->getClientOriginalName().date('Y-m-d H:i:s'))).".".$ext;
					$fileImage = str_replace('/', '!', Hash::make($image->getClientOriginalName().date('Y-m-d H:i:s'))).".".$ext2;

					$information->url = 'uploads/files/'.$filename;
					$information->mainImage = '/uploads/'.$fileImage;


					$nombres=["small_".$fileImage,"medium_".$fileImage,$fileImage];
							for ($i=0; $i <count($width) ; $i++) { 
								$path = public_path("uploads/".$nombres[$i]);
								Image::make($image->getRealPath())->resize($width[$i],null,function ($constraint) {$constraint->aspectRatio();})->save($path);
							}
					
					// $image->move('uploads/'.$fileImage);
					$archivo->move('uploads/files/',$filename);
				endif;
				$information->orden=0;
				$information->save();
				return Redirect::to("dashboard/uploads");
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
				$informations = Upload::all();
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
						return View::make('backend.uploads.update')->with(array('information' => $informations[$counter], 'pages' => $pages));
					else:
						Redirect::to('/dashboard/uploads');
					endif;
				else:
						Redirect::to('/dashboard/uploads');
				endif;
			else:
				return Redirect::to('/dashboard/uploads');
			endif;
		else:
			return Redirect::to('/gd-admin');
		endif;
	}


	public function postUpdate($idHash=''){
		if(Auth::check()):
			if($idHash!= ''):
				// $idHash = Input::get('idHash');
				$informations = Upload::all();

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

						$image = Input::file('destaque');
						$archivo = Input::file('archivo');

						$validator = Validator::make(
							array(
								'title' => Input::get('title'),
								'description' => Input::get('description'),
								'archivo' => $archivo,
								'image' => $image
								), 
							array(
								'title' => 'required',
								'description' => 'required',
								),
							array(
								'required' => 'El campo :attribute es Requerido',
								)
							);

						$information = $informations[$counter];
						$information->title = Input::get("title");
						$information->description = Input::get('description');

						if(Input::get('dateInfo') != ''):
							$information->dateInformation = date('Y-m-d H:i:s', strtotime(str_replace('.', '-', Input::get('dateInfo'))));
						endif;
						$information->status = (Input::get('status')=='') ? 0 : 1;

						$archivoValidator = Validator::make(
								array('archivo' => $archivo),
								array('archivo' => 'required')
							);

						$imgValidator = Validator::make(
							array(
								'image' => $image
								),
							array(
								'image' => 'required'
								)
							);

						if(!$archivoValidator->fails()):

							$ext=explode(".",$archivo->getClientOriginalName());
							$ext = strtolower($ext[count($ext) - 1]);
							
							$filename = str_replace('/', '!', Hash::make($archivo->getClientOriginalName().date('Y-m-d H:i:s'))).".".$ext;
						
							$information->url = 'uploads/files/'.$filename;

							$archivo->move('uploads/files/',$filename);
						endif;

						if(!$imgValidator->fails()):
							// return "Prueba Validator";

							$info_image = getimagesize($image);
									$ratio = $info_image[0] / $info_image[1];
									$newheight=array();
									$width=array("200","410",$info_image[0]);
									// $height=array("140","280",$info_image[1]);
									foreach ($width as $ancho) {
										$newheight = round($ancho / $ratio);
									}


							
							$ext2=explode(".",$image->getClientOriginalName());
							$ext2 = strtolower($ext2[count($ext2) - 1]);


							$fileImage = str_replace('/', '!', Hash::make($image->getClientOriginalName().date('Y-m-d H:i:s'))).".".$ext2;

							$information->mainImage = '/uploads/'.$fileImage;


							$nombres=["small_".$fileImage,"medium_".$fileImage,$fileImage];
									for ($i=0; $i <count($width) ; $i++) { 
										$path = public_path("uploads/".$nombres[$i]);
										Image::make($image->getRealPath())->resize($width[$i],null,function ($constraint) {$constraint->aspectRatio();})->save($path);
									}
							
							// $image->move('uploads/'.$fileImage);
						endif;
						
						$information->save();

						return Redirect::to('/dashboard/uploads');
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
				$pages = Upload::all();

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
						return Redirect::to('/dashboard/uploads');
					else:
						return Redirect::to('/dashboard/uploads');
					endif;
				else:
					return Redirect::to('/dashboard/uploads');
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
				$galeria=Upload::find($id);
				$galeria->orden=$i + 1;
				var_dump($galeria->orden);
				$galeria->save();
			}

		}
	}


}
