Titulo: {{ $noticia->title }}<br>
Descripcion: {{ $noticia->description }}<br>
Pagina: {{ $noticia->pages->description}}<br>
Album: {{$noticia->album->id}}<br>
Galeria: {{$noticia->album->gallery}}<br>


@extends ('frontend.layout')

@section ("title")

View

@stop

@section ("content")
	<div class="row">
@if($noticia->pages->description=="Apoio")
		<article class="news-rotator col-xs-7 col-sm-7  col-md-7 " style="margin-left:5%;">
			<div class="icon ico-apoio">Apoio</div>
			<div class="row" style="margin:20px auto; display:block;"></div>
				<div class="col-sm-12">
					<h5 style="text-align:justify;"><strong>{{$noticia->title}}</strong></h5>
				</div>
				<div class="row col-sm-5" style="margin-bottom:35px;">
					<img src="{{$noticia->mainImage}}" class="img-responsive news-image" style="border-radius:0 !important;margin: 0 auto;"/>
					<p class="news-desc" style="text-align:center;">{{$noticia->description}}</p>
				</div>
				<div class="row col-sm-7" style="margin-bottom:35px;">
					{{$noticia->content}}
				</div>
				
		</article>

		<article class="news-rotator col-xs-3 col-xs-offset-1 col-sm-3 col-sm-offset-1 col-md-3 col-md-offset-1">
			<div class="icon ico-news">Noticias</div>
			
			<div class="row" style="margin:20px auto; display:block;"></div>
				
		</article>
@endif
	</div>

@stop

@section ("plugins")

@stop


