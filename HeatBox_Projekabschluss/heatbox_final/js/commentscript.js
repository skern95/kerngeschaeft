$(document).ready(function(){
	
	
	//Sebastian Kern
	
	
	/* Ausführen, wenn DOM geladen ist */
	
	/* Mehrmals dasselbe Kommentar auf einmal abschicken verhindern: */
	var working = false;
	
	/* Auf das Submit des Formulars "horchen" : */
	$('#addCommentForm').submit(function(e){
	
		/* falls es schon abgeschickt ist */
 		e.preventDefault();
		if(working) return false;
		
		/* abschickvorgang wird gestartet */
		working = true;
		/* Button auf "Working.." ändern */
		$('#submit').val('Working..');
		/*	span.error entfernen*/
		$('span.error').remove();
		
		/* Formular Felder an submit.php schicken/übergeben: */
		$.post('submit.php',$(this).serialize(),function(msg){

			/* fertig mit absenden */
			working = false;
			/* wieder auf abschicken setzen */ 
			$('#submit').val('Abschicken');
			
			
			if(msg.status){

				/* 
				/	Bei erfolgreichem Senden des Kommentars.
				/	wird er unter den letzten mit einem "slidedown" Effekt gesetzt
				/*/

				$(msg.html).hide().insertBefore('#x').slideDown();
				
				/* Text im Kommentarfeld leeren */
				$('#body').val('');
			}
			else {

				/*
				/	Alle Fehler ausgeben, wenn welche aufgetreten sind (Schleife)
				/*/
				
				$.each(msg.errors,function(k,v){
					$('label[for='+k+']').append('<span class="error">'+v+'</span>');
				});
			}
		},'json');

	});
	
});