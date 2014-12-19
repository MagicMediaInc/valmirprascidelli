@extends ('frontend.layout')

@section ("title")

Noticias

@stop
@section("page")
	<?php $i=1; ?>
@stop
@section ("content")
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "ec632103-ab0a-470c-bebc-2e3f6c97dfea", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

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
	<article class="news-rotator col-xs-14 col-md-offset-1 col-sm-14  col-md-14 ">
			<div class="icon ico-news">Noticia</div>
			<div class="row" style="margin:10px auto; display:block;"></div>
					<div class="pull-right"><a href="#" class="back" onclick="back(event);">Voltar</a></div>
			
				<div class="col-sm-16">	
				</div>
				<div class="row col-sm-5" style="margin-bottom:35px; margin-top:10px;">
					<div class="row">
						<img src=<?php $img=substr($noticia->mainImage,9);echo "'".substr_replace($noticia->mainImage,"small_".$img,9)."'"; ?> data-toggle="tooltip" data-placement="bottom" data-original-title="{{$noticia->description}}" class="img-responsive news-image tool-tip" style="border-radius:0 !important;margin: 0 auto !important;cursor:pointer;"/>
					</div>
					<div class="row" style="text-align:center;margin-top:20px;">
						@foreach ($imagen as $img)

							<div style="display:inline-block;height:80px !important;overflow:hidden !important; margin:0px !important;width:45%;border:5px solid #d1d3d4;">
								<a href="{{$img->description}}"><img class="tool-tip" data-toggle="tooltip" data-original-title="{{$img->title}}" src=<?php $img->description=substr($img->description,9);echo "'".substr_replace($img->description,"../uploads/small_".$img->description,0)."'"; ?> style="width:100% !important;cursor:pointer;" /></a>
							</div>
						@endforeach
					</div>
				</div>
				<div class="row col-sm-10 col-sm-offset-1" style="margin-bottom:35px;">

					<h4 style="text-align:justify; font-size:1.2em;"><strong>{{$noticia->title}}</strong></h4>
					<div class="row" style="margin-bottom:10px;"></div>
					{{$noticia->content}}

					<span class='st_sharethis'></span>
					<span class='st_facebook'></span>
					<span class='st_twitter' ></span>
					<span class='st_linkedin'></span>
					<span class='st_pinterest'></span>
					<span class='st_email'></span>
				</div>
				
		</article>

	</div>

@stop

@section ("plugins")
	{{HTML::script("assets/js/jquery.printElement.min.js")}}
	{{HTML::script("assets/js/bootstrap.min.js")}}
<script>
	$(document).on("ready",function(){
		$(".tool-tip").tooltip();
	})
</script>
@stop


