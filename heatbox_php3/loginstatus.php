<?php
	//session_start();
	if (empty($_SESSION['sprache'])) {
		$_SESSION['sprache'] = 1;
	}
	
	if (!empty($_SESSION['user'])){
	echo '
	<li class="dropdown login"><a href="#" class="dropdown-toggle" data-toggle="dropdown">',$_SESSION['user']['email'],' <i class="icon-angle-down"></i></a>
		<ul class="dropdown-menu">
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</li>
	';
	} else {
	echo '
	<li class="login">
		<a data-toggle="modal" href="#loginForm"><i class="icon-lock"></i></a>
	</li>
	';}
?>