<?php
// Datenbank Konfiguration
require ('config_text.php');

// Sprachabfrage
//$_SESSION['sprachnr'] = 1; // 1 = Deutsch, 2 = Englisch
$query = '
	SELECT *
	FROM texte
	WHERE seitennr = "3" 
	AND sprachnr = "' . $_SESSION['sprachnr'] . '"
';
//seitennr = 3 --> footer
try {
	$abfragefooter = $db -> query($query);
} catch(PDOException $ex) {
	die("Failed to connect to the database: " . $ex -> getMessage());
}
echo '
<!--Bottom-->
	<section id="bottom" class="main">
		<!--Container-->
		<div class="container">
			<!--row-fluids-->
			<div class="row-fluid">
				<!--Contact Form-->
				<div class="span3">
					<h4>';
$text = $abfragefooter -> fetch();
//Adresse Oberüberschrift
echo '' . $text["text"] . '</h4>
					<ul class="unstyled address">
						<li>
							<i class="icon-home"></i>
							<strong>';
$text = $abfragefooter -> fetch();
//Strasse Überschrift
echo '' . $text["text"] . ':</strong><br />
							';
$text = $abfragefooter -> fetch();
//Strasse
echo '' . $text["text"] . '
						</li>
						<li>
							<i class="icon-compass"></i>
							<strong>';
$text = $abfragefooter -> fetch();
//PLZ/Ort Überschrift
echo '' . $text["text"] . ':</strong><br />
							';
$text = $abfragefooter -> fetch();
//PLZ/Ort
echo '' . $text["text"] . '
						</li>
						<li>
							<i class="icon-flag-alt"></i>
							<strong>';
$text = $abfragefooter -> fetch();
//Land Überschrift
echo '' . $text["text"] . ':</strong><br />
							';
$text = $abfragefooter -> fetch();
//Land
echo '' . $text["text"] . '
					   </li>
					</ul>
				</div>
				<!--End Contact Form-->

				<!--Ansrpechpartner-->
				<div class="span3">
					<h4>';
$text = $abfragefooter -> fetch();
//Ansprechpartner Oberüberschrift
echo '' . $text["text"] . '</h4>
					<div>
						<ul class="unstyled address">
							<li>
								<i class="icon-male"></i>
								';
$text = $abfragefooter -> fetch();
//Name
echo '' . $text["text"] . '</li>
							<li>
								<i class="icon-globe"></i>
								<strong>';
$text = $abfragefooter -> fetch();
//Website
echo '' . $text["text"] . ':</strong> <a href="http://www.HaDi-RC.de">HaDi-RC.de</a>
							</li>
							<li>
								<i class="icon-envelope"></i>
								<strong>';
$text = $abfragefooter -> fetch();
//Email-Adresse
echo '' . $text["text"] . ': </strong> Info@HaDi-RC.de
							</li>
							<li>
								<i class="icon-phone"></i>
								<strong>';
$text = $abfragefooter -> fetch();
//Telefon
echo '' . $text["text"] . ':</strong>';
$text = $abfragefooter -> fetch();
//Telefonnummer
echo '' . $text["text"] . '
							</li>
							<li>
								<i class="icon-print"></i>
								<strong>';
$text = $abfragefooter -> fetch();
//Fax
echo '' . $text["text"] . ':</strong>';
$text = $abfragefooter -> fetch();
//Faxnummer
echo '' . $text["text"] . '
							</li>
						</ul>
					</div>  
				</div>
				
				<!--Important Links-->
				<!--Informationen-->
				<div class="span3">
					<h4>';
$text = $abfragefooter -> fetch();
//Informationen Oberüberschrift
echo '' . $text["text"] . '</h4>
					<div>
						<ul class="unstyled address">
							<li>
								<i class="icon"><img src="images/ico/impr.png" style="height:14px" /></i>
								<a href="impressum.php">';
$text = $abfragefooter -> fetch();
//Impressum Link
echo '' . $text["text"] . '</a>
							</li>
							<li>
								<i class="icon-user"></i>
								<a href="kontakt.php">';
$text = $abfragefooter -> fetch();
//Kontakt Link
echo '' . $text["text"] . '</a>
							</li>
							<li>
								<i class="icon-shopping-cart"></i>
								<a href="http://www.hadi-rc.de" target="_blank">';
$text = $abfragefooter -> fetch();
//Shop Link
echo '' . $text["text"] . '</a>
							</li>
							<li>
								<i class="icon-facebook"></i>
								<a href="https://www.facebook.com/HaDiRC/" target="_blank">';
$text = $abfragefooter -> fetch();
//Facebook
echo '' . $text["text"] . '</a>
							</li>
							<li>
								<i class="icon-google-plus"></i>
								<a href="https://plus.google.com/117160856069921192058" target="_blank">';
$text = $abfragefooter -> fetch();
//Google+
echo '' . $text["text"] . '</a>
							</li>
						</ul>
					</div>
				</div>
				<!--End Archives-->

				<div class="span3">
					<h4>';
$text = $abfragefooter -> fetch();
//Spenden Oberüberschrift
echo '' . $text["text"] . '</h4>
					<div>
						<ul class="unstyled address">
							<li>
								<i class="icon-euro"></i>
								<a href="spende.php">';
$text = $abfragefooter -> fetch();
//Spendenlink
echo '' . $text["text"] . '</a>
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
	<!--/Footer-->';
?>