@extends ('frontend.layout')

@section ("title")

Participe

@stop

@section("page")
	<style type="text/css">
		input[type="text"],input[type="email"]{
			height: 42px;
			padding: 6px 12px;
			width: 100%;
			border-radius: 4px;
			border: 1px solid #ccc;

		}
		.loading{
			background: rgba(255,255,255,0.9);
			display: block;
			position: absolute;
			width: 100%;
			height: 100%;
			top:0;
			left: 0;
			z-index: 99;

		}
		.loading img{
			margin: 160px 0 0 44%;
		}
		#response{
			position: absolute;
			text-align: center;
			background-color: #5cb85c;
			border-color: #4cae4c;
			height: 32px;
			bottom: 0;
			margin-left: 1.7%;
			color: white;
			width:91%;
			display: none;
			padding-top: 5px;
		}
		@media (min-width: 768px){
		.col-sm-15 {
			width: 97.75%;
		}
	}
		select.form-control{
			/*border-radius: 0 !important;*/
			height: 42px !important;
		}
		/*textarea.form-control, .btn{
			border-radius: 0 !important;
		}*/
		.btn{
			width: 100% !important;
		}
	</style>
@stop

@section ("content")

	<div class="row">
		<article class="news-rotator col-xs-14 col-xs-offset-1 col-sm-14 col-sm-offset-1 col-md-14 col-md-offset-1">
			<div class="icon ico-participe" style="font-size:0.8em !important">Participe</div>
			<div class="pull-right"><a href="#" class="back" onclick="back(event);">Voltar</a></div>
					<div class="row" style="margin:20px auto; display:block;"></div>
					<div class="row" style="margin:15px auto;"></div>
				<div id="loading" class="loading">{{HTML::image("assets/img/loader.gif","")}}</div>
				
				<div class="col-sm-15">
					<p>Valmir Prascidelli quer levar sua voz e opinião para o Congresso Nacional. Deixe aqui suas sugestões e propostas. </p><br>
					<p>Com sua participação vamos construir um Brasil cada vez melhor!</p>
					<p style="margin-left:1%;margin-right:-5px;">&nbsp;</p>
				</div>
				<br><br>

				<form class="form-horizontal" role="form" id="participe">

					<div class="form-group col-sm-5" style="margin-right:3%;margin-left:1%;">
						<input id="nome" name="nome" type="text" placeholder="Seu Nome" required>
					</div>
					<div class="form-group col-sm-5" style="margin-right:3%;">
						<input id="mail" name="mail" type="email" placeholder="Seu Email" required>
					</div>
					<div class="form-group col-sm-5" >
						<input id="telefone" name="telefone" type="text" placeholder="Seu Telefone" required>
					</div>
					<div class="form-group col-sm-15" style="margin-left:1%;">
						<select id="tema" name="tema" class="form-control" required>
						<option value="O TEMA QUE SUA IDEIA MAIS SE ENCAIXA" selected>O TEMA QUE SUA IDEIA MAIS SE ENCAIXA</option>
						<option value="SAÚDE" >SAÚDE</option>
						<option value="SEGURANÇA" >SEGURANÇA</option>
						<option value="MORADIA" >MORADIA</option>
						<option value="TRANSPORTE" >TRANSPORTE</option>
						<option value="MOBILIDADE URBANA" >MOBILIDADE URBANA</option>
						<option value="EDUCAÇÃO">EDUCAÇÃO</option>
						<option value="REFORMA POLITICA">REFORMA POLITICA</option>
						<option value="OUTROS">OUTROS</option>
						
						</select>
					</div>
					<div class="form-group col-sm-15" style="margin-left:1%;">
						<textarea id="mensagem" name="mensagem" class="form-control" rows="10" placeholder="SUA PROPOSTA" required></textarea>
					</div>
					<div class="form-group col-sm-15" style="margin-left:1%;">
						<button type="submit" class="btn btn-default">Prosseguir</button>
					</div>
				</form>
				<div id="response">
            </div>
		</article>
	</div>

@stop

@section ("plugins")

@stop