<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js sidebar-large lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js sidebar-large lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js sidebar-large lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js sidebar-large"> <!--<![endif]-->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <!-- BEGIN META SECTION -->
    <meta charset="utf-8">
    <title>Painel de Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="description" />
    <meta content="themes-lab" name="author" />
    <!-- END META SECTION -->
    <!-- BEGIN MANDATORY STYLE -->
    {{HTML::style("assets/admin/assets/css/icons/icons.min.css",array("media"=>"screen"))}}
    {{HTML::style("assets/admin/assets/css/bootstrap.min.css",array("media"=>"screen"))}}
    {{HTML::style("assets/admin/assets/css/plugins.min.css",array("media"=>"screen"))}}
    {{HTML::style("assets/admin/assets/css/style.min.css",array("media"=>"screen"))}}
    {{HTML::style("assets/admin/assets/css/animate-custom.css",array("media"=>"screen"))}}
    {{HTML::script("assets/admin/assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js")}}

    <!-- END  MANDATORY STYLE -->
    <!-- BEGIN PAGE LEVEL STYLE -->
    <!-- END PAGE LEVEL STYLE -->
</head>

<body class="login fade-in" data-page="login">
    <!-- BEGIN LOGIN BOX -->
    <div class="container" id="login-block">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
                <div class="login-box clearfix animated flipInY">
                    <div class="page-icon animated bounceInDown">
                        
                       <!-- <img src="assets/img/account/user-icon.png" alt="Key icon"> -->
                    
                    </div>
                    <div class="login-logo">
                        <a href="#?login-theme-3">
                            <h3 style="color:#fff;">Painel Administrativo</h3><!-- <img src="assets/img/account/login-logo.png" alt="Company Logo"> -->
                        </a>
                    </div>
                    <hr>
                    <div class="login-form">
                        <!-- BEGIN ERROR BOX -->
                        @if(isset($err))
                            <div class="alert alert-danger show">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <p>{{$err}}</p>
                            </div>
                        @endif
                        
                        <!-- END ERROR BOX -->
						
						{{ Form::open() }}

						{{ Form::text('login', Input::old('login'),array("placeholder"=>"Usuário","class"=>"input-field form-control user")) }} 

						{{ Form::password('password',array("placeholder"=>"Senha","class"=>"input-field form-control password")) }}
								
						{{ Form::button('Login',array("type"=>"submit","class"=>"btn btn-login")) }}

						
						{{ Form::close() }}
                        <!-- <div class="login-links">
                            <a href="password_forgot.html">Forgot password?</a>
                            <br>
                            <a href="signup.html">Don't have an account? <strong>Sign Up</strong></a>
                        </div> -->
                    </div>
                </div>
                <!-- <div class="social-login row">
                    <div class="fb-login col-lg-6 col-md-12 animated flipInX">
                        <a href="#" class="btn btn-facebook btn-block">Connect with <strong>Facebook</strong></a>
                    </div>
                    <div class="twit-login col-lg-6 col-md-12 animated flipInX">
                        <a href="#" class="btn btn-twitter btn-block">Connect with <strong>Twitter</strong></a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- END LOCKSCREEN BOX -->
    <!-- BEGIN MANDATORY SCRIPTS -->
    {{HTML::script("assets/admin/assets/plugins/jquery-1.11.js")}}
    {{HTML::script("assets/admin/assets/plugins/jquery-migrate-1.2.1.js")}}
    {{HTML::script("assets/admin/assets/plugins/jquery-ui/jquery-ui-1.10.4.min.js")}}
    {{HTML::script("assets/admin/assets/plugins/bootstrap/bootstrap.min.js")}}
    {{HTML::script("assets/admin/assets/plugins/backstretch/backstretch.min.js")}}
    {{HTML::script("assets/admin/assets/js/account.js")}}
    <!-- END MANDATORY SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <!-- END PAGE LEVEL SCRIPTS -->
</body>

</html>