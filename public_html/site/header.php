<?php

	echo "<!doctype html>
<html lang=\"es\">
<head>
	<meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
	<title>Valmir Prascidelli - 
Home

</title>
	<link media=\"screen\" type=\"text/css\" rel=\"stylesheet\" href=\"./temporal/css/bootstrap.min.css\">
	<link media=\"screen\" type=\"text/css\" rel=\"stylesheet\" href=\"./banner/css/destaque.css\">
	<link media=\"screen\" type=\"text/css\" rel=\"stylesheet\" href=\"./temporal/css/main.css\">
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src=\"https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js\"></script>
      <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
    <![endif]-->
</head>
<body>
	<section class=\"container\">	
		<header>
			<nav class=\"row\">
				<ul class=\"col-sm-offset-2 col-sm-10 col-md-offset-4 col-md-8 col-lg-offset-4 col-lg-8 menu-header\">";


				if($active=="index"):
					echo "<li><a class=\"active\" href=\"#\">Principal</a></li>";
				else:
					echo "<li><a href=\"#\">Principal</a></li>";
				endif;
				if($active=="biografia"):
					echo "<li><a class=\"active\" href=\"biografia.php\">Valmir Prascidelli</a></li>";
				else:
					echo "<li><a href=\"biografia.php\">Valmir Prascidelli</a></li>";
				endif;
				if($active=="noticias"):
					echo "<li><a class=\"active\" href=\"#\">Noticias</a></li>";
				else:
					echo "<li><a href=\"#\">Noticias</a></li>";
				endif;
				if($active=="artigos"):
					echo "<li><a class=\"active\" href=\"#\">Artigos</a></li>";
				else:
					echo "<li><a href=\"#\">Artigos</a></li>";
				endif;
				if($active=="apoio"):
					echo "<li><a class=\"active\" href=\"#\">Apoio</a></li>";
				else:
					echo "<li><a href=\"#\">Apoio</a></li>";
				endif;
				if($active=="tv"):
					echo "<li><a class=\"active\" href=\"#\">TV Prascidelli</a></li>";
				else:
					echo "<li><a href=\"#\">TV Prascidelli</a></li>";
				endif;
				if($active=="contato"):
					echo "<li><a class=\"active\" href=\"contato.php\">Contato</a></li>";
				else:
					echo "<li><a href=\"contato.php\">Contato</a></li>";
				endif;
	echo "</ul>
			</nav>
			<div class=\"row\">
				<img src=\"./temporal/img/banner.png\" class=\"img-responsive\" alt=\"\">			</div>
			<div class=\"clearfix\"></div>	
		</header>
		<section class=\"content\">";
?>