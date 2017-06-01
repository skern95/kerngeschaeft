<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<?php
		session_start();
		require('config_text.php');
		$_SESSION['sprachnr'] = 2; // 1 = Deutsch, 2 = Englisch
		$query = '
			SELECT *
			FROM texte
			WHERE seitennr = "4" 
			AND sprachnr = "'.$_SESSION['sprachnr'].'"
		'; //seitennr = 4 --> index.php
		try{
			$abfrageindex = $db->query($query);
		} catch(PDOException $ex){
				die("Failed to connect to the database: " . $ex->getMessage());
			} 
		echo '<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
			<title>';
			$text = $abfrageindex->fetch();
			echo ''.$text["text"].'</title>
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
	';

	include('header.php');    

?>

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
<?php
	include('footer.php');
?>

	<!--  Login form -->
	<div class="modal hide fade in" id="loginForm" aria-hidden="false">
		<div class="modal-header">
			<i class="icon-remove" data-dismiss="modal" aria-hidden="true"></i>
			<h4>Login Form</h4>
		</div>
		<!--Modal Body-->
		<div class="modal-body">
			<form class="form-inline" action="login.php" method="post" id="form-login">
				<input type="text" class="input-small" placeholder="Email" name="email">
				<input type="password" class="input-small" placeholder="Password" name="password">
				<input type="hidden" name="redirect" value="index.php"></button>
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
	
	<?php
		include 'sysinfopage.php'; // Aufruf der Sysinfopage
		
		
		// Aufruf des Loginerrors bei fehlerhaftem Login
		if (isset($_SESSION['loginerror'])){
			echo '
				<!-- SysInfoPage -->
				<div class="modal hide fade in" id="errorlog" aria-hidden="false">
					<div class="modal-header center" style="padding-bottom: 20px;">
						<h2>'.$_SESSION['loginerror'].'</h2>
					</div>
				</div>
				<!-- SysInfoPage -->
	
				<script type="text/javascript">
					$("#errorlog").modal();
				</script>
				';
			unset($_SESSION['loginerror']);
		};
	?>
</body>
</html>
