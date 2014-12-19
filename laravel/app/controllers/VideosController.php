<?php

class VideosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		//
		if(Auth::check()):
			$videos = Pages::where('description','=','Videos')->take(1)->get();
			$ordenados = Information::where('idPage','=',$videos[0]->id)->where('orden','>',0)->orderBy("orden","ASC")->orderBy("created_at","DESC")->paginate(10);
			$no_ordenados = Information::where('idPage','=',$videos[0]->id)->where('orden','=',null)->orderBy("created_at","DESC")->paginate(10);
			#return var_dump($videos);

			return View::make("backend.videos.index")->with(array('videos'=>$no_ordenados,'ordenados'=>$ordenados));
		else:
			return Redirect::to('/gd-admin');
		endif;
	}

	public function getGuttentag(){

		//
		if(Auth::check()):
			$videos = Pages::where('description','=','Videos')->take(1)->get();
			$ordenados = Information::where('idPage','=',$videos[0]->id)->where('orden','>',0)->orderBy("orden","ASC")->paginate(10);
			$no_ordenados = Information::where('idPage','=',$videos[0]->id)->where('orden','=',null)->orderBy("created_at","DESC")->paginate(10);
			#return var_dump($videos);

			return View::make("backend.videos.guttentag")->with(array('videos'=>$no_ordenados,'ordenados'=>$ordenados));
		else:
			return Redirect::to('/gd-admin');
		endif;
	}

	public function postOrdervideo(){
		// Order Video In Position
		$id_video = Input::get('id');
		$position = (intval(Input::get('index'))+1);
		$vid = Information::find($id_video);
		$vid->orden = $position;
		$vid->save();

		//Reordering the another elements
		$videos = Pages::where('description','=','Videos')->take(1)->get();
		$videos = Information::where('idPage','=',$videos[0]->id)->where('orden','>=', $position)->orderBy("orden","ASC")->paginate(10);
		foreach($videos as $video):
			if($video->id != $id_video):
				$video->orden = (intval($video->orden) + 1);
				$video->save();
			endif;
		endforeach;
		return "Video ".Input::get('id')." Ordered in position ".Input::get('index');
	}

	public function postDisordervideo(){
		$id_video = Input::get('id');
		$position = (intval(Input::get('index'))+1);
		$start = (intval(Input::get('start'))+1);
		$vid = Information::find($id_video);
		$vid->orden = null;
		$vid->save();

		//Reordering the another elements
		$videos = Pages::where('description','=','Videos')->take(1)->get();
		$videos = Information::where('idPage','=',$videos[0]->id)->where('orden','>', $start)->orderBy("orden","ASC")->paginate(10);
		foreach($videos as $video):
			if($video->id != $id_video):
				$video->orden = (intval($video->orden) - 1);
				$video->save();
			endif;
		endforeach;
		return "Video ".Input::get('id')." Disordered";
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
			return View::make("backend.videos.create");
		else:
			return Redirect::to('/gd-admin');
		endif;
		
	}

	public function postCreate(){
		if(Auth::check()):
			$videos = Pages::where('description','=','Videos')->take(1)->get();
			$video = new Information();
			$video->title = Input::get('title');
			$video->description = Input::get('description');
			$video->content = Input::get('content');
			$video->idPage = $videos[0]->id;
			$video->categoria = Input::get('categoria');
			$video->status = 0;
			$video->visible = Input::get('visible') == '' ? 0 : 1;
			$video->save();
			return Redirect::to("dashboard/videos");
		else:
			return Redirect::to('/gd-admin');
		endif;
	}

	public function getUpdate($idHash=''){
		if(Auth::check()):
			if($idHash!=''):
				$videos = Information::all();

				if(!empty($videos[0])):
					$counter = 0;
					$bool = false;
					do{
						if( Hash::check( (string) $videos[$counter]->id, str_replace('!','/',$idHash ))):
							$bool = true;
						else:
							$counter++;
						endif;
					}while(!$bool && $counter <= count($videos)-1);
					if($bool):
						return View::make('backend.videos.update')->with('video', $videos[$counter]);
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

			$videos = Information::all();

			if(!empty($videos[0])):
				$counter = 0;
				$bool = false;
				do{
					if( Hash::check( (string) $videos[$counter]->id, str_replace('!','/',$idHash ))):
						$bool = true;
					else:
						$counter++;
					endif;
				}while(!$bool && $counter <= count($videos)-1);
				if($bool):
					$page = $videos[$counter];
					$page->description = Input::get('descripcion');
					$page->content = Input::get('content');
					$page->categoria = Input::get('categoria');
					$page->visible = (Input::get('visible') == '') ? 0 : 1;
					$page->save();

					return Redirect::to('/dashboard/videos');
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
				$videos = Information::all();

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
						return Redirect::to('/dashboard/videos');
					else:
						return Redirect::to('/dashboard/videos');
					endif;
				else:
					return Redirect::to('/dashboard/videos');
				endif;
			else:
				return Redirect::to('/dashboard');
			endif;
		else:
			return Redirect::to('/gd-admin');
		endif;

	}

	public function getMain($idHash=''){
		if(Auth::check()):
			if($idHash!=''):
				$videos = Information::all();
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
						foreach($videos as $video):
							$page = Pages::where('description','=','Videos')->take(1)->get();
							if($video->idPage == $page[0]->id && $video->categoria==$videos[$counter]->categoria):
								$video->status = 0;
								$video->save();
							endif;
						endforeach;
						$videos[$counter]->status = 1;
						$videos[$counter]->save();
						return Redirect::to('/dashboard/videos');
					else:
						return Redirect::to('/dashboard/videos');
					endif;
				else:
					return Redirect::to('/dashboard/videos');
				endif;
			else:

			endif;
		else:
			return Redirect::to('/dashboard');
		endif;
	}


}
