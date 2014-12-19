@extends ('frontend.layout')

@section ("title")

Propostas

@stop
@section("page")
	
@stop
@section ("content")
<?php 

							function recortar_texto($texto, $limite=255,$link=""){   
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
	<style>
		
	</style>
	<div class="row">
		<article class="news-rotator col-xs-14 col-xs-offset-1 col-sm-14 col-sm-offset-1 col-md-14 col-md-offset-1">
			<div class="icon ico-downloads" style="font-size:0.8em !important">Downloads</div>
			<div class="pull-right"><a href="#" class="back" onclick="back(event);">Voltar</a></div>
					<div class="row" style="margin:20px auto; display:block;"></div>
					<div class="row" style="margin:15px auto;"></div>
				@if (count($noticias)>0)
					@foreach ($noticias as $noticia)
						<div class="row" style="margin-bottom:25px;">
							<div class="col-sm-5" style="margin-top:5px;">
								<div class="news-image" style="overflow:hidden;display:block;width:150px !important; height:150px; margin-left:25px;">
									<div class="img-propostas" style="background: #bbb; height:160px; margin-top:-20px; padding:0px; padding-top:20px;">
										@if($noticia->mainImage):
										<img src=<?php $img=substr($noticia->mainImage,9);echo "'".substr_replace($noticia->mainImage,"small_".$img,9)."' style='margin-left:-30px;margin-top:-30px;'"; ?>> 
										@endif;
									</div>
								</div>
							</div>
							<div class="col-sm-11" style="margin-left:-20px;">

								<div class="row">
									<h4 style="font-size:1.2em;"><strong><a href="{{$noticia->url}}" target="_new" style="text-decoration:none;color:#000;"><p class="MsoNormal">{{$noticia->title}}</p></a></strong></h4>
								</div>
								<div class="row">
									<p class="MsoNormal">{{$noticia->description}}</p>
								</div>
							</div>
						</div>
					@endforeach
					<div class="row">
					<div style="text-align:center;margin-top:20px;">
						{{$noticias->links()}}
					</div>
				</div>
				@endif
		</article>
	</div>

@stop

@section ("plugins")

@stop