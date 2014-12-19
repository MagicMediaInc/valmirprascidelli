<?php

class AlbumsController extends \BaseController {

	public function getIndex(){
		if(Auth::check()):
			$albums = Album::all()->sortBy("orden");
			$inf = Information::all();
			$alb = [];
			$pag = [];
			foreach($albums as $album):
				// for ($i=0; $i < count($inf) ; $i++) { 
				// 	if($inf[$i]->idAlbum == $album->id):
				// 		var_dump($inf[$i]->idAlbum);
				// 		array_push($alb,$inf);
				// 	endif;
				// }

				if(Information::where('idAlbum','=',$album->id)->count()):
					$information = Information::where('idAlbum','=',$album->id)->take(1)->get();
					$album->title=$information[0]->description;
					$page = Pages::where('id','=',$information[0]->idPage)->take(1)->get();
					$album->type = $page[0]->description;
					if (Gallery::where('idAlbum','=',$album->id)->count()== 0):
						$album->status=0;
					else:
						$album->status=1;
					endif;
					$album->save();

				else:
					$album->type="Galeria";
					if (Gallery::where('idAlbum','=',$album->id)->count()== 0):
						$album->status=0;
					else:
						$album->status=1;
					endif;
					$album->save();
					// var_dump("Galeria");
					// $album->type="Galeria"
					// $album->save();
				endif;
				// $info = DB::table('informations')->where("idAlbum","=","31");
				// if($info):

				// 	var_dump($info[0]->id);
				// 	// $page= Pages::where("id","=",$noti->idPage);
				// 	// array_push($alb, $noti);
				// 	// array_push($pag, $page->description);
				// else:
				// 	$page= "Galeria";
				// 	array_push($alb, $album);
				// 	array_push($pag, $page);
				// endif;
			endforeach;
			
			return View::make('backend.albums.index')->with(array('albums' => $albums,"pages"=>$pag));
		else:
			return Redirect::to('/gd-admin');
		endif;
	}

	public function getCreate(){
		if(Auth::check()):

			$album = new Album();
			$album->title = 'Album sin título';
			$album->description = 'Album sin descripción';
			$album->type = 'Galeria';
			if(Input::get('dateInfo') != ''):
				$album->datePublication = date('Y-m-d H:i:s', strtotime(str_replace('.', '-', Input::get('dateInfo'))));
			else:
				$album->datePublication = date('Y-m-d H:i:s');
			endif;
			$album->status = 0;
			$album->save();

			$gallery = Gallery::where('idAlbum','=',$album->id)->get();
			// if($gallery == 0 || empty($gallery)):
			// 	$gallery=NULL;
			// endif;
			return View::make('backend.albums.update')->with(array('album' => $album, 'gallery' => $gallery));

		else:
			return Redirect::to('/dashboard');
		endif;
	}

	public function postCreate(){
		if(Auth::check()):
			$album = Album::find(Input::get('idAlbum'));
			$album->title = Input::get('title') != '' ? Input::get('title') : 'Album sin título';
			$album->description = Input::get('description') != '' ? Input::get('description') : 'Album sin descripción';
			$album->save();
			return Redirect::to('/dashboard/albums');
		else:
			return Redirect::to('/gd-admin');
		endif;
	}

	public function getAdd($idHash = ''){
		if(Auth::check()):
			if($idHash != ''):
				$albums = Album::all();
				if(!empty($albums[0])):
					$counter = 0;
					$bool = false;
					do{
						if( Hash::check( (string) $albums[$counter]->id, str_replace('!','/',$idHash ))):
							$bool = true;
						else:
							$counter++;
						endif;
					}while(!$bool && $counter <= count($albums)-1);
					if($bool):
						// $gallery = Gallery::where('idAlbum','=',$albums[$counter]->id)->orderBy("orden","ASC")->get();
						$gallery = $albums[$counter]->gallery;
						
						// dd($gallery);
						return View::make('backend.albums.update')->with(array('album' => $albums[$counter], 'gallery' => $gallery));
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

	public function postAdd($idHash = ''){
		if(Auth::check()):
			if($idHash != ''):
				$albums = Album::all();

				if(!empty($albums[0])):
					$counter = 0;
					$bool = false;
					do{
						if( Hash::check( (string) $albums[$counter]->id, str_replace('!','/',$idHash ))):
							$bool = true;
						else:
							$counter++;
						endif;
					}while(!$bool && $counter <= count($albums)-1);
					if($bool):
						$albums[$counter]->title = Input::get('title');
						$albums[$counter]->description = Input::get('description');
						$albums[$counter]->visible = Input::get('status') == 'on' ? 1 : 0;
						$albums[$counter]->save();
						return Redirect::to('/dashboard/artigos');
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

	public function getUpdate($idHash = ''){
		if(Auth::check()):
			if($idHash != ''):
				$albums = Album::all();
				if(!empty($albums[0])):
					$counter = 0;
					$bool = false;
					do{
						if( Hash::check( (string) $albums[$counter]->id, str_replace('!','/',$idHash ))):
							$bool = true;
						else:
							$counter++;
						endif;
					}while(!$bool && $counter <= count($albums)-1);
					if($bool):
						$gallery = Gallery::where('idAlbum','=',$albums[$counter]->id)->orderBy("orden","ASC")->get();
						return View::make('backend.albums.update')->with(array('album' => $albums[$counter], 'gallery' => $gallery));
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
			return redirect::to('/gd-admin');
		endif;
	}

	public function postUpdate($idHash = ''){
		if(Auth::check()):
			if($idHash != ''):
				$albums = Album::all();

				if(!empty($albums[0])):
					$counter = 0;
					$bool = false;
					do{
						if( Hash::check( (string) $albums[$counter]->id, str_replace('!','/',$idHash ))):
							$bool = true;
						else:
							$counter++;
						endif;
					}while(!$bool && $counter <= count($albums)-1);
					if($bool):
						$albums[$counter]->title = Input::get('title');
						$albums[$counter]->description = Input::get('description');
						$albums[$counter]->visible = (Input::get('status')==null) ? 0 : 1;
						$albums[$counter]->save();
						return Redirect::to('/dashboard/informations');
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

	public function getEdit($idHash = ''){
		if(Auth::check()):
			if($idHash != ''):
				$albums = Album::all();
				if(!empty($albums[0])):
					$counter = 0;
					$bool = false;
					do{
						if( Hash::check( (string) $albums[$counter]->id, str_replace('!','/',$idHash ))):
							$bool = true;
						else:
							$counter++;
						endif;
					}while(!$bool && $counter <= count($albums)-1);
					if($bool):
						$gallery = Gallery::where('idAlbum','=',$albums[$counter]->id)->orderBy("orden","ASC")->get();
						return View::make('backend.albums.update')->with(array('album' => $albums[$counter], 'gallery' => $gallery));
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
			return redirect::to('/gd-admin');
		endif;
	}

	public function postEdit($idHash = ''){
		if(Auth::check()):
			if($idHash != ''):
				$albums = Album::all();

				if(!empty($albums[0])):
					$counter = 0;
					$bool = false;
					do{
						if( Hash::check( (string) $albums[$counter]->id, str_replace('!','/',$idHash ))):
							$bool = true;
						else:
							$counter++;
						endif;
					}while(!$bool && $counter <= count($albums)-1);
					if($bool):
						$albums[$counter]->title = Input::get('title');
						$albums[$counter]->description = Input::get('description');
						$albums[$counter]->visible = (Input::get('status')==null) ? 0 : 1;
						$albums[$counter]->save();
						return Redirect::to('/dashboard/albums');
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
			if($idHash != ''):
				$albums = Album::all();
				if(!empty($albums[0])):
					$counter = 0;
					$bool = false;
					do{
						if( Hash::check( (string) $albums[$counter]->id, str_replace('!','/',$idHash ))):
							$bool = true;
						else:
							$counter++;
						endif;
					}while(!$bool && $counter <= count($albums)-1);
					if($bool):
						$albums[$counter]->delete();
						return Redirect::to('/dashboard/albums');;
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
			return redirect::to('/gd-admin');
		endif;
	}

	public function postOrder(){
		if(Request::ajax()){
			$datos=array();
			$datos=Input::all();
			for($i=0; $i < count($datos); $i++){
				var_dump($i+1);
				$id=$datos["id".$i];
				$galeria=Gallery::find($id);
				var_dump($galeria->orden);
				$galeria->orden=$i + 1;
				$galeria->save();
			}

		}
	}

	public function postOrden(){
		if(Request::ajax()){
			$datos=array();
			$datos=Input::all();
			for($i=0; $i < count($datos); $i++){
				var_dump($i+1);
				$id=$datos["id".$i];
				$galeria=Album::find($id);
				$galeria->orden=$i + 1;
				var_dump($galeria->orden);
				$galeria->save();
			}

		}
	}


}