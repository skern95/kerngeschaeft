<?php
//Benutzer ausgeben für die Kundenliste
//DB-Konfiguration laden
require ("config.php");
//SQL Abfrage: Alle Benutzer mit ihren Permissions laden
$query = " 
            SELECT 
                * 
            FROM users, permissions 
            WHERE 
                users.knr = permissions.knr
			ORDER BY users.knr
        ";
//Versuch der Ausgabe inklusive der abgefragten Daten
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
	//Für jeden abgefragten Datensatz eine neue Zeile anlegen(Prüfen der Permissions "ja" ; "-")
	foreach ($db->query($query) as $row) {
		if ($row['istadmin'] == 1) {
			$istadmin = "ja";
		} else {
			$istadmin = "-";
		}
		if ($row['hatheatbox'] == 1) {
			$hatheatbox = "ja";
		} else {
			$hatheatbox = "-";
		}
		if ($row['hatcompact'] == 1) {
			$hatcompact = "ja";
		} else {
			$hatcompact = "-";
		}
		if ($row['hateco'] == 1) {
			$hateco = "ja";
		} else {
			$hateco = "-";
		}
		echo "<tr>";
		echo "<td>" . $row['knr'] . "</td>";
		echo "<td>" . $row['username'] . "</td>";
		echo "<td>" . $row['email'] . "</td>";
		echo "<td>" . $istadmin . "</td>";
		echo "<td>" . $hatheatbox . "</td>";
		echo "<td>" . $hatcompact . "</td>";
		echo "<td>" . $hateco . "</td>";
		echo "</tr>";
	}
	echo "
			</table>
		";
} 
//Bei Fehler: Meldung
catch(PDOException $ex) { die("Konnte Befehl nicht ausführen: " . $ex -> getMessage());
}
?>