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
			WHERE seitennr = "16" 
			AND sprachnr = "'.$_SESSION['sprachnr'].'"
		'; //seitennr = 16 --> geschichte.php
		try{
			$abfragegesch = $db->query($query);
		} catch(PDOException $ex){
				die("Failed to connect to the database: " . $ex->getMessage());
			} echo '
		
		
		
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>';
			$text = $abfragegesch->fetch();
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

<body>';
//Login Funktionalität
include('login.php');

require('config_text.php');
//$_SESSION['sprachnr'] = 1; // 1 = Deutsch, 2 = Englisch
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
                        <li class="dropdown active">
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
	echo '<li class="active"><a href="geschichte.php">';
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
                        <li><a href="kontakt.php">';
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
					<h2>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</h2>
				<div class="gap"></div>
					<p>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</p>
					<p>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</p>
					<p>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</p>
					<p>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</p>
					<p>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</p>
				</div>
			</div>
		</div>
	</section>

	<section id="recent-works">
		<div class="container">
			<div class="center">
				<h3>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</h3>
			</div>
			<div class="center"></div>
			<ul class="gallery col-2" style="margin: 0 auto;padding-left: 32.5%">
				<!--Item 1-->
				<li>
					<div class="preview">
						<br>
						<br>
						<img alt=" " src="images/history/Alpha/vfd.JPG">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<br><br>
						<h5>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</h5>
						<p>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</p>
						<p>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</p>
						<p>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</p>
					</div>                
				</li>
				<!--/Item 1-->        
			</ul>
		</div>
	</section>
	
	
	
	<section class="main-info">
		<div class="container">
			<div class="center">
				<h3>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</h3>
			</div>
			<div class="row">
				<ul class="gallery col-2" style="margin: 0 auto;padding-left: 35%">
					<!--Item 2-->
					<li>
						<div class="preview">
							<br>
							<br>
							<img alt=" " src="images/history/beta/HBv0.9-beta.JPG">
							<div class="overlay">
							</div>
						</div>
						<div class="desc">
							<br><br>
							<h5>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</h5>
							<p>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</p>
							<div class="preview">
							<img alt=" " src="images/history/v10 _121/Mustereinbau_v1_2.jpg">
							<div class="overlay">
							</div>
						</div>
							<p>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</p>
						</div>                
					</li>
					<!--/Item 2-->        
				</ul>
			</div>
			<div class="center">
				<div class="gap"></div>
				<h4>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</h4>
				<br><br>
				<ul class="gallery col-4">
				<!--Item 1-->
				<li>
					<div class="preview">
						<img alt=" " src="images/history/beta/GrVergleich_1.jpg">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<h5>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</h5>
					</div>                
				</li>
				<!--/Item 1--> 

				<!--Item 2-->
				<li>
					<div class="preview">
						<img alt=" " src="images/history/beta/GrVergleich_2.jpg">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<h5>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</h5>
					</div>               
				</li>
				<!--/Item 2-->

				<!--Item 3-->
				<li>
					<div class="preview">
						<img alt=" " src="images/history/beta/HBv09-beta1.JPG">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<br>
						<h5>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</h5>
					</div>                 
				</li>
				<!--/Item 3--> 

				<!--Item 4-->
				<li>
					<div class="preview">
						<img alt=" " src="images/history/beta/HBv09-beta2.JPG">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<br>
						<h5>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</h5>
					</div>
									
				</li>
				<!--/Item 4-->               
			</ul>

			</div>
		</div>
	</section>
	
	<section id="recent-works">
		<div class="container">
			<div class="row">
			<div class="center">
				<h3>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</h3>
			</div>  
			<div class="gap"></div>
			<div class="center"></div>
			<ul class="gallery col-2" style="margin: 0 auto;padding-left: 32.5%">
				<!--Item 1-->
				<li>
					<div class="preview">
						<br>
						<br>
						<img alt=" " src="images/history/v10 _121/rotePlatine.jpg">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<br><br>
						<h5>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</h5>
						<p>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</p>
					</div>                
				</li>
				<!--/Item 1-->        
			</ul>
			</div>
		</div>
	</section>
	
	
	
		<section class="main-info">
		<div class="container">
			<div class="row-fluid">
				<div class="center">
					<h3>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</h3>
				</div>
				<div class="center"></div>
				<ul class="gallery col-2" style="margin: 0 auto;padding-left: 32.5%">
					<!--Item 1-->
					<li>
						<div class="preview">
							<br>
							<br>
							<img alt=" " src="images/history/v10 _121/HB_v121.JPG">
							<div class="overlay">
							</div>
						</div>
						<div class="desc">
							<br><br>
							<p>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</p>
						</div>                
					</li>
					<!--/Item 1-->        
				</ul>
		</div>
	</section>
	
	
		<section id="recent-works">
		<div class="container">
			<div class="row">
			<div class="center">
				<h3>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</h3>
			</div>  
			</div>
			<div class="gap"></div>
			<div class="center">
				<ul class="gallery col-4" style="padding-left: 17.5%">
				<!--Item 1-->
				<li>
					<div class="preview">
						<img alt=" " src="images/history/beta/HB-NG_First_Beta_display.jpg">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<br>
						<h5>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</h5>
					</div>                
				</li>
				<!--/Item 1--> 

				<!--Item 2-->
				<li>
					<div class="preview">
						<img alt=" " src="images/history/beta/HB-NG_Second_Beta.jpg">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<br>
						<h5>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</h5>
					</div>               
				</li>
				<!--/Item 2-->   
				<li>
					<div class="preview">
						<img alt=" " src="images/history/beta/HB-NG_Second_Beta_display.jpg">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<br>
						<h5>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</h5>
					</div>               
				</li>
				<!--/Item 3-->          
			</ul>
		</div>
	</section>
	
	
	
	
	
		<section class="main-info">
		<div class="container">
			<div class="center">
				<h3>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</h3>
			</div>
			<div class="row">
				<ul class="gallery col-2" style="margin: 0 auto;padding-left: 35%">
					<!--Item 2-->
					<li>
						<div class="preview">
							<br>
							<br>
							<img alt=" " src="images/history/v150 _v151/HBv150_compact.JPG">
							<div class="overlay">
							</div>
						</div>
						<div class="desc">
							<br><br>
							<h5>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</h5>
							<p>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'<br>           
							';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</p>
						</div>
					</li>
					<!--/Item 2-->        
				</ul>
			</div>
			<div class="row">
			<div class="center">
				<div class="gap"></div>
				<p></p>
				<h4>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</h4>
				<br><br>
				<ul class="gallery col-3" style="padding-left: 25%">
				<!--Item 1-->
				<li>
					<div class="preview">
						<img alt=" " src="images/history/v150 _v151/hb_COMPACT_Adapter_v151.jpg">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<h5>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</h5>
					</div>                
				</li>
				<!--/Item 1--> 

				<!--Item 2-->
				<li>
					<div class="preview">
						<img alt=" " src="images/history/v150 _v151/hb_COMPACT_Adapter_v151_2.jpg">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<h5>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</h5>
					</div>               
				</li>
				</ul>
				<!--/Item 2-->
			</div>
			</div>

				<!--Item 3-->
				<div class="row">
			<div class="center">
				<ul class="gallery col-3" style="padding-left: 25%">
				<li>
					<div class="preview">
						<img alt=" " src="images/history/v150 _v151/hb_COMPACT_Adapter_v151_3.jpg">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<h5>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</h5>
						<p>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</p>
					</div>                 
				</li>
				<!--/Item 3--> 

				<!--Item 4-->
				<li>
					<div class="preview">
						<img alt=" " src="images/history/v150 _v151/HB_COMPACT_2x16_v151_c24.jpg">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<h5>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</h5>
						<p>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</p>
					</div>
									
				</li>
				<!--/Item 4-->               
			</ul>

			</div>
		</div>
	</section>
	
	
	
		<section id="recent-works">
		<div class="container">
			
			<div class="center">
				<h3>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</h3>
			</div>
			<div class="center"></div>
			<ul class="gallery col-2" style="margin: 0 auto;padding-left: 32.5%">
				<!--Item 1-->
				<li>
					<div class="preview">
						<br>
						<br>
						<img alt=" " src="images/history/HeatBox_v1.60_12-24v.JPG">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<br><br>
						<p>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</p>
					</div>                
				</li>
				<!--/Item 1-->        
			</ul>
			
			
		</div>
	</section>
	
			<section class="main-info">
		<div class="container">
			<div class="center">
				<h3>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</h3>
			</div>
			<div class="center"></div>
			<ul class="gallery col-2" style="margin: 0 auto;padding-left: 32.5%">
				<!--Item 1-->
				<li>
					<div class="preview">
						<br>
						<br>
						<img alt=" " src="images/history/HB_v170_mit_Verpolungsschutz.jpg">
						<div class="overlay">
						</div>
					</div>
					<div class="desc">
						<br><br>
						<p>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</p>
						<p>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</p>
						<p>';
			$text = $abfragegesch->fetch();
			echo ''.$text["text"].'</p>
					</div>                
				</li>
				<!--/Item 1-->        
			</ul>
		</div>
	</section>	
	';

	//Fußzeile
	include('footer.php');
?>

	<script src="js/vendor/jquery-1.9.1.min.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

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