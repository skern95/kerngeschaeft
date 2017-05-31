<?php
	require("config.php");
	$query = " 
            SELECT 
                * 
            FROM users, permissions 
            WHERE 
                users.knr = permissions.knr 
        "; 
		try {       
		echo "
		<html>
			<head>
				<link rel='stylesheet' href='css/bootstrap.min.css'>
				<link rel='stylesheet' href='css/bootstrap-responsive.min.css'>
				<link rel='stylesheet' href='css/font-awesome.min.css'>
				<link rel='stylesheet' href='css/main.css'>
				<link rel='stylesheet' href='css/sl-slide.css'>
			</head>
			<body>
				<table border='1'>
					<tr>
						<th><label>UserID</label></th>
						<th><label>Kundennummer</label></th>
						<th><label>Username</label></th>
						<th><label>Email-Adresse</label></th>
						<th><label>IstAdmin?</label></th>
						<th><label>HatHeatboxNormal?</label></th>
						<th><label>HatHeatboxCompact?</label></th>
						<th><label>HatHeatboxEco?</label></th>
					</tr>
		";
		foreach ($db->query($query) as $row){
			//print_r($row);
			if($row['istadmin'] = 1){
				$istadmin = "true";
			} else {
				$istadmin = "false";
			}
			if($row['hatheatbox'] = 1){
				$hatheatbox = "true";
			} else {
				$hatheatbox = "false";
			}
			if($row['hatcompact'] = 1){
				$hatcompact = "true";
			} else {
				$hatcompact = "false";
			}
			if($row['hateco'] = 1){
				$hateco = "true";
			} else {
				$hateco = "false";
			}
			echo "<tr>";
			echo "<td>".$row['userid']."</td>";
			echo "<td>".$row['knr']."</td>";
			echo "<td>".$row['username']."</td>";
			echo "<td>".$row['email']."</td>";
			echo "<td>".$istadmin."</td>";
			echo "<td>".$hatheatbox."</td>";
			echo "<td>".$hatcompact."</td>";
			echo "<td>".$hateco."</td>";
			echo "</tr>";
		}
		echo "
				</table>
			</body>
		</html>
		";
		} 
        catch(PDOException $ex){ die("Konnte Befehl nicht ausführen: " . $ex->getMessage()); }
?>