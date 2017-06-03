<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<?php
		session_start();
		require('config_text.php');
		
		//Setzen der Standardsprache
		if (empty($_SESSION['sprachnr'])){
		$_SESSION['sprachnr'] = 1; // 1 = Deutsch, 2 = Englisch
		}
		
		//Sprachbutton Funktionalität
		include('language.php');
		
		$query = '
			SELECT *
			FROM texte
			WHERE seitennr = "21" 
			AND sprachnr = "'.$_SESSION['sprachnr'].'"
		'; //seitennr = 21 --> kontakt.php
		try{
			$abfragekontakt = $db->query($query);
		} catch(PDOException $ex){
				die("Failed to connect to the database: " . $ex->getMessage());
			} echo '
		
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>';
			$text = $abfragekontakt->fetch();
			echo ''.$text["text"].'</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sl-slide.css">
	<link rel="stylesheet" href="css/animate.css">

    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>

<body>';
//Login Funktionalität
include('login.php');

require('config_text.php');
// 1 = Deutsch, 2 = Englisch
$query = '
	SELECT *
	FROM texte
	WHERE seitennr = "2" 
	AND sprachnr = "'.$_SESSION['sprachnr'].'"
'; //seitennr = 2 --> header
try{
	$abfrageheader = $db->query($query);
} catch(PDOException $ex){
		die("Failed to connect to the database: " . $ex->getMessage());
	} 
	
echo ''.'<!--Header-->
    <header class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a id="logo" class="pull-left" href="index.php"></a>
                <div class="nav-collapse collapse pull-right">
                    <ul class="nav">
                        <li><a href="index.php">';
$text = $abfrageheader->fetch();
//Startseite
	echo ''.$text["text"].'</a></li>
                        <li><a href="hb_allgemein.php">';
$text = $abfrageheader->fetch();
//Allgemeines
	echo ''.$text["text"].'</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">';
$text = $abfrageheader->fetch();
//Heatbox
	echo ''.$text["text"].' <i class="icon-angle-down"></i></a>
                            <ul class="dropdown-menu">
                            	<li class="nav-header"><a href="hb.php">';
$text = $abfrageheader->fetch();
//Heatbox
	echo ''.$text["text"].'</a></li>
                                <li><a href="hb_tec.php">';
$text = $abfrageheader->fetch();
//Technische Daten
	echo ''.$text["text"].'</a></li>
                                <li><a href="hb_anl.php">';
$text = $abfrageheader->fetch();
//Anleitungen
	echo ''.$text["text"].'</a></li>
                                <li class="divider"></li>
 								<li class="nav-header"><a href="hb_comp.php">';
$text = $abfrageheader->fetch();
//Heatbox Compact
	echo ''.$text["text"].'</a></li>
                                <li><a href="hb_comp_tec.php">';
$text = $abfrageheader->fetch();
//Technische Daten
	echo ''.$text["text"].'</a></li>
                                <li><a href="hb_comp_anl.php">';
$text = $abfrageheader->fetch();
//Anleitungen
	echo ''.$text["text"].'</a></li>
                                <li class="divider"></li>
                                <li class="nav-header"><a href="hb_eco.php">';
$text = $abfrageheader->fetch();
//Heatbox Eco
	echo ''.$text["text"].'</a></li>
                                <li><a href="hb_eco_tec.php">';
$text = $abfrageheader->fetch();
//Technische Daten
	echo ''.$text["text"].'</a></li>
                                <li><a href="hb_eco_anl.php">';
$text = $abfrageheader->fetch();
//Anleitungen
	echo ''.$text["text"].'</a></li> 
                                <li class="divider"></li>';                                
$text = $abfrageheader->fetch();
//Downloads
if (isset($_SESSION['user'])){	
	echo '<li><a href="hb_dl.php">'.$text["text"].'</a></li>'; // Überprüfung, ob User angemeldet ist für Downloads
}	
	echo '<li><a href="geschichte.php">';
$text = $abfrageheader->fetch();
//Geschichte
	echo ''.$text["text"].'</a></li>
	<li><a href="testberichte.php">';
$text = $abfrageheader->fetch();
//Testberichte
	echo ''.$text["text"].'</a></li>  
                                <li><a href="faq.php">';
$text = $abfrageheader->fetch();
//FAQ
	echo ''.$text["text"].'</a></li>  
                                <li><a href="spende.php">';
$text = $abfrageheader->fetch();
//Spende
	echo ''.$text["text"].'</a></li>                        
                            </ul>
                        </li>
						<li><a href="kommentar.php">';
$text = $abfrageheader->fetch();
//Kommentare
	echo ''.$text["text"].'</a></li>
                        <li class="active"><a href="kontakt.php">';
$text = $abfrageheader->fetch();
//Kontakt
	echo ''.$text["text"].'</a></li>
                        <li><a href="impressum.php">';
$text = $abfrageheader->fetch();
//Impressum
	echo ''.$text["text"].'</a></li>
						';			
include('loginstatus.php');
//Sprachbutton
echo '
						<li>
							<form method="post">';
								toggleLanguage();
								echo '
							</form>
						</li>
                    </ul>        
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </header>
    <!-- /header -->

    <section class="no-margin">
        <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJ34YqogwWvEcRso096nJO4Pk&key=AIzaSyCqrIw3ubdGGzaGU3DN32eIjFjL_ZObw_0"></iframe>
    </section>

    <section id="contact-page" class="container">
			<div class="row-fluid">
				<div class="span3" >
					<h4>';
	$text = $abfragekontakt->fetch();
//Kontakt Formular Überschrift
	echo ''.$text["text"].'</h4>
					<p><br></p>
					
					<div class="status alert alert-success" style="display: none"></div>

					<!-- Start Contact Form -->
					<form role="form" id="contactForm" class="contact-form" data-toggle="validator" class="shake">
						<div class="form-group">
							<div class="controls">
								<input type="text" id="name" class="input-block-level form-control" placeholder="';
	$text = $abfragekontakt->fetch();
//name placeholder
	echo ''.$text["text"].'" required data-error="';
	$text = $abfragekontakt->fetch();
//name data-error
	echo ''.$text["text"].'">
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="form-group">
							<div class="controls">
								<input type="email" class="input-block-level email form-control" id="email" placeholder="';
	$text = $abfragekontakt->fetch();
//Email placeholder
	echo ''.$text["text"].'" required data-error="';
	$text = $abfragekontakt->fetch();
//EMail data-error
	echo ''.$text["text"].'">
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="form-group">
							<div class="controls">
								<input type="text" id="msg_subject" class="input-block-level form-control" placeholder="';
	$text = $abfragekontakt->fetch();
//Betreff placeholder
	echo ''.$text["text"].'" required data-error="';
	$text = $abfragekontakt->fetch();
//Betreff data-error
	echo ''.$text["text"].'">
								<div class="help-block with-errors"></div>
							</div>
						</div>
					</div>
					<div class="span1"></div>
					<div class="span4">
						<div class="form-group">
							<div class="controls">
								<textarea id="message" rows="7" placeholder="';
	$text = $abfragekontakt->fetch();
//Nachricht Placeholder
	echo ''.$text["text"].'" class="input-block-level form-control" required data-error="';
	$text = $abfragekontakt->fetch();
//Nachricht data-error
	echo ''.$text["text"].'" style="width: 100%; height: 251px"></textarea>
								<div class="help-block with-errors"></div>								
							</div>
						</div>
						<p><br></p>
						<button type="submit" id="submit" class="btn btn-effect btn-primary btn-large">
							<i class="fa fa-check"></i> ';
	$text = $abfragekontakt->fetch();
//Senden Button
	echo ''.$text["text"].'
						</button>
						<div id="msgSubmit" class="h3 text-center hidden"></div>
						<div class="clearfix"></div>

					</form>
					<!-- End Contact Form -->
					
				</div>
				<div class="span3 pull-right">
					<h4>';
	$text = $abfragekontakt->fetch();
//Unsere Adresse Überschrift
	echo ''.$text["text"].'</h4>
					<p>
						';
	$text = $abfragekontakt->fetch();
//Sie finden uns hier:
	echo ''.$text["text"].'
					</p>
					<p>
						<i class="icon-map-marker pull-left"></i> &nbsp;';
	$text = $abfragekontakt->fetch();
//Straße_Nr
	echo ''.$text["text"].'
						<br>
						&nbsp;&nbsp;&nbsp;&nbsp;';
	$text = $abfragekontakt->fetch();
//PLZ_Ort
	echo ''.$text["text"].'
						<br />
						&nbsp;&nbsp;&nbsp;&nbsp;';
	$text = $abfragekontakt->fetch();
//Land
	echo ''.$text["text"].'
					</p>
					<p>
						<i class="icon-envelope"></i> &nbsp;';
	$text = $abfragekontakt->fetch();
//Email
	echo ''.$text["text"].'
					</p>
					<p>
						<i class="icon-phone"></i> &nbsp;';
	$text = $abfragekontakt->fetch();
//Telefon
	echo ''.$text["text"].'
					</p>
					<p>
						<i class="icon-print"></i> &nbsp;';
	$text = $abfragekontakt->fetch();
//Fax
	echo ''.$text["text"].'
					</p>
					<p>
						<i class="icon-globe"></i> &nbsp;&nbsp;<a href="HaDi-RC.de" style="color: #34495e">';
	$text = $abfragekontakt->fetch();
//Website
	echo ''.$text["text"].'</a>
					</p>
				</div>
				<div class="span1"></div>
			</div>
		</section>';

	//Fußzeile
	include('footer.php');
?>

	<script src="js/vendor/jquery-1.9.1.min.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/main.js"></script>   
	<script type="text/javascript" src="assets/js/jquery-min.js"></script>      
    <script type="text/javascript" src="assets/js/form-validator.min.js"></script>  
    <script type="text/javascript" src="assets/js/contact-form-script.js"></script>
	
	<?php
		include 'sysinfopage.php';

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
