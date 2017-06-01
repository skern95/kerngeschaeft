<?php
	if(array_key_exists('showuser',$_POST)){
		require("config.php");
		
		$query = "
		SELECT *
		FROM users
		WHERE knr = '".$_POST['typ'].$_POST['kundennummer']."'
		";
		$users = $db->query($query);
		$userdata = $users->fetch();
		
		$query2 = "
		SELECT *
		FROM permissions
		WHERE knr = '".$_POST['typ'].$_POST['kundennummer']."'
		";
		$perm = $db->query($query2);
		$permissions = $perm->fetch();
		
		
		echo '
		<form method="post">
			<label>Name:</label>
			<input type="hidden" name="fullUserId" value="'.$userdata['knr'].'" />
			
			<input type="text" name="username" value="'.$userdata['username'].'" style="min-height: 25px; width: 300px;" />

			<label>E-Mail:</label>
			<input type="text" name="email" value="'.$userdata['email'].'" style="min-height: 25px; width: 300px;" /><br>

			<input type="checkbox" name="istadmin" ';
			if($permissions['istadmin'] == true){
				echo "checked ";
			}
			echo 'style="margin: 0px 0px 4px;">&nbsp;Ist Admin?</input><br>

				<input type="checkbox" name="hatheatbox" ';
			if($permissions['hatheatbox'] == true){
				echo "checked ";
			}
			echo ' style="margin: 0px 0px 4px;">&nbsp;Hat Heatbox?</input><br>

				<input type="checkbox" name="hatcompact" ';
			if($permissions['hatcompact'] == true){
				echo "checked ";
			}
			echo ' style="margin: 0px 0px 4px;">&nbsp;Hat Heatbox Compact?</input><br>

				<input type="checkbox" name="hateco" ';
			if($permissions['hateco'] == true){
				echo "checked ";
			}
			echo ' style="margin: 0px 0px 4px;">&nbsp;Hat Heatbox Eco?</input><br>

			<input type="submit" name="editUser" value="Bearbeiten" style="margin-top:10px;" />
			
			<input type="submit" name="delUser" value="Löschen" style="margin-top:10px;" />
		</form>
		';
	}

	if(array_key_exists('editUser',$_POST)) {
		require("config.php");
		
		$query = "
		UPDATE users
		SET username='".$_POST['username']."', email='".$_POST['email']."' 
		WHERE knr = '".$_POST['fullUserId']."'
		";
		$db->query($query);
		
		if(empty($_POST['istadmin'])){
			$istadmin = false;
		} else {
			$istadmin = true;
		}
		if(empty($_POST['hatheatbox'])){
			$hatheatbox = false;
		} else {
			$hatheatbox = true;
		}
		if(empty($_POST['hatcompact'])){
			$hatcompact = false;
		} else {
			$hatcompact = true;
		}
		if(empty($_POST['hateco'])){
			$hateco = false;
		} else {
			$hateco = true;
		}
		
		$query2 = "
		UPDATE permissions
		SET istadmin='".$istadmin."', hatheatbox='".$hatheatbox."', hatcompact='".$hatcompact."', hateco='".$hateco."'
		WHERE knr = '".$_POST['fullUserId']."'
		";
		$db->query($query2);
		
		echo "Benutzer erfolreich bearbeitet.";
	}
	
	if(array_key_exists('delUser',$_POST)) {
		require("config.php");
		
		$query = "
		DELETE FROM users
		WHERE knr = '".$_POST['fullUserId']."'
		";
		$db->query($query);
		
		echo "Benutzer erfolgreich gelöscht.";
	}
?>