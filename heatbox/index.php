<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Startseite | HeatBox</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sl-slide.css">

    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>

<body>
    <!--Header-->
    <header class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a id="logo" class="pull-left" href="index.html"></a>
                <div class="nav-collapse collapse pull-right">
                    <ul class="nav">
                        <li class="active"><a href="index.html">Startseite</a></li>
                        <li><a href="hb_allgemein.html">Allgemeines</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">HeatBox <i class="icon-angle-down"></i></a>
                            <ul class="dropdown-menu">
                            	<li class="nav-header"><a href="hb.html">HeatBox</a></li>
                                <li><a href="hb_tec.html">Technische Daten</a></li>
                                <li><a href="hb_anl.html">Anleitungen</a></li>
                                <li class="divider"></li>
 								<li class="nav-header"><a href="hb_comp.html">HeatBox Compact</a></li>
                                <li><a href="hb_comp_tec.html">Technische Daten</a></li>
                                <li><a href="hb_comp_anl.html">Anleitungen</a></li>
                                <li class="divider"></li>
                                <li class="nav-header"><a href="hb_eco.html">HeatBox Eco</a></li>
                                <li><a href="hb_eco_tec.html">Technische Daten</a></li>
                                <li><a href="hb_eco_anl.html">Anleitungen</a></li> 
                                <li class="divider"></li>                                
                                <li><a href="hb_dl.html">Downloads</a></li>
                                <li><a href="testberichte.html">Testberichte</a></li>  
                                <li><a href="faq.html">FAQ</a></li>  
                                <li><a href="spende.html">Spende</a></li>                        
                            </ul>
                        </li>
 
                        <li><a href="kontakt.html">Kontakt</a></li>
                        <li><a href="impressum.html">Impressum</a></li>
                        <?php
						include 'loginstatus.php';
						?>
                    </ul>        
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </header>
    <!-- /header -->

	<div class="jumbotron" style="background-color:white;"> <!-- #232323-->
		<div class="container image-center heatboxlogo" align="center">
			<img src="images/HeatBox-Logo.png" class="img-responsive" alt="header-logo">
			<div class="overlay">
			</div>
		</div>
	</div>

	<section class="main-info">
		<div class="container">
			<div class="row-fluid">
				<div class="center">
					<h1>Willkommen bei HaDi-RC Wiki !</h1>
					<p>Wir wollen Ihnen hier gebündelt eingestellte Informationen zu unseren aktuellen Elektronik-Projekten geben, inklusive der aktuellen Updates bei Firmware-Änderungen.</p>
					<p>Diese Seite ist rein informell und beinhaltet den jeweils aktuellen Status / Firmware-Revision.</p>
					<p>HaDi-RC Wiki ist eine rein informelle Plattform ohne Diskussionsmöglichkeit. Im Fall von Supportanfragen wenden Sie sich bitte per Email direkt an uns.</p>
			   </div>
			</div>
		</div>
	</section>

	<section id="recent-works">
		<div class="container">
			<div class="center">
				<h2>Die HeatBox</h2>
				<p class="lead">Hier sind ein paar Bilder der HeatBox:</p>
			</div>  
			<div class="gap"></div>
			<ul class="gallery col-4">
				<!--Item 1-->
				<li>
					<div class="preview">
						<br>
						<br>
						<img alt=" " src="images/hb_eco_2.png">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<br><br>
						<h5>HeatBox Eco</h5>
					</div>                
				</li>
				<!--/Item 1--> 

				<!--Item 2-->
				<li>
					<div class="preview">
						<img alt=" " src="images/hb-c24.jpg">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<h5>HeatBox Compact</h5>
					</div>               
				</li>
				<!--/Item 2-->

				<!--Item 3-->
				<li>
					<div class="preview">
						<img alt=" " src="images/hbv1_black-1.jpg">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<h5>HeatBox</h5>
					</div>                 
				</li>
				<!--/Item 3--> 

				<!--Item 4-->
				<li>
					<div class="preview">
						<img alt=" " src="images/v120black.jpg">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<h5>HeatBox V1.2</h5>
					</div>
									
				</li>
				<!--/Item 4-->               
			</ul>
		</div>
	</section>

	<!--Bottom-->
	<section id="bottom" class="main">
		<!--Container-->
		<div class="container">
			<!--row-fluids-->
			<div class="row-fluid">
				<!--Contact Form-->
				<div class="span3">
					<h4>ADDRESSE</h4>
					<ul class="unstyled address">
						<li>
							<i class="icon-home"></i>
							<strong>Strasse:</strong><br />
							Huettenstrasse 13
						</li>
						<li>
							<i class="icon-compass"></i>
							<strong>PLZ/Ort:</strong><br />
							35708 Haiger
						</li>
						<li>
							<i class="icon-flag-alt"></i>
							<strong>Land:</strong><br />
							Deutschland
					   </li>
					</ul>
				</div>
				<!--End Contact Form-->

				<!--Ansrpechpartner-->
				<div class="span3">
					<h4>ANSPRECHPARTNER</h4>
					<div>
						<ul class="unstyled address">
							<li>
								<i class="icon-male"></i>
								Christian Domes</li>
							<li>
								<i class="icon-globe"></i>
								<strong>Website:</strong> <a href="http://www.HaDi-RC.de">HaDi-RC.de</a>
							</li>
							<li>
								<i class="icon-envelope"></i>
								<strong>Email: </strong> Info@HaDi-RC.de
							</li>
							<li>
								<i class="icon-phone"></i>
								<strong>Telefon:</strong> +49 2773 912030
							</li>
							<li>
								<i class="icon-print"></i>
								<strong>Fax:</strong> +49 02773 912031
							</li>
						</ul>
					</div>  
				</div>
				
				<!--Important Links-->
				<!--Informationen-->
				<div class="span3">
					<h4>INFORMATIONEN</h4>
					<div>
						<ul class="unstyled address">
							<li>
								<i class="icon"><img src="images/ico/impr.png" style="height:14px" /></i>
								<a href="impressum.html">Impressum</a>
							</li>
							<li>
								<i class="icon-user"></i>
								<a href="kontakt.html">Kontakt</a>
							</li>
							<li>
								<i class="icon-shopping-cart"></i>
								<a href="http://www.hadi-rc.de" target="_blank">Shopseite</a>
							</li>
							<li>
								<i class="icon-facebook"></i>
								<a href="https://www.facebook.com/HaDiRC/" target="_blank">Facebook</a>
							</li>
							<li>
								<i class="icon-google-plus"></i>
								<a href="https://plus.google.com/117160856069921192058" target="_blank">Google</a>
							</li>
						</ul>
					</div>
				</div>
				<!--End Archives-->

				<div class="span3">
					<h4>SPENDEN</h4>
					<div>
						<ul class="unstyled address">
							<li>
								<i class="icon-euro"></i>
								<a href="spende.html">HeatBox</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!--/row-fluid-->
		</div>
		<!--/container-->
	</section>
	<!--/bottom-->

	<!--Footer-->
	<footer id="footer">
		<div class="container">
			<div class="row-fluid">
				<div class="span5 cp">
					&copy; 2017 HaDi-RC. All Rights Reserved.
				</div>
				<!--/Copyright-->

				<div class="span6">
					<ul class="social pull-right">
						<li><a href="https://www.facebook.com/HaDiRC/" target="_blank"><i class="icon-facebook"></i></a></li>
						<li><a href="https://plus.google.com/117160856069921192058" target="_blank"><i class="icon-google-plus"></i></a></li>                    
					</ul>
				</div>

				<div class="span1">
					<a id="gototop" class="gototop pull-right" href="#"><i class="icon-angle-up"></i></a>
				</div>
				<!--/Goto Top-->
			</div>
		</div>
	</footer>
	<!--/Footer-->

	<!--  Login form -->
	<div class="modal hide fade in" id="loginForm" aria-hidden="false">
		<div class="modal-header">
			<i class="icon-remove" data-dismiss="modal" aria-hidden="true"></i>
			<h4>Login Form</h4>
		</div>
		<!--Modal Body-->
		<div class="modal-body">
			<form class="form-inline" action="index.html" method="post" id="form-login">
				<input type="text" class="input-small" placeholder="Email">
				<input type="password" class="input-small" placeholder="Password">
				<label class="checkbox">
					<input type="checkbox"> Remember me
				</label>
				<button type="submit" class="btn btn-primary">Sign in</button>
			</form>
			<a href="#">Forgot your password?</a>
		</div>
		<!--/Modal Body-->
	</div>
	<!--  /Login form -->

	<script src="js/vendor/jquery-1.9.1.min.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	<!-- Required javascript files for Slider -->
	<script src="js/jquery.ba-cond.min.js"></script>
	<script src="js/jquery.slitslider.js"></script>
	<!-- /Required javascript files for Slider -->

	<!-- SL Slider -->
	<script type="text/javascript"> 
		$(function() {
			var Page = (function() {

				var $navArrows = $( '#nav-arrows' ),
				slitslider = $( '#slider' ).slitslider( {
					autoplay : true
				} ),

				init = function() {
					initEvents();
				},
				initEvents = function() {
					$navArrows.children( ':last' ).on( 'click', function() {
						slitslider.next();
						return false;
					});

					$navArrows.children( ':first' ).on( 'click', function() {
						slitslider.previous();
						return false;
					});
				};

				return { init : init };

			})();

			Page.init();
		});
	</script>
	<!-- /SL Slider -->
</body>
</html>
