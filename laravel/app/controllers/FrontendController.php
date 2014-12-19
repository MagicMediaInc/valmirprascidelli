<?php

class FrontendController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $_datos;

	public function getIndex()
	{
		//
		$noticias = Pages::where('description','=','Noticias')->take(1)->get();
		$noticias=Information::where('idPAge','=',$noticias[0]->id)->orderBy("orden","ASC")->orderBy("dateInformation","DESC")->take(5)->get();
		$albums = Album::where("status","=","1")->where("visible","!=","0")->orderBy("orden", "ASC")->get();
		$galleries = Gallery::all();
		$apoio = Pages::where('description','=','Apoio')->take(1)->get();
		$apoio=Information::where("idPage","=",$apoio[0]->id)->orderBy("orden","ASC")->orderBy("dateInformation","DESC")->take(2)->get();
		$artigos = Pages::where('description','=','Artigos')->take(1)->get();
		$artigos=Information::where("idPage","=",$artigos[0]->id)->orderBy("orden","ASC")->orderBy("dateInformation","DESC")->take(2)->get();
		$propostas = Pages::where('description','=','Propostas')->take(1)->get();
		if (count($propostas)>0):
			$propostas=Information::where("idPage","=",$propostas[0]->id)->orderBy("orden","ASC")->orderBy("dateInformation","DESC")->take(2)->get();
		endif;
		$videos = Pages::where('description','=','Videos')->take(1)->get();
		$noticias2 = Pages::where('description','=','Noticias')->take(1)->get();
		$noticiastotal=Information::where('idPAge','=',$noticias2[0]->id)->where("status","=",1)->get();
		$videovalmir = DB::table('informations')->where('idPage','=',$videos[0]->id)->where('categoria','=',0)->orderBy('orden','ASC')->take(1)->get();
		$videocampanha = DB::table('informations')->where('idPage','=',$videos[0]->id)->where('categoria','=',1)->orderBy('orden','ASC')->take(1)->get();
		$videopolitico = DB::table('informations')->where('idPage','=',$videos[0]->id)->where('categoria','=',2)->orderBy('orden','ASC')->take(1)->get();
		//dd($videovalmir);
		#$videos=Information::where("idPage","=",$videos[0]->id)->take(1)->get();
		return View::make('frontend.home')->with(array("noticias" => $noticias, 'apoios' => $apoio, 'artigos' => $artigos, 'videovalmir' => $videovalmir,'videocampanha' => $videocampanha,'videopolitico' => $videopolitico,"galleries"=>$galleries,"propostas"=>$propostas,"albums"=>$albums, "noticiastotal"=>$noticiastotal));
	}

	public function getGuttentag(){
		$noticias = Pages::where('description','=','Noticias')->take(1)->get();
		$noticias=Information::where('idPAge','=',$noticias[0]->id)->orderBy("orden","ASC")->orderBy("dateInformation","DESC")->take(5)->get();
		$albums = Album::where("status","=","1")->where("visible","!=","0")->orderBy("orden", "ASC")->get();
		$galleries = Gallery::all();
		$apoio = Pages::where('description','=','Apoio')->take(1)->get();
		$apoio=Information::where("idPage","=",$apoio[0]->id)->orderBy("orden","ASC")->orderBy("dateInformation","DESC")->take(2)->get();
		$artigos = Pages::where('description','=','Artigos')->take(1)->get();
		$artigos=Information::where("idPage","=",$artigos[0]->id)->orderBy("orden","ASC")->orderBy("dateInformation","DESC")->take(2)->get();
		$propostas = Pages::where('description','=','Propostas')->take(1)->get();
		if (count($propostas)>0):
			$propostas=Information::where("idPage","=",$propostas[0]->id)->orderBy("orden","ASC")->orderBy("dateInformation","DESC")->take(2)->get();
		endif;
		$videos = Pages::where('description','=','Videos')->take(1)->get();
		$noticias2 = Pages::where('description','=','Noticias')->take(1)->get();
		$noticiastotal=Information::where('idPAge','=',$noticias2[0]->id)->where("status","=",1)->get();
		$videovalmir = DB::table('informations')->where('idPage','=',$videos[0]->id)->where('status','=',1)->where('categoria','=',0)->get();
		$videocampanha = DB::table('informations')->where('idPage','=',$videos[0]->id)->where('status','=',1)->where('categoria','=',1)->get();
		$videopolitico = DB::table('informations')->where('idPage','=',$videos[0]->id)->where('status','=',1)->where('categoria','=',2)->get();
		#$videos=Information::where("idPage","=",$videos[0]->id)->take(1)->get();
		return View::make('frontend.test')->with(array("noticias" => $noticias, 'apoios' => $apoio, 'artigos' => $artigos, 'videovalmir' => $videovalmir,'videocampanha' => $videocampanha,'videopolitico' => $videopolitico,"galleries"=>$galleries,"propostas"=>$propostas,"albums"=>$albums, "noticiastotal"=>$noticiastotal));
	}

	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getNoticias()
	{
		//
		$noticias = Pages::where('description','=','Noticias')->take(1)->get();
		$noticias=Information::where("idPage","=",$noticias[0]->id)->orderBy("orden","ASC")->orderBy("dateInformation","DESC")->paginate(5);
		$apoio = Pages::where('description','=','Apoio')->take(1)->get();
		$apoio=Information::where("idPage","=",$apoio[0]->id)->take(2)->get();
		return View::make("frontend.noticias")->with(array("noticias"=>$noticias,'apoio' => $apoio));
		
	}
	public function getApoios()
	{
		//
		$noticias = Pages::where('description','=','Apoio')->take(1)->get();
		$noticias=Information::where("idPage","=",$noticias[0]->id)->orderBy("orden","ASC")->orderBy("dateInformation","DESC")->paginate(5);
		$apoio = Pages::where('description','=','Noticias')->take(1)->get();
		$apoio=Information::where("idPage","=",$apoio[0]->id)->take(2)->get();
		return View::make("frontend.apoios")->with(array("noticias"=>$noticias,'apoio' => $apoio));
		
	}
	public function getArtigos()
	{
		//
		$noticias = Pages::where('description','=','Artigos')->take(1)->get();
		$noticias=Information::where("idPage","=",$noticias[0]->id)->orderBy("orden","ASC")->orderBy("dateInformation","DESC")->paginate(5);
		$apoio = Pages::where('description','=','Apoio')->take(1)->get();
		$apoio=Information::where("idPage","=",$apoio[0]->id)->take(2)->get();
		return View::make("frontend.artigos")->with(array("noticias"=>$noticias,'apoio' => $apoio));
		
	}
	public function getNoticia($id = ''){
		if(isset($id)):
			$noticia = Information::find($id);
			$news = Pages::where('description','=','Noticias')->take(1)->get();
			$news = Information::where("idPage","=",$news[0]->id)->take(1)->get();
			
			$album=Album::where("id","=", $noticia->idAlbum)->take(1)->get();
			$imagen= Gallery::where("idAlbum","=", $album[0]->id)->orderBy("orden","ASC")->get();
			return View::make('frontend.noticia')->with(array('noticia'=>$noticia,"news"=>$news,"imagen"=>$imagen));
		else:
			return Redirect::to('/');
		endif;

	}
	public function getApoio($id = ''){
		if(isset($id)):
			$noticia = Information::find($id);
			$apoio = Pages::where('description','=','Apoio')->take(1)->get();
			$apoio = Information::where("idPage","=",$apoio[0]->id)->take(2)->get();
			$news = Pages::where('description','=','Noticias')->take(1)->get();
			$news = Information::where("idPage","=",$news[0]->id)->take(2)->get();
			return View::make('frontend.apoio')->with(array('noticia'=>$noticia,"apoios"=>$apoio,"news"=>$news));
		else:
			return Redirect::to('/');
		endif;

	}
	public function getArtigo($id = ''){
		if(isset($id)):
			$noticia = Information::find($id);
			$apoio = Pages::where('description','=','Apoio')->take(1)->get();
			$apoio = Information::where("idPage","=",$apoio[0]->id)->take(2)->get();
			$news = Pages::where('description','=','Noticias')->take(1)->get();
			$news = Information::where("idPage","=",$news[0]->id)->take(2)->get();
			return View::make('frontend.artigo')->with(array('noticia'=>$noticia,"apoios"=>$apoio,"news"=>$news));
		else:
			return Redirect::to('/');
		endif;

	}
	public function getView($id){
		if(isset($id)):
			$noticia = Information::find($id);
			$apoio = Pages::where('description','=','Apoio')->take(1)->get();
			$apoio = Information::where("idPage","=",$apoio[0]->id)->take(2)->get();
			$news = Pages::where('description','=','Noticias')->take(1)->get();
			$news = Information::where("idPage","=",$news[0]->id)->take(2)->get();
			return View::make('frontend.view')->with(array('noticia'=>$noticia,"apoios"=>$apoio,"news"=>$news));
		else:
			return Redirect::to('/');
		endif;

	}

	public function getBio(){
		$page=Pages::where("description","=","Biografia")->take(1)->get();
		$bio=Information::where("idPage","=",$page[0]->id)->take(1)->get();
		$album=Album::where("id","=", $bio[0]->idAlbum)->take(1)->get();
		$imagen= Gallery::where("idAlbum","=", $album[0]->id)->orderBy("orden","ASC")->get();		
		return View::make("frontend.biografia")->with(array("bio"=>$bio,"imagen"=>$imagen));

	}
	

	public function getPropostas(){
	 	$noticias = Pages::where('description','=','Propostas')->take(1)->get();
	 	if(count($noticias)>0):
			$noticias=Information::where("idPage","=",$noticias[0]->id)->orderBy("orden","ASC")->orderBy("dateInformation","DESC")->paginate(3);
		endif;
		$apoio = Pages::where('description','=','Apoio')->take(1)->get();
		$apoio=Information::where("idPage","=",$apoio[0]->id)->take(2)->get();
		return View::make("frontend.propostas")->with(array("noticias"=>$noticias,'apoio' => $apoio));
	 }
	 public function getProposta($id = ''){
		if(isset($id)):
			$noticia = Information::find($id);
			$apoio = Pages::where('description','=','Apoio')->take(1)->get();
			$apoio = Information::where("idPage","=",$apoio[0]->id)->take(2)->get();
			$news = Pages::where('description','=','Noticias')->take(1)->get();
			$news = Information::where("idPage","=",$news[0]->id)->take(2)->get();
			return View::make('frontend.proposta')->with(array('noticia'=>$noticia,"apoios"=>$apoio,"news"=>$news));
		else:
			return Redirect::to('/');
		endif;

	}
	public function getCampanhas(){
	 	$noticias = Pages::where('description','=','Campanha')->take(1)->get();
	 	if(count($noticias)>0):
			$noticias=Information::where("idPage","=",$noticias[0]->id)->orderBy("orden","ASC")->orderBy("dateInformation","DESC")->paginate(5);
		endif;
		$apoio = Pages::where('description','=','Apoio')->take(1)->get();
		$apoio=Information::where("idPage","=",$apoio[0]->id)->take(2)->get();
		return View::make("frontend.campanhas")->with(array("noticias"=>$noticias,'apoio' => $apoio));
	 }
	  public function getCampanha($id = ''){
		if(isset($id)):
			$noticia = Information::find($id);
			$apoio = Pages::where('description','=','Apoio')->take(1)->get();
			$apoio = Information::where("idPage","=",$apoio[0]->id)->take(2)->get();
			$news = Pages::where('description','=','Noticias')->take(1)->get();
			$news = Information::where("idPage","=",$news[0]->id)->take(2)->get();
			
			$album=Album::where("id","=", $noticia->idAlbum)->take(1)->get();
			$imagen= Gallery::where("idAlbum","=", $album[0]->id)->orderBy("orden","ASC")->get();

			return View::make('frontend.campanha')->with(array('noticia'=>$noticia,"apoios"=>$apoio,"news"=>$news,"imagen"=>$imagen));
		else:
			return Redirect::to('/');
		endif;

	}

	public function getDownloads(){
		$noticias = Upload::where("status","=","1")->orderBy("orden","ASC")->orderBy("created_at","ASC")->paginate(5);
		return View::make("frontend.downloads")->with("noticias",$noticias);
	}

	public function getVideos(){
		$videos = Pages::where("description","=","Videos")->take(1)->get();
		if(count($videos)>0):
			$videos = Information::where("idPage","=",$videos[0]->id)->orderBy("orden","ASC")->orderBy("created_at","DESC")->paginate(5);
		endif;
		return View::make("frontend.videos")->with(array("videos"=>$videos));
	}

	public function getVideosvalmir(){
		$videos = Pages::where("description","=","Videos")->take(1)->get();
		if(count($videos)>0):
			$videos = Information::where("idPage","=",$videos[0]->id)->orderBy("orden","ASC")->where("categoria", "=", "0")->orderBy("dateInformation","DESC")->paginate(5);
		endif;
		return View::make("frontend.videos")->with(array("videos"=>$videos));
	}

	public function getVideospadilha(){
		$videos = Pages::where("description","=","Videos")->take(1)->get();
		if(count($videos)>0):
			$videos = Information::where("idPage","=",$videos[0]->id)->orderBy("orden","ASC")->where("categoria", "=", "1")->orderBy("dateInformation","DESC")->paginate(5);
		endif;
		return View::make("frontend.videos")->with(array("videos"=>$videos));
	}

	public function getVideosdilma(){
		$videos = Pages::where("description","=","Videos")->take(1)->get();
		if(count($videos)>0):
			$videos = Information::where("idPage","=",$videos[0]->id)->orderBy("orden","ASC")->where("categoria", "=", "2")->orderBy("dateInformation","DESC")->paginate(5);
		endif;
		return View::make("frontend.videos")->with(array("videos"=>$videos));
	}

	public function getParticipe(){
		return View::make("frontend.participe");
	}
	
	public function getContato(){
		return View::make("frontend.contato");

	}

	public function getDocument($url){
		return Response::download($url,"",array("Content-Type: application/force-download"));
	}

	public function send($data=array()){
		// var_dump($data);
		$datos="";
		$this->datos=$data;
		Mail::send("frontend.email",$this->datos,function($message){
				$message->to("contato1335@valmirprascidelli.com.br","Valmir Prascidelli")->subject("Contato do Site Valmir Prasidelli");
				// $message->to("igor@gallardodesigner.com.br","Igor Gallardo")->subject("Contato do Site Valmir Prasidelli");
				// $message->to("robertdacorte@gmail.com","Robert Da Corte")->subject("Contato do Site Valmir Prasidelli");
			});
	}

	public function sendcandidato($data,$email){
		return var_dump($data);
		$this->_datos=array();
		$_email="";
		$this->_datos=array_push($this->_datos,$data);
		$this->_email=$email;
		var_dump($this->_datos);
		Mail::send("frontend.view",$this->_datos,function($message){
				$message->to($this->_email,"Valmir Prascidelli")->subject("Candidato");
				// $message->to("igor@gallardodesigner.com.br","Igor Gallardo")->subject("Contato do Site Valmir Prasidelli");
				// $message->to("robertdacorte@gmail.com","Robert Da Corte")->subject("Contato do Site Valmir Prasidelli");
			});
	}

	public function sendCandidatoData(){
		//var_dump($this->_datos);
		$img = str_replace('..', 'http://valmirprascidelli.com.br', $this->_datos['img']);
		Mail::send("frontend.view", array( 'img' => $img ),function($message){
				$message->to($this->_datos['email'],"Valmir Prascidelli")->subject("Candidato");
				// $message->to("igor@gallardodesigner.com.br","Igor Gallardo")->subject("Contato do Site Valmir Prasidelli");
				// $message->to("robertdacorte@gmail.com","Robert Da Corte")->subject("Contato do Site Valmir Prasidelli");
			});
	}


	
	public function postContato(){
		if(Request::ajax()){
			$data =array();
			$data = Input::all();
			return var_dump($data);
			$this->sendcandidato($data);

		}else{
			Mail::send("frontend.email",array("nome"=>"Juan Lopez"),function($message){
				$message->to("contato1335@valmirprascidelli.com","Valmir Prascidelli")->subject("Contato do Site Valmir Prasidelli");
			});
		};
		
	}
	public function postCandidato(){
		if(Request::ajax()){
			$this->_datos = Input::all();
			//$data = Input::get("img");
			//var_dump($data);
			//$email = Input::get("email");
			 // return $data["nome"];
			//$this->sendcandidato($data,$email);
			$this->sendCandidatoData();
		}else{
			Mail::send("frontend.view",array("nome"=>"Juan Lopez"),function($message){
				$message->to("robertdacorte@gmail.com","Valmir Prascidelli")->subject("Contato do Site Valmir Prasidelli");
			});
		};
		
	}
	public function saveParticipe($data=array()){
		$datos="";
		$this->datos=$data;
		// var_dump($this->datos);
		$propuesta= new Participe;
		$propuesta->nome=$this->datos["nome"];
		$propuesta->email=$this->datos["mail"];
		$propuesta->telefone=$this->datos["telefone"];
		$propuesta->categoria=$this->datos["tema"];
		$propuesta->description=$this->datos["mensagem"];
		$propuesta->save();
	}
	public function postParticipe(){
		if(Request::ajax()){
			$data =array();
			$data = Input::all();
			 // return $data["nome"];
			$this->saveParticipe($data);
		};
		
	}

	// public function getCandidato(){

	// 	return View::make('frontend.candidato')->with(array("path"=>public_path("coladigital/candidatos/")));
	// }

	public function getCandidato(){
		return View::make('frontend.coladigital');
	}
}
