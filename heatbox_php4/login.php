<?php 
	$query = '
		SELECT *
		FROM texte
		WHERE seitennr = "23" 
		AND sprachnr = "'.$_SESSION['sprachnr'].'"
	'; //seitennr = 23 --> login.php
	try{
		$abfragelogin = $db->query($query);
	} catch(PDOException $ex){
			die("Failed to connect to the database: " . $ex->getMessage());
	} 

	echo '
	<!--  Login form -->
		<div class="modal hide fade in" id="loginForm" aria-hidden="false">
			<div class="modal-header">
				<i class="icon-remove" data-dismiss="modal" aria-hidden="true"></i>
				<h4>';
			$text = $abfragelogin->fetch();
			echo ''.$text["text"].'</h4>
			</div>
			<!--Modal Body-->
			<div class="modal-body">
				<form method="post" class="form-inline" id="form-login">
					<input type="text" class="input-small" placeholder="';
			$text = $abfragelogin->fetch();
			echo ''.$text["text"].'" name="email" style="width:190px;">
					<input type="password" class="input-small" placeholder="';
			$text = $abfragelogin->fetch();
			echo ''.$text["text"].'" name="password" style="width:190px;">
					<button type="submit" name="login" class="btn btn-primary">';
			$text = $abfragelogin->fetch();
			echo ''.$text["text"].'</button>
				</form>
			</div>
			<!--/Modal Body-->
		</div>
	<!--  /Login form -->
	';

    require("config.php"); 
    $submitted_username = ''; 
    if(array_key_exists('login',$_POST)){ 
        $query = " 
            SELECT 
                knr, 
                username, 
                password, 
                salt, 
                email 
            FROM users 
            WHERE 
                email = :email 
        "; 
        $query_params = array( 
            ':email' => $_POST['email'] 
        ); 
          
        try{ 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); } 
        $login_ok = false; 
        $row = $stmt->fetch(); 
        if($row){ 
            $check_password = hash('sha256', $_POST['password'] . $row['salt']); 
            for($round = 0; $round < 65536; $round++){
                $check_password = hash('sha256', $check_password . $row['salt']);
            } 
            if($check_password === $row['password']){
                $login_ok = true;
            } 
        } 
 
        if($login_ok){ 
            unset($row['salt']); 
            unset($row['password']); 
            $_SESSION['user'] = $row;
        } 
        else{ 
            $submitted_username = htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');
			$text = $abfragelogin->fetch();
			$_SESSION['loginerror'] = "".$text["text"]; 
        } 
    }
?> 
