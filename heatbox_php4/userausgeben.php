<?php
	require("config.php");
	$query = " 
            SELECT 
                * 
            FROM users, permissions 
            WHERE 
                users.knr = permissions.knr
			ORDER BY users.knr
        "; 
		try {       
		echo "
			<table>
				<tr>
					<th>Kundennr</th>
					<th>Name</th>
					<th>Email-Adresse</th>
					<th>Admin</th>
					<th>Heatbox</th>
					<th>Compact</th>
					<th>Eco</th>
				</tr>
		";
		foreach ($db->query($query) as $row){
			//print_r($row);
			if($row['istadmin'] == 1){
				$istadmin = "ja";
			} else {
				$istadmin = "-";
			}
			if($row['hatheatbox'] == 1){
				$hatheatbox = "ja";
			} else {
				$hatheatbox = "-";
			}
			if($row['hatcompact'] == 1){
				$hatcompact = "ja";
			} else {
				$hatcompact = "-";
			}
			if($row['hateco'] == 1){
				$hateco = "ja";
			} else {
				$hateco = "-";
			}
			echo "<tr>";
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
		";
		} 
        catch(PDOException $ex){ die("Konnte Befehl nicht ausführen: " . $ex->getMessage()); }
?>