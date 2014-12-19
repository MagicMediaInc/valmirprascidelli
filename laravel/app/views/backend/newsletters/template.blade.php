<!DOCTYPE html>
<html lang="br">
<head>
	<meta charset="UTF-8">
	<title>Boletim Eletrônico</title>
	<style>
		.image{

			height: 220px;
			-webkit-clip-path: polygon(54px 212px,437px 212px,458px -567px,-160px 241px,-1px 258px);
			}
		.sgv-image{	clip-path: url("#clipPolygon");}
	</style>
</head>
<body>
<svg width="0" height="0">
  <clipPath id="clipPolygon">
    <polygon points="212 147,245 63,424 85,556 164,542 286,424 340,218 265">
    </polygon>
  </clipPath>
</svg>
	<table width="450" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#e6e7e9">
		<tr>
			<td width="20"></td>
			<td align="left" valign="middle" style="font-family:Verdana;font-size:7pt;display:inline-block;text-transform:uppercase;font-weight:bold; margin-left:20px;padding:10px 0px;">
				N° 

					@if (intval($information->order <=9))

						 {{ "0".$information->order}}
						 {{" - "}}
					  @else
						 {{$information->order}}
						 {{" - "}}
					  @endif

			

				<span style="font-family:Verdana;font-size:7pt;display:inline-block;text-transform:uppercase;font-weight:bold;" class="feiras">{{$information->dateInformation}}</span>
			</td>
			<td width="20"></td>
		</tr>
		<tr>
			<td width="20"></td>
			
			<td style="position:relative; font-size:0.8em; text-align:center;"><img src="../../../newsletter/img/header.png" alt="" width="410">
			
			<td width="20"></td>

			</td>
		</tr>
		@for ($i=0; $i< count($pos); $i++)
		@foreach ($noticias as $noticia)
		@if ($pos[$i]==$noticia->id)
		<?php
			// $img=Image::make($noticia->mainImage);
			// Apply another image as alpha mask on image
			// $img->mask('../../../newsletter/img/header.png');

			// Apply a second image with alpha channel masking
			// $img->mask('../../../newsletter/img/header.png', true);


			// var_dump($img);
		?>
		<tr>
			<td>
				
			</td>
			<td style="text-align:center;">
					<p style="margin:25px 20px;font-family:Verdana; font-size:13px; color:#8D291B; text-transform:uppercase; font-weight: bold;">{{$noticia->title}}</p>
			</td>
			<td>
				
			</td>
		</tr>
		<tr>
			<td width="20px">
				
			</td>
			<td>
				<div align="center">
					<div class="image" style="height: 220px;
			-webkit-clip-path: polygon(54px 212px,437px 212px,458px -567px,-160px 241px,-1px 258px);">
						<img data-id="{{$noticia->id}}" class="sgv-image" src=<?php $img=substr($noticia->mainImage,9);echo "'".substr_replace($noticia->mainImage,"medium_".$img,9)."'"; ?> alt="{{$noticia->description}}" style="width:410px !important;" align="absmiddle">
		    		</div>
		    	</div>
		    </td>
			<td width="20px;">
				
			</td>
		</tr>

		<tr>
			<td>
				
			</td>
			<td style="text-align:justify;">
					<p style="margin:25px 20px;font-family:Verdana; font-size:13px;">{{$noticia->description}}</p>
			</td>
			<td>
				
			</td>
		</tr>
		<tr>
			<td width="20px">
			</td>
			<td style="text-align:center;">
					<img src="../../../newsletter/img/fio.png" width="350px;" style="margin-bottom:10px;"><a href="http://www.valmirprascidelli.com.br/noticia/{{$noticia->id}}" target="_new"><img src="../../../newsletter/img/bt.png" alt="" width="60px;" style="margin-bottom:10px;"></a>
			</td>
			<td width="20px">
			</td>
		</tr>
		@endif
		@endforeach
		@endfor
		<tr>

			<td colspan="3" style="position:relative; text-align:center;vertical-align:baseline;"><img src="../../../newsletter/img/footer.png" width="450px;" style="vertical-align:bottom;">
			</td>
		</tr>
		<!-- <tr>
			<td colspan="3" height="42" style="font-family:Verdana;font-size:7pt; text-align:center;background-color:#c52d16;color:#fff;">Rua General Bittencourt, 170 - Osasco - SP - CEP: 06016-040 - (011) 36852164 Coligação para mudar de verdade: PT - PCdoB - PR • CNPJ: 20.559.162/0001-71</td>
		</tr> -->
		<tr>
			<td colspan="3" align="center" height="40">
				<p style="font-family:Verdana;font-size:7pt;">Não deseja mais receber nossos e-mails? Solicite o descadastramento <a style="font-family:Verdana;font-size:7pt;font-weight:bold;" href="mailto:boletim1335@valmirprascidelli.com.br?subject=Solicitude de descadastramento de e-mail">aqui</a></p>
			</td>
		</tr>
	</table>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
	{{HTML::script("assets/admin/assets/plugins/moment/moment.js")}}
</body>
</html>