@extends ('frontend.layout')

@section ("title")

Apoios

@stop
@section("page")
	<?php $i=7; ?>
@stop
@section ("content")
<style>
	.nome, .cod{
		font-weight: 900;
		font-size: 0.9em;
	}
	.cod{
		color: #c52d16;
		font-size: 1.2em;

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
							?>
	<div class="row">
		<article class="news-rotator col-xs-14 col-xs-offset-1 col-sm-14 col-sm-offset-1 col-md-14 col-md-offset-1">
			<div class="icon ico-apoio">Apoio</div>
			<div class="pull-right"><a href="#" class="back" onclick="back(event);">Voltar</a></div>
					<div class="row" style="margin:20px auto; display:block;"></div>
					
					<!-- Fila de candidatos -->

					<div class="row" style="margin:15px auto;"></div>
						<div class="row" style="margin-bottom:40px;">
						<h4 style="font-size:1.2em;text-align:center;"><strong>Selecione o Candidato para Deputado Estadual Clicando na Imagem.</strong></h4>
						<div class="row" style="margin-bottom:40px;">

						<div class="col-sm-16" style="margin-top:5px;">
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/1.jpg")}}
								</div>
								<span class="nome" style="display:block;" >Alencar Santana</span>
								<span class="cod" style="display:inline-block;">13570</span>
							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px;">
									{{HTML::image("coladigital/candidatos/2.jpg")}}
								</div>
								<span class="nome" style="display:block;">Alex da Academia</span>
								<span class="cod" style="display:inline-block;">12200</span>

							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/3.jpg")}}
								</div>
								<span class="nome" style="display:block;">Alexandre Pimentel</span>
								<span class="cod" style="display:inline-block;">13013</span>


							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/4.jpg")}}
								</div>
								<span class="nome" style="display:block;">Ana do Carmo</span>
								<span class="cod" style="display:inline-block;">13632</span>


							</div>
						</div>
					</div>

					<!-- Fin Fila de candidatos -->

					<!-- Fila de candidatos -->

					<div class="row" style="margin:15px auto;"></div>
						<div class="row" style="margin-bottom:40px;">
						<div class="col-sm-16" style="margin-top:5px;">
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/5.jpg")}}
								</div>
								<span class="nome" style="display:block;" >Angelo D'agostini</span>
								<span class="cod" style="display:inline-block;">13133</span>
							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px;">
									{{HTML::image("coladigital/candidatos/6.jpg")}}
								</div>
								<span class="nome" style="display:block;">Professor Bacchim</span>
								<span class="cod" style="display:inline-block;">13789</span>

							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/7.jpg")}}
								</div>
								<span class="nome" style="display:block;">Baltasar</span>
								<span class="cod" style="display:inline-block;">13644</span>


							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/8.jpg")}}
								</div>
								<span class="nome" style="display:block;">Batista Comunidade</span>
								<span class="cod" style="display:inline-block;">70800</span>


							</div>
						</div>
					</div>

					<!-- Fin Fila de candidatos -->
                    <!-- Fila de candidatos -->

					<div class="row" style="margin:15px auto;"></div>
						<div class="row" style="margin-bottom:40px;">
						<div class="col-sm-16" style="margin-top:5px;">
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/9.jpg")}}
								</div>
								<span class="nome" style="display:block;" >Barba</span>
								<span class="cod" style="display:inline-block;">13110</span>
							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px;">
									{{HTML::image("coladigital/candidatos/10.jpg")}}
								</div>
								<span class="nome" style="display:block;">Branco</span>
								<span class="cod" style="display:inline-block;">15036</span>

							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/11.jpg")}}
								</div>
								<span class="nome" style="display:block;">Beth Sahão</span>
								<span class="cod" style="display:inline-block;">13456</span>


							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/12.jpg")}}
								</div>
								<span class="nome" style="display:block;">Capá</span>
								<span class="cod" style="display:inline-block;">13700</span>


							</div>
						</div>
					</div>

					<!-- Fin Fila de candidatos -->
                    <!-- Fila de candidatos -->

					<div class="row" style="margin:15px auto;"></div>
						<div class="row" style="margin-bottom:40px;">
						<div class="col-sm-16" style="margin-top:5px;">
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/13.jpg")}}
								</div>
								<span class="nome" style="display:block;" >Camilo São Salomão</span>
								<span class="cod" style="display:inline-block;">19013</span>
							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px;">
									{{HTML::image("coladigital/candidatos/14.jpg")}}
								</div>
								<span class="nome" style="display:block;">Carlos Neder</span>
								<span class="cod" style="display:inline-block;">13999</span>

							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/15.jpg")}}
								</div>
								<span class="nome" style="display:block;">Eduardo Petrov</span>
								<span class="cod" style="display:inline-block;">13300</span>


							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/16.jpg")}}
								</div>
								<span class="nome" style="display:block;">Elaine Brambilla</span>
								<span class="cod" style="display:inline-block;">13137</span>


							</div>
						</div>
					</div>

					<!-- Fin Fila de candidatos -->
                    <!-- Fila de candidatos -->

					<div class="row" style="margin:15px auto;"></div>
						<div class="row" style="margin-bottom:40px;">
						<div class="col-sm-16" style="margin-top:5px;">
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/17.jpg")}}
								</div>
								<span class="nome" style="display:block;" >Enio Tatto</span>
								<span class="cod" style="display:inline-block;">13114</span>
							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px;">
									{{HTML::image("coladigital/candidatos/18.jpg")}}
								</div>
								<span class="nome" style="display:block;">Geraldo Cruz</span>
								<span class="cod" style="display:inline-block;">13147</span>

							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/19.jpg")}}
								</div>
								<span class="nome" style="display:block;">Gerson Bittencourt</span>
								<span class="cod" style="display:inline-block;">13112</span>


							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/20.jpg")}}
								</div>
								<span class="nome" style="display:block;">Guilherme Montanari</span>
								<span class="cod" style="display:inline-block;">13030</span>


							</div>
						</div>
					</div>

					<!-- Fin Fila de candidatos -->
                    <!-- Fila de candidatos -->

					<div class="row" style="margin:15px auto;"></div>
						<div class="row" style="margin-bottom:40px;">
						<div class="col-sm-16" style="margin-top:5px;">
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/21.jpg")}}
								</div>
								<span class="nome" style="display:block;" >Iara Bernardi</span>
								<span class="cod" style="display:inline-block;">13010</span>
							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px;">
									{{HTML::image("coladigital/candidatos/22.jpg")}}
								</div>
								<span class="nome" style="display:block;">Iduigues Martins</span>
								<span class="cod" style="display:inline-block;">13800</span>

							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/23.jpg")}}
								</div>
								<span class="nome" style="display:block;">Isac Reis</span>
								<span class="cod" style="display:inline-block;">13611</span>


							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/24.jpg")}}
								</div>
								<span class="nome" style="display:block;">Ivana Camarinha</span>
								<span class="cod" style="display:inline-block;">43777</span>


							</div>
						</div>
					</div>

					<!-- Fin Fila de candidatos -->
                    <!-- Fila de candidatos -->

					<div class="row" style="margin:15px auto;"></div>
						<div class="row" style="margin-bottom:40px;">
						<div class="col-sm-16" style="margin-top:5px;">
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/25.jpg")}}
								</div>
								<span class="nome" style="display:block;" >Jhones Bonserv</span>
								<span class="cod" style="display:inline-block;">19333</span>
							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px;">
									{{HTML::image("coladigital/candidatos/26.jpg")}}
								</div>
								<span class="nome" style="display:block;">João Paulo Rillo</span>
								<span class="cod" style="display:inline-block;">13622</span>

							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/27.jpg")}}
								</div>
								<span class="nome" style="display:block;">Kitanji</span>
								<span class="cod" style="display:inline-block;">13230</span>


							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/28.jpg")}}
								</div>
								<span class="nome" style="display:block;">Luiz Fernando</span>
								<span class="cod" style="display:inline-block;">13134</span>


							</div>
						</div>
					</div>

					<!-- Fin Fila de candidatos -->
                    <!-- Fila de candidatos -->

					<div class="row" style="margin:15px auto;"></div>
						<div class="row" style="margin-bottom:40px;">
						<div class="col-sm-16" style="margin-top:5px;">
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/29.jpg")}}
								</div>
								<span class="nome" style="display:block;" >Luiz Turco</span>
								<span class="cod" style="display:inline-block;">13690</span>
							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px;">
									{{HTML::image("coladigital/candidatos/30.jpg")}}
								</div>
								<span class="nome" style="display:block;">Márcio da Flórida</span>
								<span class="cod" style="display:inline-block;">13213</span>

							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/31.jpg")}}
								</div>
								<span class="nome" style="display:block;">Marco Aurélio</span>
								<span class="cod" style="display:inline-block;">13130</span>


							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/32.jpg")}}
								</div>
								<span class="nome" style="display:block;">Misa Boito</span>
								<span class="cod" style="display:inline-block;">13031</span>


							</div>
						</div>
					</div>

					<!-- Fin Fila de candidatos -->
                    <!-- Fila de candidatos -->

					<div class="row" style="margin:15px auto;"></div>
						<div class="row" style="margin-bottom:40px;">
						<div class="col-sm-16" style="margin-top:5px;">
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/33.jpg")}}
								</div>
								<span class="nome" style="display:block;" >Pato Branco</span>
								<span class="cod" style="display:inline-block;">31222</span>
							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px;">
									{{HTML::image("coladigital/candidatos/34.jpg")}}
								</div>
								<span class="nome" style="display:block;">Paulo Eugênio</span>
								<span class="cod" style="display:inline-block;">13913</span>

							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/35.jpg")}}
								</div>
								<span class="nome" style="display:block;">Porto</span>
								<span class="cod" style="display:inline-block;">13333</span>


							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/36.jpg")}}
								</div>
								<span class="nome" style="display:block;">Renato Simões</span>
								<span class="cod" style="display:inline-block;">13813</span>


							</div>
						</div>

					</div>

					<!-- Fin Fila de candidatos -->
                    <!-- Fila de candidatos -->

					<div class="row" style="margin:15px auto;"></div>
						<div class="row" style="margin-bottom:40px;">
						<div class="col-sm-16" style="margin-top:5px;">
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/37.jpg")}}
								</div>
								<span class="nome" style="display:block;" >Reinaldo Mota</span>
								<span class="cod" style="display:inline-block;">40699</span>
							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px;">
									{{HTML::image("coladigital/candidatos/38.jpg")}}
								</div>
								<span class="nome" style="display:block;">Roberto Felício</span>
								<span class="cod" style="display:inline-block;">13400</span>

							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/39.jpg")}}
								</div>
								<span class="nome" style="display:block;">Tião Bezerra</span>
								<span class="cod" style="display:inline-block;">13663</span>


							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/40.jpg")}}
								</div>
								<span class="nome" style="display:block;">Tonetti</span>
								<span class="cod" style="display:inline-block;">13270</span>


							</div>
						</div>
					</div>

					<!-- Fin Fila de candidatos -->
                    <!-- Fila de candidatos -->

					<div class="row" style="margin:15px auto;"></div>
						<div class="row" style="margin-bottom:40px;">
						<div class="col-sm-16" style="margin-top:5px;">
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/41.jpg")}}
								</div>
								<span class="nome" style="display:block;" >Toninho do PT</span>
								<span class="cod" style="display:inline-block;">13027</span>
							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px;">
									{{HTML::image("coladigital/candidatos/42.jpg")}}
								</div>
								<span class="nome" style="display:block;">Toniolo</span>
								<span class="cod" style="display:inline-block;">65678</span>

							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/43.jpg")}}
								</div>
								<span class="nome" style="display:block;">Valdir Santanna</span>
								<span class="cod" style="display:inline-block;">13132</span>


							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/44.jpg")}}
								</div>
								<span class="nome" style="display:block;">Valdomiro Ventura</span>
								<span class="cod" style="display:inline-block;">17500</span>


							</div>
						</div>
					</div>

					<!-- Fin Fila de candidatos -->
                    <!-- Fila de candidatos -->

					<div class="row" style="margin:15px auto;"></div>
						<div class="row" style="margin-bottom:40px;">
						<div class="col-sm-16" style="margin-top:5px;">
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/45.jpg")}}
								</div>
								<span class="nome" style="display:block;" >Valfredo</span>
								<span class="cod" style="display:inline-block;">13888</span>
							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px;">
									{{HTML::image("coladigital/candidatos/46.jpg")}}
								</div>
								<span class="nome" style="display:block;">Wagner Eckstein</span>
								<span class="cod" style="display:inline-block;">13001</span>

							</div>
							<div class="candidato" style="display:inline-block;width:150px;margin-left:35px;text-align:center;">
								<div class="news-image" style="overflow:hidden;display:inline-block;width:150px !important; height:150px; ">
									{{HTML::image("coladigital/candidatos/47.jpg")}}
								</div>
								<span class="nome" style="display:block;">Zico Prado</span>
								<span class="cod" style="display:inline-block;">13123</span>


							</div>
							
						</div>
					</div>

					<!-- Fin Fila de candidatos -->
					
		<div class="php">
			
		</div>
					
		</article>
	</div>

@stop

@section ("plugins")

@stop