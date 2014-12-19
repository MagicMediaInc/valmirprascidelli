@extends ('frontend.layout')

@section ("title")

Videos

@stop
@section ("content")
<?php 

							function recortar_texto($texto, $limite=150,$link=""){   
							    $texto = trim($texto);
							    $texto = strip_tags($texto);
							    $tamano = strlen($texto);
							    $resultado = '';
							    if($tamano <= $limite){
							        return $texto;
							    }else{
							        $texto = substr($texto, 0, $limite);
							        $palabras = explode(' ', $texto);
							        $resultado = implode(' ', $palabras);
							        $resultado .= '...';
							        $resultado .= $link;
							    }   
							    return $resultado;
							}
							?>
	<div class="row" >
		<article class="news-rotator col-xs-14 col-xs-offset-1 col-sm-14 col-sm-offset-1 col-md-14 col-md-offset-1">
			<a href="/videos" style="text.decoration:none;color:#fff;"><div class="icon ico-video">Videos</div></a>
					<div class="pull-right"><a href="#" class="back" onclick="back(event);">Voltar</a></div>
					<div class="row" style="margin:20px auto; display:block;"></div>
					<div class="row" style="margin:15px auto;"></div>
					<!-- <div class="row" style="border-bottom:1px solid #efefef;margin-bottom:10px;padding-bottom:10px;">
						<div class="col-xs-4 col-xs-offset-3 col-sm-4 col-sm-offset-3 col-md-4 col-md-offset-3">
							<h4 style="font-size:1.2em; display:inline-block;"><strong>Campanhas de: </strong></h4>
						</div>
						<div class="col-xs-9 col-sm-9 col-md-9">
							
								<a href="/videosvalmir"><img src="img/logo-valmir.png" class="img-responsive" style="display:inline-block;margin-right:20px;"></a>
								<a href="/videosdilma"><img src="img/logo-dilma.png" class="img-responsive" style="display:inline-block; margin-right:20px;"></a>
								<a href="/videospadilha"><img src="img/logo-padilha.png" class="img-responsive" style="display:inline-block;"></a>
						</div> -->
					<!-- </div> -->
					<div class="row" style="margin:15px auto;"></div>

				@foreach($videos as $video)
					@if($video->visible == 1)
					<div class="row" style="margin-bottom:25px;">
						<div class="col-sm-6">
							<div class="apoio-side">
								<iframe width="100%" height="auto" src="{{ str_replace('watch?v=','embed/',str_replace(':','',str_replace('s:','',str_replace('http','',$video->description))))}}?theme=light&showinfo=0&controls=0" frameborder="0"  allowfullscreen></iframe>
								<p style="font-size:0.8em; text-align:center;margin-bottom:0px">Clique duas vezes no vídeo para assistir</p><p style="font-size:0.8em; text-align:center;margin-top:0px;">  em tela inteira</p>
							</div>
							<div>
							</div>
						</div>
						 <div class="col-sm-9 col-sm-offset-1">
							
							<div class="col-sm-16"><h4 style="font-size:1.2em;margin-top:0px;"><strong>{{$video->title}}</strong></h4></div>
							<div class="col-sm-16"><p class="MsoNormal"><strong>{{$video->content}}</strong></p></h4></div>
						</div>
					</div>
					@endif
				@endforeach
				
				<div class="row">
					<div style="text-align:center;margin-top:20px;">
						{{$videos->links()}}
					</div>
				</div>
		</article>
	</div>

@stop

@section ("plugins")

@stop