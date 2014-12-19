@extends ('frontend.layout')

@section ("title")

Apoios

@stop
@section("page")
	<?php $i=7; ?>
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
	<div class="row">
		<article class="news-rotator col-xs-14 col-xs-offset-1 col-sm-14 col-sm-offset-1 col-md-14 col-md-offset-1">
			<div class="icon ico-apoio">Apoio</div>
			<div class="pull-right"><a href="#" class="back" onclick="back(event);">Voltar</a></div>
					<div class="row" style="margin:20px auto; display:block;"></div>
					<div class="row" style="margin:15px auto;"></div>
				@foreach ($noticias as $noticia)
					<div class="row" style="margin-bottom:40px;">
						<div class="col-sm-5" style="margin-top:5px;">
							<div class="news-image" style="overflow:hidden;display:block;width:150px !important; height:150px; margin-left:25px;">
								<img src=<?php $img=substr($noticia->mainImage,9);echo "'".substr_replace($noticia->mainImage,"small_".$img,9)."'"; ?> style="width:150% !important; margin-left:-30%;" />
							</div>
						</div>
						<div class="col-sm-11" style="margin-left:-20px;">
							<div class="row">
								<h4 style="font-size:1.2em;"><strong>{{$noticia->title}}</strong></h4>
							</div>
							<div class="row">
								<p class="news-desc" style="font-size:0.8em;">{{$noticia->content}}</p>
							</div>
						</div>
					</div>
				@endforeach
				<div class="row">
					<div style="text-align:center;margin-top:20px;">
						{{$noticias->links()}}
					</div>
				</div>
		</article>
	</div>

@stop

@section ("plugins")

@stop