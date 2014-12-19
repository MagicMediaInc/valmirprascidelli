
	{{HTML::style("assets/admin/assets/plugins/fancybox/jquery.fancybox.css", array("media"=>"screen"))}}
	{{HTML::script("assets/js/jquery-2.1.1.min.js")}}
	{{HTML::script("assets/admin/assets/plugins/fancybox/jquery.fancybox.js")}}

			<?php //$imagenes=$noticiastotal[11]->album->gallery;var_dump($imagenes[0]->description); ?>
			
			@foreach($noticiastotal as $_NOTI)
				<script type="text/javascript">
				$(document).on('ready', function(){
				    $(".noti_<?php echo $_NOTI->id; ?>").fancybox({
				          helpers: {
				              title : {
				                  type : 'float'
				              }
				          }
				      });
					});
				</script>
				<div style="height:150px;overflow:hidden;">
    				<div class="image">
						<a href="{{$_NOTI->mainImage}}" class="fancybox noti_<?php echo $_NOTI->id; ?>" rel="noti_<?php echo $_NOTI->id; ?>"> <img src=<?php $img=substr($_NOTI->mainImage,9);echo "'".substr_replace($_NOTI->mainImage,"small_".$img,9)."'"; ?>/></a>
							@if(!empty($_NOTI->album->gallery[0]))
								@foreach ($_NOTI->album->gallery as $gallery)
							 		<a href="{{$gallery->description}}" class="noti_<?php echo $_NOTI->id; ?>" rel="noti_<?php echo $_NOTI->id; ?>"> <img src="{{$gallery->description}}" style="display:none;"> </a>
								@endforeach
							@endif
					</div>
				</div>
		
			@endforeach
		    <?php $n=0; ?>
			@foreach ($albums as $alb)
				<script type="text/javascript">
				$(document).on('ready', function(){
				    $(".album_<?php echo $_NOTI->id; ?>").fancybox({
				          helpers: {
				              title : {
				                  type : 'float'
				              }
				          }
				      });
					});
				</script>
				@if($alb->type=="Galeria")
				<div style="height:150px;overflow:hidden;">
    				<div class="image">
    					@if (true)
						<a href="{{$alb->gallery[0]->description}}" class="fancybox album_<?php echo $_NOTI->id; ?>" rel="album_<?php echo $_NOTI->id; ?>" id="album_<?php echo $_NOTI->id; ?>"> <img src=<?php $img=substr($alb->gallery[0]->description,9);echo "'".substr_replace($alb->gallery[0]->description,"small_".$img,9)."'"; ?>/></a>
							<?php $n++ ?>
						@else
						<a href="{{$alb->gallery[0]->description}}" class="fancybox album_<?php echo $_NOTI->id; ?>" rel="album_<?php echo $_NOTI->id; ?>" id="album_<?php echo $_NOTI->id; ?>"> <img style="display:none" src=<?php $img=substr($alb->gallery[0]->description,9);echo "'".substr_replace($alb->gallery[0]->description,"small_".$img,9)."'"; ?>/></a>
						@endif
					</div>
				</div>
				@endif
			@endforeach
		</div>
