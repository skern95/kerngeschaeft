<?php

class Comment {
	private $data = array();

	public function __construct($row) {
		/*
		 /	Konstruktor
		 */

		$this -> data = $row;
	}

	public function markup() {

		/* XHTML Ausgabe der Kommentare */

		// $this->data abkürzen/alias setzen:
		$d = &$this -> data;

		// Zeit zu einem UNIX timestamp konvertieren:
		$d['dt'] = strtotime($d['dt']);

		// Avatar-Bild für Kommentare setzen (Veranschaulichung)
		// inkl. Easteregg für my name is jeff ;)
		if ($d['body'] == 'my name is jeff') {
			$bild = "images/ico/jeff.jpg";
		} else
			$bild = "images/ico/default_avatar.gif";

		//HTML Code + Variablen zur Ausgabe
		return '<div class="comment media"">
								<div class="pull-left">                                    
									<img src="' . $bild . '"  />
                                </div>
									
                                
                                <div class="media-body">
                                    <strong>Posted by ' . $d['name'] . '</strong><br>
                                    <small>Added ' . date('H:i \o\n d M Y', $d['dt']) . '</small><br>
                                    <p>' . $d['body'] . '</p>
                                </div>
    				</div>';

	}

	public static function validate(&$arr) {
		/*
		 /	Validierung der Daten im Kommentar Formular mit AJAX
		 /
		 /   Zurückgeben ob die Daten in Ordnung sind oder nicht (true/flase),
		 /	$arr array der als Parameter übergeben wird mit validierten Daten (& Zeichen beachten)
		 /   oder Fehlermeldungen befüllen.
		 */

		$errors = array();
		$data = array();

		// filter_input Funktion (PHP 5.2.0)

		// ACHTUNG! URL ist für eine optionale Funktion, um einen Link auf den Avatar/das Bild zu legen (wenn in extra Textfeld eingegeben)
		if (!($data['url'] = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL))) {
			// If the URL field was not populated with a valid URL,
			// act as if no URL was entered at all:

			$url = '';
		}

		// filter mit einer spezifischen Rückruffunktion:

		if (!($data['body'] = filter_input(INPUT_POST, 'body', FILTER_CALLBACK, array('options' => 'Comment::validate_text')))) {
			$errors['body'] = '<p style="color: red">Inhalt einfügen.</p>';
		}

		if (!empty($errors)) {

			// Wenn es Fehler gibt, $errors in den $arr Array kopieren:

			$arr = $errors;
			return false;
		}

		// Bei Validen Daten, Daten "aufräumen" und in $arr kopieren:

		foreach ($data as $k => $v) {
			$arr[$k] = mysql_real_escape_string($v);
		}

		return true;

	}

	private static function validate_text($str) {
		/*
		 /	Interner FILTER_CALLBACK
		 */

		if (mb_strlen($str, 'utf8') < 1)
			return false;

		// html special characters (<, >, ", & .. etc) encodieren und konvertieren
		// Umbrüche zu <br> tags:

		$str = nl2br(htmlspecialchars($str));

		// übrig gebliebene Umbrüche entfernen
		$str = str_replace(array(chr(10), chr(13)), '', $str);

		return $str;
	}

}
?>