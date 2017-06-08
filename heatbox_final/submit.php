<?php
//Kommentar abschicken
session_start();

// Error reporting:
error_reporting(E_ALL^E_NOTICE);

//Datenbank Connection und Kommentar Klasse einbinden
include "connect.php";
include "comment.class.php";



/*
/	Entweder wird der Array mit den abgeschickten Daten,
/   oder mit einer Fehlermeldung gefüllt
*/
$arr = array();
//Namen und E-Mail mit dem Namen und der E-Mail des eingeloggten User füllen
$arr['name'] = $_SESSION['user']['username'];
$arr ['email'] = $_SESSION['user']['email'];
//Validierungsfunktion der Inhalte
$validates = Comment::validate($arr);

//Wenn die Daten in Ordnung waren, in die Datenbank einfügen
if($validates)
{
	
	mysql_query("	INSERT INTO comments(name,email,body)
					VALUES (
						'".$arr['name']."',
						'".$arr ['email']."',
						'".$arr['body']."'
					)");
	//Datum konventiert einfügen
	$arr['dt'] = date('r',time());
	//Primärschlüssel ID mit auto-increment
	$arr['id'] = mysql_insert_id();
	
	/*
	/	Daten in $arr wegen der Query "escaped",
	/	benötogen sie aber "unescaped"
	/	-> "stripslashes" allen Daten im Array hinzufügen:
	/*/
	
	$arr = array_map('stripslashes',$arr);
	
	$insertedComment = new Comment($arr);

	/* Ausgabe des gerade eingegbenen Kommentars auf der Webseite */

	echo json_encode(array('status'=>1,'html'=>$insertedComment->markup()));

}
//Waren die Daten nicht in Ordnung
else
{
	/* Fehlermeldung ausgeben */
	echo '{"status":0,"errors":'.json_encode($arr).'}';
}

?>