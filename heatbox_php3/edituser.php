<?php
	if(array_key_exists('edituser',$_POST)){
		require("config.php");
		//echo "".$_POST['kundennummer'];
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
		<form action="edituser.php" method="post">
			<label>Name:</label>
			<input type="text" name="username" value="'.$userdata['username'].'" style="min-height: 25px; width: 300px;"/>

			<label>E-Mail:</label>
			<input type="text" name="email" value="'.$userdata['email'].'" style="min-height: 25px; width: 300px;"/><br>

			<input type="checkbox" name="istadmin" ';
			if($permissions['istadmin'] == 1){
				echo "checked ";
			}
			echo 'style="margin: 0px 0px 4px;">&nbsp;Ist Admin?</input><br>

				<input type="checkbox" name="hatheatbox" ';
			if($permissions['hatheatbox'] == 1){
				echo "checked ";
			}
			echo ' style="margin: 0px 0px 4px;">&nbsp;Hat Heatbox?</input><br>

				<input type="checkbox" name="hatcompact" ';
			if($permissions['hatcompact'] == 1){
				echo "checked ";
			}
			echo ' style="margin: 0px 0px 4px;">&nbsp;Hat Heatbox Compact?</input><br>

				<input type="checkbox" name="hateco" ';
			if($permissions['hateco'] == 1){
				echo "checked ";
			}
			echo ' style="margin: 0px 0px 4px;">&nbsp;Hat Heatbox Eco?</input><br>

			<input type="submit" name="editUser" value="Bearbeiten" style="margin-top:10px;" />
			
			<input type="submit" name="delUser" value="Löschen" style="margin-top:10px;" />
		</form>
		';
	}
	
	/*if(isset($_POST['editUser'])) {
		require("config.php");
		$query = "
		UPDATE users
		SET 
		WHERE knr = '".$userdata['knr']."'
		";
		$db->query($query);
		header("Location: adminpage.php"); 
		exit();
	}*/
	
	/*if(isset($_POST['delUser'])) {
		require("config.php");
		$query = "
		DELETE FROM users
		WHERE knr = '".$userdata['knr']."'
		";
		$db->query($query);
		header("Location: adminpage.php"); 
		exit();
	}*/
?>