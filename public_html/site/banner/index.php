<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="pt-BR"> 
 
<head profile="http://gmpg.org/xfn/11">

	<title>Sistema de Destaques - Thiago Belem / Blog</title>
	<meta name="author" content="Thiago Belem - contato@thiagobelem.net" />
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<!-- CSS -->
	<link rel="stylesheet" href="css/destaque.css" type="text/css" />
	
	<!-- jQuery -->
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.cycle.all.min.js"></script>
	<script type="text/javascript" src="js/jquery.destaques.js"></script>
	
	<!-- Estilos adicionais (apenas para essa página de exemplo) -->
	<style>
	h1 { font-size: 20px; color: black; }
	p.creditos { font-size: 14px; color: black; font-family: Tahoma, Verdana, sans-serif; }
	</style>
	
</head>
<body>

<p class="creditos">&nbsp;</p>

<!-- destaques -->
<?php require_once('mysql_destaques.php'); ?>
<?php if (isset($lista_destaques) AND !empty($lista_destaques)) { ?>
<div id="blocoDestaques">

	<a class="faixa" href="#" title=""><!-- --></a>

	<ul>
		<?php foreach ($lista_destaques AS $destaque) { ?>
		<li>
			<a href="<?php echo $destaque->link; ?>" title="<?php echo $destaque->titulo; ?>">
				<img src="<?php echo $destaque->imagem; ?>" alt="<?php echo $destaque->titulo; ?>" />
			</a>
			<div class="fundo"><!--  --></div>
			<p><a href="<?php echo $destaque->link; ?>" title="<?php echo $destaque->titulo; ?>"><?php echo $destaque->titulo; ?></a></p>
		</li>
		<?php } ?>
	</ul>
</div>
<?php } ?>
<!-- /destaques -->
	
</body>
</html>