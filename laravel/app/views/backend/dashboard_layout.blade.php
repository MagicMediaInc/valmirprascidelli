<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js sidebar-large lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js sidebar-large lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js sidebar-large lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js sidebar-large"> <!--<![endif]-->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <!-- BEGIN META SECTION -->
    <meta charset="utf-8">
    <title>Painel de Admin - @yield("title")</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="description" />
    <meta content="themes-lab" name="author" />
    <!-- END META SECTION -->
    <!-- BEGIN MANDATORY STYLE -->

    {{HTML::style("assets/admin/assets/css/icons/icons.min.css",array("media"=>"screen"))}}
    {{HTML::style("assets/admin/assets/css/bootstrap.min.css",array("media"=>"screen"))}}
    {{HTML::style("assets/admin/assets/css/plugins.min.css",array("media"=>"screen"))}}
    {{HTML::style("assets/admin/assets/css/style.min.css",array("media"=>"screen"))}}
    {{HTML::style("assets/admin/assets/plugins/fullcalendar/fullcalendar.css",array("media"=>"screen"))}}
    {{HTML::style("assets/admin/assets/plugins/summernote/summernote.css",array("media"=>"screen"))}}
    {{HTML::style("assets/admin/assets/plugins/metrojs/metrojs.css",array("media"=>"screen"))}}
    {{HTML::style("assets/admin/assets/plugins/datetimepicker/jquery.datetimepicker.css",array("media"=>"screen"))}}
    {{HTML::style("assets/admin/assets/plugins/pickadate/themes/default.css",array("media"=>"screen"))}}
    {{HTML::style("assets/admin/assets/plugins/pickadate/themes/default.date.css",array("media"=>"screen"))}}
    {{HTML::style("assets/admin/assets/plugins/pickadate/themes/default.time.css",array("media"=>"screen"))}}
    {{HTML::style("assets/admin/assets/plugins/dropzone/dropzone.css",array("media"=>"screen"))}}
    {{HTML::style("assets/admin/assets/plugins/jquery-file-upload/css/jquery.fileupload.css",array("media"=>"screen"))}}
    {{HTML::style("assets/admin/assets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css",array("media"=>"screen"))}}
    {{HTML::script("assets/admin/assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js")}}

</head>

<body data-page="dashboard">
    <!-- BEGIN TOP MENU -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#sidebar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a id="menu-medium" class="sidebar-toggle tooltips">
                    <i class="fa fa-outdent"></i>
                </a>
                <a class="navbar-brand" href="index.html">
                    {{HTML::image("assets/admin/assets/img/logo.png","",array("alt"=>"logo","width"=>"79","height"=>"26"))}}
                </a>
            </div>
            <div class="navbar-center">@yield("title")</div>
            <div class="navbar-collapse collapse">
                <!-- BEGIN TOP NAVIGATION MENU -->
                <ul class="nav navbar-nav pull-right header-menu">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                   <!--  <li class="dropdown" id="notifications-header">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="glyph-icon flaticon-notifications"></i>
                            <span class="badge badge-danger badge-header">6</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header clearfix">
                                <p class="pull-left">Notifications</p>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list withScroll" data-height="220">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-star p-r-10 f-18 c-orange"></i>
                                            Steve have rated your photo
                                            <span class="dropdown-time">Just now</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-heart p-r-10 f-18 c-red"></i>
                                            John added you to his favs
                                            <span class="dropdown-time">15 mins</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-file-text p-r-10 f-18"></i>
                                            New document available
                                            <span class="dropdown-time">22 mins</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-picture-o p-r-10 f-18 c-blue"></i>
                                            New picture added
                                            <span class="dropdown-time">40 mins</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-bell p-r-10 f-18 c-orange"></i>
                                            Meeting in 1 hour
                                            <span class="dropdown-time">1 hour</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-bell p-r-10 f-18"></i>
                                            Server 5 overloaded
                                            <span class="dropdown-time">2 hours</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-comment p-r-10 f-18 c-gray"></i>
                                            Bill comment your post
                                            <span class="dropdown-time">3 hours</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-picture-o p-r-10 f-18 c-blue"></i>
                                            New picture added
                                            <span class="dropdown-time">2 days</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-footer clearfix">
                                <a href="#" class="pull-left">See all notifications</a>
                                <a href="#" class="pull-right">
                                    <i class="fa fa-cog"></i>
                                </a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- END NOTIFICATION DROPDOWN -->
                    <!-- BEGIN MESSAGES DROPDOWN -->
                    <!-- <li class="dropdown" id="messages-header">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="glyph-icon flaticon-email"></i>
                            <span class="badge badge-primary badge-header">
                             8
                        </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header clearfix">
                                <p class="pull-left">
                                    Messages
                                </p>
                            </li>
                            <li class="dropdown-body">
                                <ul class="dropdown-menu-list withScroll" data-height="220">
                                    <li class="clearfix">
                                        <span class="pull-left p-r-5">
                                            <img src="assets/admin/assets/img/avatars/avatar3.png" alt="avatar 3">
                                        </span>
                                        <div class="clearfix">
                                            <div>
                                                <strong>Alexa Johnson</strong> 
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time p-r-5"></span>12 mins ago
                                                </small>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <span class="pull-left p-r-5">
                                            <img src="assets/admin/assets/img/avatars/avatar4.png" alt="avatar 4">
                                        </span>
                                        <div class="clearfix">
                                            <div>
                                                <strong>John Smith</strong> 
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time p-r-5"></span>47 mins ago
                                                </small>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <span class="pull-left p-r-5">
                                            <img src="assets/admin/assets/img/avatars/avatar5.png" alt="avatar 5">
                                        </span>
                                        <div class="clearfix">
                                            <div>
                                                <strong>Bobby Brown</strong>  
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time p-r-5"></span>1 hour ago
                                                </small>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <span class="pull-left p-r-5">
                                            <img src="assets/admin/assets/img/avatars/avatar6.png" alt="avatar 6">
                                        </span>
                                        <div class="clearfix">
                                            <div>
                                                <strong>James Miller</strong> 
                                                <small class="pull-right text-muted">
                                                    <span class="glyphicon glyphicon-time p-r-5"></span>2 days ago
                                                </small>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-footer clearfix">
                                <a href="mailbox.html" class="pull-left">See all messages</a>
                                <a href="#" class="pull-right">
                                    <i class="fa fa-cog"></i>
                                </a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- END MESSAGES DROPDOWN -->
                    <!-- BEGIN USER DROPDOWN -->
                   <!--  <li class="dropdown" id="user-header">
                        <a href="#" class="dropdown-toggle c-white" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            {{HTML::image("assets/admin/assets/img/avatars/avatar2.png","",array("alt"=>"user avatar","width"=>"30","class"=>"p-r-5"))}}
                            <span class="username">{{ Auth::user()->login }}</span>
                            <i class="fa fa-angle-down p-r-10"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="extra_profile.html">
                                    <i class="glyph-icon flaticon-account"></i> My Profile
                                </a>
                            </li>
                            <li>
                                <a href="calendar.html">
                                    <i class="glyph-icon flaticon-calendar"></i> My Calendar
                                </a>
                            </li>
                            <li>
                                <a href="calendar.html">
                                    <i class="glyph-icon flaticon-settings21"></i> Account Settings
                                </a>
                            </li>
                            <li class="dropdown-footer clearfix">
							<a href="javascript:;" class="toggle_fullscreen" title="Fullscreen">
								<i class="glyph-icon flaticon-fullscreen3"></i>
							</a>
							<a href="lockscreen.html" title="Lock Screen">
								<i class="glyph-icon flaticon-padlock23"></i>
							</a>
							{{ HTML::link('dashboard/logout','',array("class"=>"fa fa-power-off")) }}
							
						</li>
                        </ul>
                    </li> -->
                    <!-- END USER DROPDOWN -->
                    <!-- BEGIN CHAT HEADER -->
                    <!-- <li id="chat-header">
                        <a href="#" class="c-white" id="chat-toggle">
                            <i class="glyph-icon flaticon-speech76 f-24"></i>
                            <span id="chat-notification" class="notification notification-danger hide" data-delay="2000"></span>
                        </a>
                        <div id="chat-popup" class="chat-popup hide" data-delay="2000">
                            <div class="arrow-up"></div>
                            <div class="chat-popup-inner bg-blue">
                                <div>
                                    <div class="clearfix w-600">
                                        <img src="assets/admin/assets/img/avatars/avatar3.png" alt="avatar 3" width="30" class="pull-left img-circle p-r-5">Alexa Johnson</div>
                                    <div class="message m-t-5">Hey you there?</div>
                                </div>
                            </div>
                        </div>
                    </li> -->
                    <!-- END CHAT HEADER -->
                </ul>
                <!-- END TOP NAVIGATION MENU -->
            </div>
        </div>
    </nav>
    <!-- END TOP MENU -->
    <!-- BEGIN WRAPPER -->
    <div id="wrapper">
        <!-- BEGIN MAIN SIDEBAR -->
        <nav id="sidebar">
            <div id="main-menu">
                <ul class="sidebar-nav">
                    <li>
                    	{{HTML::link("/dashboard/pages","  Paginas",array("class"=>"glyph-icon flaticon-pages sidebar-text"))}}
                    </li>

                    <li>
                        {{HTML::link("/dashboard/noticias","  Noticias",array("class"=>"fa fa-pencil-square-o sidebar-text"))}}
                    </li>
                    <li>
                        {{HTML::link("/dashboard/campanhas","  Campanhas",array("class"=>"fa fa-pencil-square-o sidebar-text"))}}
                    </li>
                    <li>
                        {{HTML::link("/dashboard/biografia","  Biografia",array("class"=>"fa fa-pencil-square-o sidebar-text"))}}
                    </li>
                    <li>
                        {{HTML::link("/dashboard/participe","  Participe",array("class"=>"fa fa-pencil-square-o sidebar-text"))}}
                    </li>
                    <li>
                        {{HTML::link("/dashboard/propostas","  Propostas",array("class"=>"fa fa-pencil-square-o sidebar-text"))}}
                    </li>
                    <li>
                        {{HTML::link("/dashboard/artigos","  Artigos",array("class"=>"fa fa-pencil-square-o sidebar-text"))}}
                    </li>
                    <li>
                        {{HTML::link("/dashboard/apoios","  Apoios",array("class"=>"fa fa-pencil-square-o sidebar-text"))}}
                    </li>
                    <li>
                        {{HTML::link("/dashboard/videos","  Vídeos",array("class"=>"fa fa-video-camera sidebar-text"))}}
                    </li>
                    <li>
                        {{HTML::link("/dashboard/albums","  Galerias",array("class"=>"fa fa-film sidebar-text"))}}
                    </li>
                    <li>
                        {{HTML::link("/dashboard/newsletter","  Newsletters",array("class"=>"fa fa-film sidebar-text"))}}
                    </li>
                    <li>
                        {{HTML::link("/dashboard/uploads","  Uploads",array("class"=>"fa fa-pencil sidebar-text"))}}
                    </li>
                </ul>
            </div>
            <div class="footer-widget">
                {{HTML::image("assets/admin/assets/img/gradient.png","",array("alt"=>"gradient effet","class"=>"sidebar-gradient-img"))}}
                <div class="sidebar-footer clearfix">
                    {{ HTML::link('dashboard/logout','',array("class"=>"fa fa-power-off pull-left")) }}
                </div> 
            </div>
        </nav>
        <!-- END MAIN SIDEBAR -->


        <!-- BEGIN MAIN CONTENT -->
        @yield("maincontent")
        <!-- END MAIN CONTENT -->

    </div>
    <!-- END WRAPPER -->
    <!-- BEGIN CHAT MENU -->
   <!--  <nav id="menu-right">
        <ul>
            <li class="mm-label label-big">ONLINE</li>
            <li class="img no-arrow have-message">
                <span>
                    <i class="online"></i>
                    <img src="assets/admin/assets/img/avatars/avatar3.png"/>
                    <div class="chat-name">Alexa Johnson</div>
                    <div class="pull-right badge badge-danger hide">3</div>
                    <div >Los Angeles</div>
                </span>
                <ul class="chat-messages">
                    <li class="img"><span><div class="chat-detail"><img src="assets/admin/assets/img/avatars/avatar3.png"/><div class="chat-bubble">Hi you!</div></div></span>
                    </li>
                    <li class="img"><span><div class="chat-detail"><img src="assets/admin/assets/img/avatars/avatar3.png"/><div class="chat-bubble">You there?</div></div></span>
                    </li>
                    <li class="img"><span><div class="chat-detail"><img src="assets/admin/assets/img/avatars/avatar3.png"/><div class="chat-bubble">Let me know when you come back</div></div></span>
                    </li>
                    <div class="chat-input">
                        <input type="text" class="form-control send-message" placeholder="Type your message" />
                    </div>
                </ul>
            </li>
            <li class="img no-arrow">
                <span>
                    <i class="online"></i>
                    <img src="assets/admin/assets/img/avatars/avatar2.png" alt="avatar 2"/>
                    <div class="chat-name">Bobby Brown</div>
                    <div>New York</div>
                </span>
                <ul class="chat-messages">
                    <div class="chat-input">
                        <input type="text" class="form-control send-message" placeholder="Type your message" />
                    </div>
                </ul>
            </li>
            <li class="img no-arrow">
                <span>
                    <i class="busy"></i>
                    <img src="assets/admin/assets/img/avatars/avatar13.png" alt="avatar 13"/>
                    <div class="chat-name">Fred Smith</div>
                    <div>Atlanta</div>
                </span>
                <ul class="chat-messages">
                    <div class="chat-input">
                        <input type="text" class="form-control send-message" placeholder="Type your message" />
                    </div>
                </ul>
            </li>
            <li class="img no-arrow">
                <span>
                    <i class="away"></i>
                    <img src="assets/admin/assets/img/avatars/avatar4.png" alt="avatar 4"/>
                    <div class="chat-name">James Miller</div>
                    <div>Seattle</div>
                </span>
                <ul class="chat-messages">
                    <div class="chat-input">
                        <input type="text" class="form-control send-message" placeholder="Type your message" />
                    </div>
                </ul>
            </li>
            <li class="img no-arrow">
                <span>
                    <i class="online"></i>
                    <img src="assets/admin/assets/img/avatars/avatar5.png" alt="avatar 5"/>
                    <div class="chat-name">Jefferson Jackson</div>
                    <div>Los Angeles</div>
                </span>
                <ul class="chat-messages">
                    <div class="chat-input">
                        <input type="text" class="form-control send-message" placeholder="Type your message" />
                    </div>
                </ul>
            </li>
            <li class="mm-label label-big m-t-30">OFFLINE</li>

            <li class="img no-arrow">
                <span>
                    <i class="offline"></i>
                    <img src="assets/admin/assets/img/avatars/avatar6.png" alt="avatar 6"/>
                    <div class="chat-name">Jordan</div>
                    <div>Savannah</div>
                </span>
                <ul class="chat-messages">
                    <div class="chat-input">
                        <input type="text" class="form-control send-message" placeholder="Type your message" />
                    </div>
                </ul>
            </li>
            <li class="img no-arrow">
                <span>
                    <i class="offline"></i>
                    <img src="assets/admin/assets/img/avatars/avatar7.png" alt="avatar 7"/>
                    <div class="chat-name">Kim Addams</div>
                    <div>Birmingham</div>
                </span>
                <ul class="chat-messages">
                    <div class="chat-input">
                        <input type="text" class="form-control send-message" placeholder="Type your message" />
                    </div>
                </ul>
            </li>
            <li class="img no-arrow">
                <span>
                    <i class="offline"></i>
                    <img src="assets/admin/assets/img/avatars/avatar8.png" alt="avatar 8"/>
                    <div class="chat-name">Meagan Miller</div>
                    <div>San Francisco</div>
                </span>
                <ul class="chat-messages">
                    <div class="chat-input">
                        <input type="text" class="form-control send-message" placeholder="Type your message" />
                    </div>
                </ul>
            </li>
            <li class="img no-arrow">
                <span>
                        <i class="offline"></i>
                        <img src="assets/admin/assets/img/avatars/avatar9.png" alt="avatar 9"/>
                        <div class="chat-name">Melissa Johnson</div>
                        <div>Austin</div>
                    </span>
                <ul class="chat-messages">
                    <div class="chat-input">
                        <input type="text" class="form-control send-message" placeholder="Type your message" />
                    </div>
                </ul>
            </li>
            <li class="img no-arrow">
                <span>
                    <i class="offline"></i>
                    <img src="assets/admin/assets/img/avatars/avatar12.png" alt="avatar 12"/>
                    <div class="chat-name">Nicole Smith</div>
                    <div>San Diego</div>
                </span>
                <ul class="chat-messages">
                    <div class="chat-input">
                        <input type="text" class="form-control send-message" placeholder="Type your message" />
                    </div>
                </ul>
            </li>
            <li class="img no-arrow">
                <span>
                    <i class="offline"></i>
                    <img src="assets/admin/assets/img/avatars/avatar11.png" alt="avatar 11"/>
                    <div class="chat-name">Samantha Harris</div>
                    <div>Salt Lake City</div>
                </span>
                <ul class="chat-messages">
                    <div class="chat-input">
                        <input type="text" class="form-control send-message" placeholder="Type your message" />
                    </div>
                </ul>
            </li>
            <li class="img no-arrow">
                <span>
                    <i class="offline"></i>
                    <img src="assets/admin/assets/img/avatars/avatar10.png" alt="avatar 10"/>
                    <div class="chat-name">Scott Thomson</div>
                    <div>Los Angeles</div>
                </span>
                <ul class="chat-messages">
                    <div class="chat-input">
                        <input type="text" class="form-control send-message" placeholder="Type your message" />
                    </div>
                </ul>
            </li>
        </ul>
    </nav> -->
    <!-- END CHAT MENU -->
    <!-- BEGIN MANDATORY SCRIPTS -->

    
   	{{HTML::script("assets/admin/assets/plugins/jquery-1.11.js")}}
   	{{HTML::script("assets/admin/assets/plugins/jquery-migrate-1.2.1.js")}}
   	{{HTML::script("assets/admin/assets/plugins/jquery-ui/jquery-ui-1.10.4.min.js")}}
   	{{HTML::script("assets/admin/assets/plugins/bootstrap/bootstrap.min.js")}}
   	{{HTML::script("assets/admin/assets/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js")}}
   	{{HTML::script("assets/admin/assets/plugins/bootstrap-select/bootstrap-select.js")}}
   	{{HTML::script("assets/admin/assets/plugins/icheck/icheck.js")}}
   	{{HTML::script("assets/admin/assets/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js")}}
   	{{HTML::script("assets/admin/assets/plugins/mmenu/js/jquery.mmenu.min.all.js")}}
   	{{HTML::script("assets/admin/assets/plugins/nprogress/nprogress.js")}}
   	{{HTML::script("assets/admin/assets/plugins/charts-sparkline/sparkline.min.js")}}
   	{{HTML::script("assets/admin/assets/plugins/breakpoints/breakpoints.js")}}
   	{{HTML::script("assets/admin/assets/plugins/numerator/jquery-numerator.js")}}
    <!-- END MANDATORY SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
   	@yield("plugins")
    <!-- END  PAGE LEVEL SCRIPTS -->
   	{{HTML::script("assets/admin/assets/js/application.js")}}
</body>

</html>