@extends ('frontend.layout')

@section ("title")

Artigo

@stop
@section("page")
	<?php $i=6; ?>
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
	<article class="news-rotator col-xs-14 col-md-offset-1 col-sm-14  col-md-14 " style="margin-left:5%;">
			<div class="icon ico-artigos">Artigos</div>
		<div class="row" style="margin:10px auto; display:block;"></div>
					<div class="pull-right"><a href="#" class="back" onclick="back(event);">Voltar</a></div>
			
				<div class="col-sm-16">	
				</div>
				<div class="row col-sm-5" style="margin-bottom:35px; margin-top:10px;">
					<img src="{{$noticia->mainImage}}" data-toggle="tooltip" data-placement="bottom" data-original-title="{{$noticia->description}}" class="img-responsive news-image tool-tip" style="border-radius:0 !important;margin: 0 auto !important;cursor:pointer;"/>
				</div>
				<div class="row col-sm-10 col-sm-offset-1" style="margin-bottom:35px;">

					<h4 style="text-align:justify; font-size:1.2em;"><strong>{{$noticia->title}}</strong></h4>
					<div class="row" style="margin-bottom:10px;"></div>
					{{$noticia->content}}
				</div>
		</article>

	
	</div>

@stop

@section ("plugins")

@stop


