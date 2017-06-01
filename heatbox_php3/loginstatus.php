<?php
	require("config.php");
	
	if (empty($_SESSION['sprache'])) {
		$_SESSION['sprache'] = 1;
	}
	
	if (!empty($_SESSION['user'])){
		$query = "
		SELECT istadmin
		FROM permissions
		WHERE knr = '".$_SESSION['user']['knr']."'";
		$run = $db->query($query);
		$permission = $run->fetch();
		if($permission['istadmin'] == true) {
			echo '
			<li class="dropdown login"><a href="#" class="dropdown-toggle" data-toggle="dropdown">',$_SESSION['user']['email'],' <i class="icon-angle-down"></i></a>
				<ul class="dropdown-menu">
					<li><a href="adminpage.php">Adminseite</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</li>
			';
		} else {
			echo '
			<li class="dropdown login"><a href="#" class="dropdown-toggle" data-toggle="dropdown">',$_SESSION['user']['email'],' <i class="icon-angle-down"></i></a>
				<ul class="dropdown-menu">
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</li>
			';
		}
	} else {
		echo '
		<li class="login">
			<a data-toggle="modal" href="#loginForm"><i class="icon-lock"></i></a>
		</li>
		';
	}
?>