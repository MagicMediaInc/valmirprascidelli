@extends ('frontend.layout')

@section ("title")

Home

@stop

@section("page")
	<?php $i=0; ?>
@stop

@section ("content")

	<?php 

							function recortar_texto($texto, $limite=150,$separador="...",$link=""){   
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
							        $resultado .= $separador;
							        $resultado .= $link;
							    }   
							    return $resultado;
							}


							?>
	<style type="text/css">
		ul.slides{
			-webkit-padding-start:0px !important;
		}
		#paginator{
			margin-top: 1em; 
			text-align: center;
		}
		#paginator .element{
			width:30px;
			height:30px;
			background: #c52d16;
			display: inline-block;
			text-align: center;
			color: #DDD;
			font-weight: bold;
			font-size: 14pt;
			cursor:pointer;
		}
		.inactive{
			background: #d1d3d4;
		}
		.active-img{
			background: #c52d16;
		}

		@media (min-width: 992px){
		.col-md-7 {
			width: 42.10% !important;
		}
	}
	@media (min-width: 992px){
		.col-md-7 {
			width: 42.10% !important;
		}
	}
	</style>
	<div class="row">
		<article class="news-rotator col-xs-9 col-xs-offset-1 col-sm-9 col-md-9" style="height:548px !important; position:relative;">
			<div class="icon ico-news">Noticias</div>
			<div class="row" style="margin:20px auto; display:block;"></div>
			<div id="slider">
				@foreach ($noticias as $noticia)
				    <div class="banner-element" style="text-align:center;position:relative;">
						<h3 style="position:absolute;top:0;width:100%;display:block;margin-top:-35px;"><a href="{{'/noticia/'.$noticia->id}}" style="color:#000;text-decoration:none;">{{$noticia->title}}</a></h3>
						<div class="img-news-container" style="width:100%;height:300px;overflow:hidden;margin-top:60px;margin-bottom:15px"><a href="{{'/noticia/'.$noticia->id}}" style="color:#000;text-decoration:none;"><img src="{{$noticia->mainImage}}" class="img-responsive" style="margin:20px auto; display:block;"/></a></div>
						<span><a href="{{'/noticia/'.$noticia->id}}" style="color:#000;text-decoration:none;">{{recortar_texto($noticia->description)}}</a></span>
				    </div>
				@endforeach
			</div>
			<script type="text/javascript">

function changeBanner(elem){

    $('#slider div.banner-element:gt('+elem+')').fadeOut(0);
    $('#slider div.banner-element:lt('+elem+')').fadeOut(0);
    $('#slider div.banner-element:eq('+elem+')').fadeIn(1000);
    $('#paginator div.element:gt('+elem+')').css({ 'background' : '#d1d3d4'});
    $('#paginator div.element:lt('+elem+')').css({ 'background' : '#d1d3d4'});
    $('#paginator div.element:eq('+elem+')').css({ 'background' : '#c52d16'});
}
			</script>
			<div id="paginator" style="margin-bottom:5px; position:absolute; bottom:30px;left:38%;">
				@for ($i = 0 ; $i < count($noticias);$i++)
				    <div class="element" onclick="javascript:changeBanner({{$i}});">
				    	{{$i+1}}
				    </div>
				@endfor

			</div>
		</article>
		<article class="news-rotator col-xs-4 col-xs-offset-1 col-sm-4 col-md-4">
			<div class="icon ico-apoio">Apoio</div>
			
			<div class="row" style="margin:20px auto !important; display:block;"></div>
				@foreach ($apoios as $apoio)
					<div class="row" class="apoio-side" style="margin-bottom:10px;">
						<div class="row">
						<div class="col-sm-16" class="top" style="">
							<strong><a class="news-desc enlace" href="{{'/apoio/'.$apoio->id}}" style="text-decoration:none;font-size:0.7em;text-transform:uppercase;color:#000;text-align:center;"><p style="text-align:center;">{{ recortar_texto($apoio->title,50)}}</p></a></strong>
						</div>
						</div>
						<div class="row">
						<div class="col-sm-16" class="top" style="">
							<div class="news-image img-apoio" style="display:block;height:120px;overflow:hidden;max-width:90%;border-radius:0 !important;margin: 0 auto;" />
								<a href="{{'/apoio/'.$apoio->id}}" ><img src="{{$apoio->mainImage}}" class="img-responsive" style="margin-top:-10px;"/></a>
							</div>
						</div>
						</div>
						
						<div class="row">
						<div class="col-sm-16" class="top" style="">
							<p class="news-desc" style="text-align:center;">{{$apoio->description}}</p>
						</div>
						</div>
						<div class="row">
						<div class="col-sm-16" class="top" style="">
							<a class="news-desc enlace" href="{{'/apoio/'.$apoio->id}}" style="text-decoration:none;font-size:0.8em;color:#000;text-align:center;"><p style="text-align:center;">{{recortar_texto($apoio->content,50,"...","Mais")}}</p></a>
						</div>
						</div>
					</div>
				@endforeach 
		</article>
	</div>
	<div class="row" style="margin-top:20px !important; margin-bottom:20px !important;">
	<div class="slider">
		<div id="carousel" class="flexslider">
			<ul class="slides">
			@foreach ($galleries as $gallery)
				<li>
		    		<figure class="slide" style="width:200px !important;">
		    			<div style="height:110px;overflow:hidden;">
							{{HTML::image($gallery->description,"",array("class"=>"img-responsive"))}}
						</div>
					</figure>
		    	</li>
			@endforeach
			</ul>
	</div>
	<div class="row" style="margin:20px auto; display:block;"></div>
	<div class="row" style="margin:20px auto; display:block;"></div>
	<div class="row">
		<article class="news-rotator col-xs-14 col-xs-offset-1 col-sm-14 col-sm-offset-1 col-md-14 col-md-offset-1">
			<div class="icon ico-video">Videos</div>
			<div class="col-sm-5" style="margin-top:20px;text-align:center;margin-right:20px !important;margin-left:6px !important;">
				@if(count($video) > 0)
					<div class="row" style=" display:inline-block;text-align:center;">
					<span><a href="{{'/video/'.$video[0]->id}}" style="text-align:center;color:#000;text-decoration:none;font-size:0.9em;">{{recortar_texto($video[0]->title,23,"")}}</a></span>
					<iframe width="100%" height="auto" src="{{ str_replace('watch?v=','embed/',str_replace(':','',str_replace('s:','',str_replace('http','',$video[0]->description))))}}?theme=light&showinfo=0&controls=0" frameborder="0"  allowfullscreen></iframe>
					</div>
				@endif
			</div>
			<div class="col-sm-5" style="margin-top:20px;text-align:center;margin-right:20px !important;">
				@if(count($video) > 0)
					<div class="row" style="display:inline-block;text-align:center;">
					<span><a href="{{'/video/'.$video[0]->id}}" style="text-align:center;color:#000;text-decoration:none;font-size:0.9em;">{{recortar_texto($video[0]->title,23,"")}}</a></span>
					<iframe width="100%" height="auto" src="{{ str_replace('watch?v=','embed/',str_replace(':','',str_replace('s:','',str_replace('http','',$video[0]->description))))}}?theme=light&showinfo=0&controls=0" frameborder="0"  allowfullscreen></iframe>
					</div>
				@endif
			</div>
			<div class="col-sm-5" style="margin-top:20px;text-align:center;">
				@if(count($video) > 0)
					<div class="row" style="display:inline-block;text-align:center;">
					<span><a href="{{'/video/'.$video[0]->id}}" style="text-align:center;color:#000;text-decoration:none;font-size:0.9em;">{{recortar_texto($video[0]->title,23,"")}}</a></span>
					<iframe width="100%" height="auto" src="{{ str_replace('watch?v=','embed/',str_replace(':','',str_replace('s:','',str_replace('http','',$video[0]->description))))}}?theme=light&showinfo=0&controls=0" frameborder="0"  allowfullscreen></iframe>
					</div>
				@endif
			</div>
		</article>
	</div>
	<div class="row" style="margin:20px auto; display:block;"></div>
	<div class="row" style="margin:20px auto; display:block;"></div>
	
	<div class="row">
		<article class="news-rotator col-xs-7 col-xs-offset-1 col-sm-7 col-sm-offset-1 col-md-7 col-md-offset-1">
			<div class="icon ico-artigos">Artigos</div>
			<div class="row" style="margin:20px auto; display:block;"></div>
				@if(count($artigos) > 0)
				@foreach ($artigos as $artigo)
					<div class="row" class="apoio-side" style="margin-bottom:25px;">
						<div class="row">
						<div class="col-sm-16" class="top" style="margin-bottom:5px;">
							<strong><a class="news-desc enlace" href="{{'/artigo/'.$artigo->id}}" style="text-decoration:none;font-size:0.7em;text-transform:uppercase;color:#000;text-align:center;"><p style="text-align:center;">{{ recortar_texto($artigo->title,50)}}</p></a></strong>
						</div>
						</div>
							@if($artigo->mainImage!="")
							<div class="row">
								<div class="col-sm-16" class="top" style="margin-bottom:5px;">
									<div class="news-image img-apoio" style="display:block;height:110px;overflow:hidden;max-width:90%;border-radius:0 !important;margin: 0 auto;" />
										<a href="{{'/artigo/'.$artigo->id}}" ><img src="{{$artigo->mainImage}}" class="img-responsive" style="margin-top:-10px;"/></a>
									</div>
								</div>
							</div>
							@endif
						
						<div class="row">
						<div class="col-sm-16" class="top" style="margin-bottom:5px;">
							<p class="news-desc" style="text-align:center;">{{$artigo->description}}</p>
						</div>
						</div>
						<div class="row">
						<div class="col-sm-16" class="top" style="margin-bottom:5px;">
							<a class="news-desc enlace" href="{{'/artigo/'.$artigo->id}}" style="text-decoration:none;font-size:0.8em;color:#000;text-align:center;"><p style="text-align:center;">{{recortar_texto($apoio->content,200,"Mais")}}</p></a>
						</div>
						</div>
					</div>
				@endforeach 
				@endif
		</article>
		<article class="news-rotator col-xs-7 col-sm-7  col-md-7 " style="margin-left:30px;margin-right:-30px;">
			<div class="icon ico-propostas" style="font-size:0.8em;">Propostas</div>
			<div class="row" style="margin:20px auto; display:block;"></div>
				@if(count($artigos) > 0)
				@foreach ($artigos as $artigo)
					<div class="row" class="apoio-side" style="margin-bottom:25px;">
						<div class="row">
						<div class="col-sm-16" class="top" style="margin-bottom:5px;">
							<strong><a class="news-desc enlace" href="{{'/artigo/'.$artigo->id}}" style="text-decoration:none;font-size:0.7em;text-transform:uppercase;color:#000;text-align:center;"><p style="text-align:center;">{{ recortar_texto($artigo->title,50)}}</p></a></strong>
						</div>
						</div>
							@if($artigo->mainImage!="")
							<div class="row">
								<div class="col-sm-16" class="top" style="margin-bottom:5px;">
									<div class="news-image img-apoio" style="display:block;height:110px;overflow:hidden;max-width:90%;border-radius:0 !important;margin: 0 auto;" />
										<a href="{{'/artigo/'.$artigo->id}}" ><img src="{{$artigo->mainImage}}" class="img-responsive" style="margin-top:-10px;"/></a>
									</div>
								</div>
							</div>
							@endif
						
						<div class="row">
						<div class="col-sm-16" class="top" style="margin-bottom:5px;">
							<p class="news-desc" style="text-align:center;">{{$artigo->description}}</p>
						</div>
						</div>
						<div class="row">
						<div class="col-sm-16" class="top" style="margin-bottom:5px;">
							<a class="news-desc enlace" href="{{'/artigo/'.$artigo->id}}" style="text-decoration:none;font-size:0.8em;color:#000;text-align:center;"><p style="text-align:center;">{{recortar_texto($apoio->content,200,"Mais")}}</p></a>
						</div>
						</div>
					</div>
				@endforeach 
				@endif
		</article>
	</div>

@stop

@section ("plugins")


	<script type="text/javascript">
//     	$(document).ready(	
// 			function() {
// 				$(".banner-rotator").wtRotator({
// 					width:825,
// 					height:300,
// 					button_width:24,
// 					button_height:24,
// 					button_margin:5,
// 					auto_start:true,
// 					delay:5000,
// 					transition:"random",
// 					transition_speed:800,
// 					cpanel_position:"inside",
// 					cpanel_align:"BR",
// 					timer_align:"top",
// 					display_thumbs:true,
// 					display_dbuttons:true,
// 					display_playbutton:true,
// 					display_numbers:true,
// 					display_timer:true,
// 					mouseover_pause:false,
// 					cpanel_mouseover:false,
// 					text_mouseover:false,
// 					text_effect:"fade",
// 					text_sync:true,
// 					tooltip_type:"image",
// 					shuffle:false,
// 					block_size:75,
// 					vert_size:55,
// 					horz_size:50,
// 					block_delay:25,
// 					vstripe_delay:75,
// 					hstripe_delay:180					
// 				});
// 			}
// 		);
// $(function(){
	
//     $('#slider div.banner-element:gt(0)').hide();
//     $('#paginator div.element:gt(0)').css({ 'background' : '#d1d3d4'});
//     $('#paginator div.element:lt(0)').css({ 'background' : '#d1d3d4'});
//     $('#paginator div.element:eq(0)').css({ 'background' : '#c52d16'});
//     var total = $('#slider div.banner-element').length;
//     var i = 0;
//     setInterval(function(){
//     	console.log('Antes del if ' + i);
//     	i++;
//     	if(i == total) i = 0;
//     	console.log('Despues del if ' + i);
//     	console.log('incremento  ' + i);
//     	console.log('');
//     	$('#slider div.banner-element:lt('+i+')').fadeOut(0);
//     	$('#slider div.banner-element:gt('+i+')').fadeOut(0);
//     	$('#slider div.banner-element:eq('+(i)+')').fadeIn(1000);
// 	    $('#paginator div.element:gt('+i+')').css({ 'background' : '#d1d3d4'});
// 	    $('#paginator div.element:lt('+i+')').css({ 'background' : '#d1d3d4'});
// 	    $('#paginator div.element:eq('+i+')').css({ 'background' : '#c52d16'});
//      }, 10000);
// });

    </script>    

@stop