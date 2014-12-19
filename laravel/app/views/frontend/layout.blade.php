<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Valmir Prascidelli - @yield('title' , "É Politica de qualidade")</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:600' rel='stylesheet' type='text/css'>
	{{HTML::style("assets/css/bootstrap.min.css", array("media"=>"screen"))}}
	{{HTML::style("assets/css/main.css", array("media"=>"screen"))}}
	{{HTML::style("assets/admin/assets/plugins/lightbox/css/lightbox.css", array("media"=>"screen"))}}
	{{HTML::style("assets/admin/assets/plugins/slick/slick.css", array("media"=>"screen"))}}
	<!-- {{HTML::style("assets/css/flexslider.css", array("media"=>"screen"))}} -->
	{{HTML::style("assets/css/coin-slider-styles.css", array("media"=>"screen"))}}
	{{HTML::style("//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css", array("media"=>"screen"))}}

	@yield("css")

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    @yield("page")
</head>
<body>
<script>
	function back(evt){
		evt.preventDefault();
		window.history.back();
	}
</script>
	<style>
	body{
	font-family:'Verdana' !important;
	}
		nav{
			height: 60px !important;
			vertical-align: bottom !important;
			padding-top: 15px;
		}
		#shortlinks li {
			position:relative;
			padding: 0px;
			list-style: none;
			text-align: center;
			margin: 0 2px;
			width: 70px;
			display: inline-block;
			-webkit-transition: all 300ms linear;
			-moz-transition: all 300ms linear;
			-o-transition: all 300ms linear;
			-ms-transition: all 300ms linear;
			transition: all 300ms linear;
			}
		#shortlinks li.animated{
			position:relative;
			padding: 4px;
			list-style: none;
			text-align: center;
			width: 30px;
			height: 30px;
			margin: 0 2px;
			display: inline-block;
			border: 1px solid rgba(255,255,255,1);
			border-radius: 50%;
			-webkit-transition: all 300ms linear;
			-moz-transition: all 300ms linear;
			-o-transition: all 300ms linear;
			-ms-transition: all 300ms linear;
			transition: all 300ms linear;
			}
			.back, .back:hover{
			position:relative;
			padding: 3px;
			list-style: none;
			text-align: center;
			width: 80px;
			margin: 0 2px;
			color: #FFF;
			background: #d1d3d4;
			display: inline-block;
			border: 2px solid #bbb;
			border-radius: 5px;
			text-decoration: none			
			}
			#shortlinks li:hover {
			-webkit-transform: scale(0.9);
			-moz-transform: scale(0.9);
			-ms-transform: scale(0.9);
			-o-transform: scale(0.9);
			transform: scale(0.9);
			}
			#shortlinks li a {
			font-size: 16px;
			line-height: 20px;
			width: 20px;
			color: #fff;
			margin:0;
			padding: 0;
			}
			#social-links{
				width: 955px;
				margin-right: auto;
				margin-left: auto;
				padding-left: 7.5px;
				padding-right: 7.5px;
				margin-bottom: 7.5px;
				position: relative;
				display: block;
				height: 40px;
				padding-top:5px;
			}
			#social-links #shortlinks{
				position: absolute;
				right: 0px;
			}
			#shortlinks li{
				position: relative;
			}
			#shortlinks li a.dastan img{
				position: absolute;
				bottom:-5px;
			}
			
	</style>
	<div id="social-links">
		<ul id="shortlinks">
		<li style="width:120px"><a href="http://www.brasil.gov.br" target="_new" style="text-decoration:none;"><h4 style="color:white;font-family:font-family: 'Open Sans', sans-serif;">Portal Brasil</h4></a></li>
		<!-- <li><a href="http://www.padilha13.pt/" target="_new">{{HTML::image("assets/img/logotipo-padilha13-39.png","",array("class"=>"img-responsive","style"=>"padding-top:3px;"))}}</a></li> -->
		<!-- <li><a href="http://www.eduardosuplicy.com.br/" target="_new">{{HTML::image("assets/img/suplicy.png","",array("class"=>"img-responsive","style"=>"padding-top:5px;"))}}</a></li> -->
		<li style="width:30px;"><a href="http://linhadireta.org.br" target="_new">{{HTML::image("assets/img/star-pt-foote-br.png","",array("style"=>"padding-top:3px;height:30px;margin-top:-5px;"))}}</a></li>
		<li class="animated  bounceIn delay"><a href="http://www.facebook.com/valmir.prascidelli" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook" target="_new"><i class="fa fa-facebook"></i></a></li>
		<li class="animated  bounceIn delay"><a href="http://www.twitter.com/prascidelli" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter" target="_new"><i class="fa fa-twitter"></i></a></li>
		<li class="animated  bounceIn delay"><a href="https://www.flickr.com/photos/126665924@N05/sets/" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google+" target="_new"><i class="fa fa-flickr"></i></a></li>
		<li class="animated  bounceIn delay"><a href="https://www.youtube.com/user/ValmirPrascidelli13" data-toggle="tooltip" data-placement="top" title="" data-original-title="Youtube" target="_new"><i class="fa fa-youtube"></i></a></li>
		<li class="animated  bounceIn delay"><a href="https://soundcloud.com/valmirprascidelli1335" data-toggle="tooltip" data-placement="top" title="" data-original-title="Soundcloud" target="_new"><i class="fa fa-soundcloud"></i></a></li>
		</ul>
	</div>
	<section class="container">	
		<header class="row">
			<nav class="row">
				<ul class=" col-sm-15 col-md-offset-1 col-md-15 col-lg-offset-1 col-lg-15 menu-header">
					<li><a href="{{{ URL::to('/') }}}" class="{{{ (Request::is('/') ? 'active' : '') }}}">Home</a></li>
					<li><a href="{{{ URL::to('noticias') }}}" class="{{{ (Request::is('noticias') ? 'active' : '') }}}{{{ (Request::is('noticia/*') ? 'active' : '') }}}">Noticias</a></li>
					<!-- <li><a href="{{{ URL::to('campanhas') }}}" class="{{{ (Request::is('campanhas') ? 'active' : '') }}}{{{ (Request::is('campanha/*') ? 'active' : '') }}}">Campanha</a></li> -->
					<li><a href="{{{ URL::to('bio') }}}" class="{{{ (Request::is('bio') ? 'active' : '') }}}">Biografia</a></li>
					<li><a href="{{{ URL::to('artigos') }}}" class="{{{ (Request::is('artigos') ? 'active' : '') }}}{{{ (Request::is('artigo/*') ? 'active' : '') }}}">Artigos</a></li>
					<li><a href="{{{ URL::to('propostas') }}}" class="{{{ (Request::is('propostas') ? 'active' : '') }}}{{{ (Request::is('proposta/*') ? 'active' : '') }}}">Propostas</a></li>
					<li><a href="{{{ URL::to('participe') }}}" class="{{{ (Request::is('participe') ? 'active' : '') }}}">Participe</a></li>
					<li><a href="{{{ URL::to('apoios') }}}" class="{{{ (Request::is('apoios') ? 'active' : '') }}}{{{ (Request::is('apoio/*') ? 'active' : '') }}}">Apoios</a></li>
					<li><a href="{{{ URL::to('videos') }}}" class="{{{ (Request::is('videos') ? 'active' : '') }}}">Videos</a></li>
					<li><a href="{{{ URL::to('downloads') }}}" class="{{{ (Request::is('downloads') ? 'active' : '') }}}">Downloads</a></li>
					<li><a href="{{{ URL::to('contato') }}}" class="{{{ (Request::is('contato') ? 'active' : '') }}}">Contato</a></li>
					
					<!-- <li>{{HTML::link("/noticias","Noticias")}}</li>
					<li>{{HTML::link("/campanhas","Campanhas")}}</li>
					<li>{{HTML::link("/bio","Biografia")}}</li>
					<li>{{HTML::link("/propostas","Propostas")}}</li>
					<li>{{HTML::link("/participe","Participe")}}</li>
					<li>{{HTML::link("/artigos","Artigos")}}</li>
					<li>{{HTML::link("/apoios","Apoio")}}</li>
					<li>{{HTML::link("/videos","Videos")}}</li>
					<li>{{HTML::link("/contato","Contato")}}</li> -->
				</ul>
			</nav>
			<div class="row">
				<div class="col-sm-16">
					<div id="coin-slider">
						{{HTML::image("assets/img/slide-1.jpg","")}}
						{{HTML::image("assets/img/slide-2.jpg","")}}
						{{HTML::image("assets/img/slide-3.jpg","")}}
						{{HTML::image("assets/img/slide-4.jpg","")}}
						{{HTML::image("assets/img/slide-5.jpg","")}}
						<!-- {{HTML::image("assets/img/slide-6.jpg","")}} -->
	                    <div class="controls"></div>
					</div> 
				</div>
			</div>
			<div class="clearfix"></div>	
		</header>
	
		<section class="content" style="margin-top:65px;">
			@yield ('content')
		</section>
	
		<footer>
			<div class="row">
				{{HTML::image("assets/img/rodapie.png","", array('class'=>'img-responsive'))}}
			</div>
			<div class="row twitter" style="display:block; background-color:#164a7c;height:70px;">
				<div class="col-sm-1 col-sm-offset-1" style="margin-top:17px;">
					{{HTML::image("assets/img/twitter.png","",array("class"=>"img-responsive"))}}
				</div>
				<div id="tweets" class="col-sm-12 col-sm-offset-1" style="color:#fff;margin-top:13px;">
				</div>
			</div>
			<div class="row footer">
				
			</div>
			<div class="row footer copyright">
				<p style="text-align:center;margin-top:5px;padding:0 40px;">Rua General Bittencourt, 170 - Osasco - SP - CEP: 06016-040  - Telefone: (011) 36852164
                <!-- Coligação para mudar de verdade: PT - PCdoB - PR  •  CNPJ: 20.559.162/0001-71 -->
                
                </p>
			</div>
		</footer>
	</section>
		{{HTML::script("assets/js/jquery-2.1.1.min.js")}}
		<script>
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			  ga('create', 'UA-54057573-1', 'auto');
			  ga('send', 'pageview');

		</script>
		{{HTML::script("assets/js/coin-slider.js")}}
		{{HTML::script("assets/js/jquery.wt-rotator.js")}}
		{{HTML::script("assets/admin/assets/plugins/slick/slick.min.js")}}
		<!-- {{HTML::script("assets/js/jquery.flexslider.js")}} -->
		{{HTML::script("assets/js/main.js")}}
		{{HTML::script("assets/admin/assets/plugins/lightbox/js/lightbox.min.js")}}
		<script>
		
		</script>
	
	@yield("plugins")
</body>
</html>
