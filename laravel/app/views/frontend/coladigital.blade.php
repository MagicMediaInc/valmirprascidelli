@extends ('frontend.layout')

@section ("title")

Cola Digital

@stop
@section("page")
@stop
@section ("content")

<style>
	input[type="text"],input[type="email"]{
			height: 42px;
			padding: 6px 12px;
			width: 100%;
			border-radius: 4px;
			border: 1px solid #ccc;

		}
</style>
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



$candidatos= array(
array('id'=>"13570", 'nome'=>"ALENCAR SANTANA", 'url'=>"../assets/img/boleta/01.jpg"),
array('id'=>"13000", 'nome'=>"ALESSANDRO AZEVEDO", 'url'=>"../assets/img/boleta/02.jpg"),
array('id'=>"13321", 'nome'=>"ALEXANDRE ALMEIDA", 'url'=>"../assets/img/boleta/03.jpg"),
array('id'=>"13013", 'nome'=>"ALEXANDRE PIMENTEL", 'url'=>"../assets/img/boleta/04.jpg"),
array('id'=>"12200", 'nome'=>"ALEX DA ACADEMIA", 'url'=>"../assets/img/boleta/05.jpg"),
array('id'=>"13513", 'nome'=>"ALOISIO GAMA", 'url'=>"../assets/img/boleta/06.jpg"),
array('id'=>"13223", 'nome'=>"AMÉLINHA", 'url'=>"../assets/img/boleta/07.jpg"),
array('id'=>"13632", 'nome'=>"ANA DO CARMO", 'url'=>"../assets/img/boleta/08.jpg"),
array('id'=>"13133", 'nome'=>"ANGELO D'AGOSTINI", 'url'=>"../assets/img/boleta/09.jpg"),
array('id'=>"13121", 'nome'=>"ANGELO PERUGINI", 'url'=>"../assets/img/boleta/10.jpg"),
array('id'=>"13199", 'nome'=>"ANTONIO MENTOR", 'url'=>"../assets/img/boleta/11.jpg"),
array('id'=>"13180", 'nome'=>"BABY ABRÃO", 'url'=>"../assets/img/boleta/12.jpg"),
array('id'=>"13644", 'nome'=>"BALTASAR", 'url'=>"../assets/img/boleta/13.jpg"),
array('id'=>"70800", 'nome'=>"BATISTA COMUNIDADE", 'url'=>"../assets/img/boleta/14.jpg"),
array('id'=>"13110", 'nome'=>"BARBA", 'url'=>"../assets/img/boleta/15.jpg"),
array('id'=>"13124", 'nome'=>"BEL SÁ", 'url'=>"../assets/img/boleta/16.jpg"),
array('id'=>"13620", 'nome'=>"BERNADETE FIN", 'url'=>"../assets/img/boleta/17.jpg"),
array('id'=>"13456", 'nome'=>"BETH SAHÃO", 'url'=>"../assets/img/boleta/18.jpg"),
array('id'=>"15036", 'nome'=>"BRANCO", 'url'=>"../assets/img/boleta/19.jpg"),
array('id'=>"13120", 'nome'=>"BRUNO FELICIO", 'url'=>"../assets/img/boleta/20.jpg"),
array('id'=>"19013", 'nome'=>"CAMILO DO SÃO SALOMÃO", 'url'=>"../assets/img/boleta/21.jpg"),
array('id'=>"14140", 'nome'=>"CAMPOS MACHADO", 'url'=>"../assets/img/boleta/22.jpg"),
array('id'=>"13021", 'nome'=>"CARLOS AQUINO", 'url'=>"../assets/img/boleta/23.jpg"),
array('id'=>"13999", 'nome'=>"CARLOS NEDER", 'url'=>"../assets/img/boleta/24.jpg"),
array('id'=>"13100", 'nome'=>"CASÉ", 'url'=>"../assets/img/boleta/25.jpg"),
array('id'=>"13233", 'nome'=>"CELIA BRANDANI", 'url'=>"../assets/img/boleta/26.jpg"),
array('id'=>"13963", 'nome'=>"CIDINHA", 'url'=>"../assets/img/boleta/27.jpg"),
array('id'=>"13003", 'nome'=>"CLAUDINEI DA AFUSE", 'url'=>"../assets/img/boleta/28.jpg"),
array('id'=>"13188", 'nome'=>"CRIS DO TELEMARKETING", 'url'=>"../assets/img/boleta/29.jpg"),
array('id'=>"13541", 'nome'=>"DANIEL SALES", 'url'=>"../assets/img/boleta/30.jpg"),
array('id'=>"13006", 'nome'=>"DR. JOÃO CARLOS", 'url'=>"../assets/img/boleta/31.jpg"),
array('id'=>"13880", 'nome'=>"DR. JORGE DO CARMO", 'url'=>"../assets/img/boleta/32.jpg"),
array('id'=>"13601", 'nome'=>"DR. JORGE PARADA", 'url'=>"../assets/img/boleta/33.jpg"),
array('id'=>"13810", 'nome'=>"DRª NEUSA DO CARMO", 'url'=>"../assets/img/boleta/34.jpg"),
array('id'=>"13007", 'nome'=>"EDDY LIMA SHOW", 'url'=>"../assets/img/boleta/35.jpg"),
array('id'=>"13640", 'nome'=>"EDSON MOURA", 'url'=>"../assets/img/boleta/36.jpg"),
array('id'=>"13300", 'nome'=>"EDUARDO PETROV", 'url'=>"../assets/img/boleta/37.jpg"),
array('id'=>"13137", 'nome'=>"ELAINE BRAMBILLA", 'url'=>"../assets/img/boleta/38.jpg"),
array('id'=>"13163", 'nome'=>"ELIANA MORAES", 'url'=>"../assets/img/boleta/39.jpg"),
array('id'=>"13114", 'nome'=>"ENIO TATTO", 'url'=>"../assets/img/boleta/40.jpg"),
array('id'=>"13258", 'nome'=>"ESTELA ALMAGRO", 'url'=>"../assets/img/boleta/41.jpg"),
array('id'=>"13678", 'nome'=>"EUVANILDE", 'url'=>"../assets/img/boleta/42.jpg"),
array('id'=>"13510", 'nome'=>"FRANCISCO FRANÇA", 'url'=>"../assets/img/boleta/43.jpg"),
array('id'=>"13234", 'nome'=>"FRED", 'url'=>"../assets/img/boleta/44.jpg"),
array('id'=>"13033", 'nome'=>"GENIZIA", 'url'=>"../assets/img/boleta/45.jpg"),
array('id'=>"13147", 'nome'=>"GERALDO CRUZ", 'url'=>"../assets/img/boleta/46.jpg"),
array('id'=>"13112", 'nome'=>"GERSON BITTENCOURT", 'url'=>"../assets/img/boleta/47.jpg"),
array('id'=>"25558", 'nome'=>"GIL LANCASTER", 'url'=>"../assets/img/boleta/48.jpg"),
array('id'=>"13030", 'nome'=>"GUILHERME MONTANARI", 'url'=>"../assets/img/boleta/49.jpg"),
array('id'=>"13010", 'nome'=>"IARA BERNARDI", 'url'=>"../assets/img/boleta/50.jpg"),
array('id'=>"13800", 'nome'=>"IDUIGUES MARTINS", 'url'=>"../assets/img/boleta/51.jpg"),
array('id'=>"13413", 'nome'=>"ISAAC DO CARMO", 'url'=>"../assets/img/boleta/52.jpg"),
array('id'=>"13611", 'nome'=>"ISAC REIS", 'url'=>"../assets/img/boleta/53.jpg"),
array('id'=>"43777", 'nome'=>"IVANA CAMARINHA", 'url'=>"../assets/img/boleta/54.jpg"),
array('id'=>"13200", 'nome'=>"JOÃO LEITE", 'url'=>"../assets/img/boleta/55.jpg"),
array('id'=>"13622", 'nome'=>"JOÃO PAULO RILLO", 'url'=>"../assets/img/boleta/56.jpg"),
array('id'=>"13104", 'nome'=>"JOÃO PEDRO", 'url'=>"../assets/img/boleta/57.jpg"),
array('id'=>"19456", 'nome'=>"JOAQUIM ALEMÃO", 'url'=>"../assets/img/boleta/58.jpg"),
array('id'=>"19333", 'nome'=>"JHONES BONSERV", 'url'=>"../assets/img/boleta/59.jpg"),
array('id'=>"13140", 'nome'=>"JOSÉ AMÉRICO", 'url'=>"../assets/img/boleta/60.jpg"),
array('id'=>"13990", 'nome'=>"JOSE FERNANDES", 'url'=>"../assets/img/boleta/61.jpg"),
array('id'=>"13520", 'nome'=>"JOSÉ FRANSON", 'url'=>"../assets/img/boleta/62.jpg"),
array('id'=>"13331", 'nome'=>"JURACY DE ALMEIDA", 'url'=>"../assets/img/boleta/63.jpg"),
array('id'=>"13230", 'nome'=>"KITANJI", 'url'=>"../assets/img/boleta/64.jpg"),
array('id'=>"13098", 'nome'=>"LAFAIETE BIET", 'url'=>"../assets/img/boleta/65.jpg"),
array('id'=>"13615", 'nome'=>"LAURA SANTANA", 'url'=>"../assets/img/boleta/66.jpg"),
array('id'=>"13156", 'nome'=>"LUCIANO BARBOSA", 'url'=>"../assets/img/boleta/67.jpg"),
array('id'=>"13134", 'nome'=>"LUIZ FERNANDO TEIXEIRA", 'url'=>"../assets/img/boleta/68.jpg"),
array('id'=>"13690", 'nome'=>"LUIZ TURCO", 'url'=>"../assets/img/boleta/69.jpg"),
array('id'=>"13777", 'nome'=>"MARCELINHO CARIOCA", 'url'=>"../assets/img/boleta/70.jpg"),
array('id'=>"13113", 'nome'=>"MARCIA LIA", 'url'=>"../assets/img/boleta/71.jpg"),
array('id'=>"13213", 'nome'=>"MARCIO DO FLÓRIDA", 'url'=>"../assets/img/boleta/72.jpg"),
array('id'=>"13130", 'nome'=>"MARCO AURELIO", 'url'=>"../assets/img/boleta/73.jpg"),
array('id'=>"13131", 'nome'=>"MARCOS MARTINS", 'url'=>"../assets/img/boleta/74.jpg"),
array('id'=>"13444", 'nome'=>"MARIA HELENA", 'url'=>"../assets/img/boleta/75.jpg"),
array('id'=>"13555", 'nome'=>"MARIA MOURA", 'url'=>"../assets/img/boleta/76.jpg"),
array('id'=>"13623", 'nome'=>"MARQUINHO PAGLIUCO", 'url'=>"../assets/img/boleta/77.jpg"),
array('id'=>"13070", 'nome'=>"MAZINHO", 'url'=>"../assets/img/boleta/78.jpg"),
array('id'=>"13031", 'nome'=>"MISA BOITO", 'url'=>"../assets/img/boleta/79.jpg"),
array('id'=>"13900", 'nome'=>"NEY MARCÚRIO", 'url'=>"../assets/img/boleta/80.jpg"),
array('id'=>"13913", 'nome'=>"PAULO EUGENIO", 'url'=>"../assets/img/boleta/81.jpg"),
array('id'=>"13310", 'nome'=>"PAULO MALERBA", 'url'=>"../assets/img/boleta/82.jpg"),
array('id'=>"25000", 'nome'=>"Pastor CEZINHA", 'url'=>"../assets/img/boleta/83.jpg"),
array('id'=>"31222", 'nome'=>"PATO BRANCO", 'url'=>"../assets/img/boleta/84.jpg"),
array('id'=>"13333", 'nome'=>"PORTO", 'url'=>"../assets/img/boleta/85.jpg"),
array('id'=>"13002", 'nome'=>"PRI NASCIMENTO", 'url'=>"../assets/img/boleta/86.jpg"),
array('id'=>"13600", 'nome'=>"PROF AURIEL", 'url'=>"../assets/img/boleta/87.jpg"),
array('id'=>"13613", 'nome'=>"PROF. REGINALDO CHE", 'url'=>"../assets/img/boleta/88.jpg"),
array('id'=>"13500", 'nome'=>"PROF. SOLANGE", 'url'=>"../assets/img/boleta/89.jpg"),
array('id'=>"13888", 'nome'=>"PROF. VALFREDO", 'url'=>"../assets/img/boleta/90.jpg"),
array('id'=>"13789", 'nome'=>"PROFESSOR BACCHIM", 'url'=>"../assets/img/boleta/91.jpg"),
array('id'=>"13809", 'nome'=>"RAQUEL MONTERO", 'url'=>"../assets/img/boleta/92.jpg"),
array('id'=>"40699", 'nome'=>"REINALDO MOTA", 'url'=>"../assets/img/boleta/93.jpg"),
array('id'=>"13313", 'nome'=>"RENATO MORENI DO GEB", 'url'=>"../assets/img/boleta/94.jpg"),
array('id'=>"13813", 'nome'=>"RENATO SIMÕES", 'url'=>"../assets/img/boleta/95.jpg"),
array('id'=>"13400", 'nome'=>"ROBERTO FELICIO", 'url'=>"../assets/img/boleta/96.jpg"),
array('id'=>"13330", 'nome'=>"RONEI", 'url'=>"../assets/img/boleta/97.jpg"),
array('id'=>"13222", 'nome'=>"ROSE IELO", 'url'=>"../assets/img/boleta/98.jpg"),
array('id'=>"13335", 'nome'=>"SANDRA DO PT", 'url'=>"../assets/img/boleta/99.jpg"),
array('id'=>"13116", 'nome'=>"SANDRA KENNEDY", 'url'=>"../assets/img/boleta/100.jpg"),
array('id'=>"13111", 'nome'=>"STELA DALECIO", 'url'=>"../assets/img/boleta/101.jpg"),
array('id'=>"13117", 'nome'=>"SUBTEN NEZINHO 'RECO'", 'url'=>"../assets/img/boleta/102.jpg"),
array('id'=>"13004", 'nome'=>"TELMA DE SOUZA", 'url'=>"../assets/img/boleta/103.jpg"),
array('id'=>"13663", 'nome'=>"TIÃO BEZERRA", 'url'=>"../assets/img/boleta/104.jpg"),
array('id'=>"13050", 'nome'=>"TIÊ DOS TRANSPORTES", 'url'=>"../assets/img/boleta/105.jpg"),
array('id'=>"13270", 'nome'=>"TONETTI", 'url'=>"../assets/img/boleta/106.jpg"),
array('id'=>"13027", 'nome'=>"TONINHO DO PT", 'url'=>"../assets/img/boleta/107.jpg"),
array('id'=>"65678", 'nome'=>"TONIOLO", 'url'=>"../assets/img/boleta/108.jpg"),
array('id'=>"13132", 'nome'=>"VALDIR SANT'ANNA", 'url'=>"../assets/img/boleta/109.jpg"),
array('id'=>"17500", 'nome'=>"VALDOMIRO VENTURA", 'url'=>"../assets/img/boleta/110.jpg"),
array('id'=>"13713", 'nome'=>"VERA GOULART", 'url'=>"../assets/img/boleta/111.jpg"),
array('id'=>"13001", 'nome'=>"WAGNER ECKSTEIN", 'url'=>"../assets/img/boleta/112.jpg"),
array('id'=>"13671", 'nome'=>"ZÉ ANTONIO", 'url'=>"../assets/img/boleta/113.jpg"),
array('id'=>"13567", 'nome'=>"ZÉ PAULINO", 'url'=>"../assets/img/boleta/114.jpg"),
array('id'=>"13023", 'nome'=>"ZERNICE GONZAGA", 'url'=>"../assets/img/boleta/115.jpg"),
array('id'=>"13123", 'nome'=>"ZICO PRADO", 'url'=>"../assets/img/boleta/116.jpg")
);

							?>
	<div class="row">
		<article class="news-rotator col-xs-14 col-xs-offset-1 col-sm-14 col-sm-offset-1 col-md-14 col-md-offset-1">
			<div class="icon ico-apoio">Apoio</div>
			<div class="pull-right"><a href="#" class="back" onclick="back(event);">Voltar</a></div>
					<div class="row" style="margin:20px auto; display:block;"></div>
					
					<!-- Fila de candidatos -->
		
					<div class="row" style="margin:15px auto;"></div>
						<div class="row" style="margin-bottom:40px;">
						<h4 style="font-size:1.2em;text-align:center;"><strong>Digite o número do seu candidato a deputado estadual <br>e monte sua cédula eletrônica.<!--Digite aqui o número de seu candidato a Deputado Estadual.--></strong></h4>
						<div class="row" style="margin-bottom:40px;">
						<div style="margin:20px auto; text-align:center;">
							<input id="digite" type="text" placeholder="Digite aqui o número do candidato" style="width:390px;text-align:center;border: 2px solid #c52d16;">
							</br>
							
						</div>
						<div class="col-md-16" style="text-align:center;">
						<?php 
							echo "<script> var idcandidato ={};";
							echo "idcandidato.id =[];";
							echo "idcandidato.url =[];";
							// if($idcandidato):
								$n=1;
								for($i=0; $i<count($candidatos); $i++):
										echo "idcandidato.id.push(".$candidatos[$i]["id"].");";
										if ($n > 0 && $n < 10 ):
											echo "idcandidato.url.push('../assets/img/boleta/0".$n.".jpg');";
										else:
											echo "idcandidato.url.push('../assets/img/boleta/".$n.".jpg');";

										endif;
									$n++;
								endfor;
							// endif;
							echo "</script>";

						?>
						<div class="printarea" style="text-align:center;">
							<img id="boleita" style="width:50%;margin:0 auto;" class="img-responsive" src="../assets/img/boleta/boleta.jpg">
						</div>
						</div>
						<div class="row" style="margin-bottom:40px;"></div>

						<div style="margin:0 auto; text-align:center">
							<form class="form-horizontal" role="form" id="candidato" method="post">
							<input type="hidden" id="img" name="img" value="">
							<input id="e-mail" type="email" name="email" placeholder="Digite aqui o e-mail" style="width:390px;text-align:center;border: 2px solid #c52d16;">
							<button id="contato-submit" type="submit" class="btn btn-default" style="background:#c52d16; color:#fff;">Enviar</button>

							</form>
							
	
						</div>
						<div style="text-align:center;">
						
							<input id="imprimir" class="back" type="button" value="Imprimir sua cédula eletrônica" style="margin:10px auto;width:250px;background:#c52d16 !important; color:#fff; border:none !important;">

						</div>
					
					</div>

					<!-- Fin Fila de boletas -->

					
		</article>
	</div>

@stop

@section ("plugins")
	{{HTML::script("assets/js/jquery.PrintArea.js")}}

<script type="text/javascript">
	
	$("#digite").on("keyup", function(){
		console.log($(this).val());
		for (var i = 0; i < idcandidato.id.length; i++) {
			if ($(this).val()==idcandidato.id[i]) {
				$("#img").val(idcandidato.url[i]);

				$("#boleita").attr('src',idcandidato.url[i]);
				console.log("Aquuuuuuuuuuuuuui Coincide!!!!!!!!!!!!!!!!!! " + $(this).val() +" "+ idcandidato.id[i]);

				break;
			}else{
				$("#img").val("");

				$("#boleita").attr('src','../assets/img/boleta/boleta.jpg');

				console.log("No hay coincidendias " + $(this).val() +" "+ idcandidato.id[i]);
			};
		};
	})

	$("#imprimir").on("click",function(){
		$(".printarea").printArea();
	})
</script>
@stop

