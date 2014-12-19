<?php

$active="biografia";
	require("header.php");

	echo "
		<div class=\"row\" style=\"margin-top:10px; margin-bottom:20px;\">
			<div class=\"col-sm-1 col-md-1 col-xs-1\">
			</div>
			<div class=\"col-sm-10 col-md-10 col-xs-10\">
				<section class=\"formBox clearfix\">
              <article class=\"col-lg-8 col-md-8 col-sm-8 contactBox\">
                <h2>Formulário de Contato</h2>
                    <form id=\"contact-form\">
                        <div class=\"success-message\">Contact form submitted.</div>
                        <div class=\"holder\">
                            <div class=\"form-div-1 clearfix\">
                                <label class=\"name\">
                                    <input type=\"text\" data-constraints=\"@Required @JustLetters\" id=\"regula-generated-491067\" placeholder=\"Nome\">
                                    
                                <span class=\"_placeholder\" style=\"left: 0px; top: 0px; width: 214px; height: 41px;\"></span></label>
                            </div>
                            <div class=\"form-div-2 clearfix\">
                                <label class=\"email\">
                                    <input type=\"text\" data-constraints=\"@Required @Email\" id=\"regula-generated-901491\" placeholder=\"E-mail\">
                                    
                                <span class=\"_placeholder\" style=\"left: 0px; top: 0px; width: 214px; height: 41px;\"></span></label>
                            </div>
                            <div class=\"form-div-3 clearfix\">
                                <label class=\"phone notRequired\">
                                    <input type=\"text\" data-constraints=\"@JustNumbers\" id=\"regula-generated-21320\" placeholder=\"Telefone\">
                                                         <span class=\"_placeholder\" style=\"left: 0px; top: 0px; width: 214px; height: 41px;\"></span></label>
                            </div>
                        </div>
                        <div class=\"form-div-4 clearfix\">
                            <label class=\"message\">
                                <textarea data-constraints=\"@Required @Length(min=20,max=999999)\" id=\"regula-generated-280381\" placeholder=\"Mensagem\"></textarea>
                                
                            <span class=\"_placeholder\" style=\"left: 0px; top: 0px; width: 741px; height: 201px;\"></span></label>
                        </div>
                        <div class=\"btns\">
                            <a href=\"#\" data-type=\"submit\" class=\"btn-default btn1\">Enviar</a>
                        </div>  
                    </form>
              </article>
                <div class=\"clearfix\"></div>
          </section>
			</div>
		</div>";
	include ("footer.php");