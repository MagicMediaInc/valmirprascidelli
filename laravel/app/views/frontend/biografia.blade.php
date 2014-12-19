@extends ('frontend.layout')

@section ("title")

Valmir Prascidelli

@stop
@section("css")

@stop
@section("page")
	<?php $i=3; ?>
@stop
@section ("content")

	<div class="row">
		<article class="news-rotator col-xs-14 col-xs-offset-1 col-sm-14 col-sm-offset-1 col-md-14 col-md-offset-1">
			<div class="icon ico-pen">Biografia</div>
					<div class="pull-right"><a href="#" class="back" onclick="back(event);">Voltar</a></div>
					<div class="row" style="margin:20px auto; display:block;"></div>
					<div class="row" style="margin:15px auto;"></div>
			
			<div class="row">
				<div class="col-xs-5 col-sm-5 col-md-5">
					<div class="row">
						<img src="{{$bio[0]->mainImage}}" class="img-responsive">
					</div>
					<div class="row" style="text-align:center;margin-top:20px;">
						@foreach ($imagen as $img)

							<div style="display:inline-block;height:80px !important;overflow:hidden !important; margin:0px !important;width:45%;border:5px solid #d1d3d4;">
								<a href="{{$img->description}}"><img class="tool-tip" data-toggle="tooltip" data-original-title="{{$img->title}}" src=<?php $img->description=substr($img->description,9);echo "'".substr_replace($img->description,"uploads/small_".$img->description,0)."'"; ?> style="width:100% !important;cursor:pointer;" /></a>
							</div>
						@endforeach
					</div>
				</div>
				<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1" style="text-align:justify;">
				<h3 ><strong>{{$bio[0]->title}}</strong></h3>
				<div class="row" style="margin-bottom:10px;"></div>
				{{$bio[0]->content}}
				</div>
			</div>	
			
		</article>
	</div>

@stop

@section ("plugins")
{{HTML::script("assets/js/bootstrap.min.js")}}
<script>
	$(document).on("ready",function(){
		$(".tool-tip").tooltip();
	})
</script>
@stop