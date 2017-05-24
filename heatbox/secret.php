<?php
    require("config.php");
	echo nl2br(print_r($_SESSION,true));
    if(empty($_SESSION['user'])) 
    {
        header("Location: index.php");
		exit();
 
    }
?>
<html>
	<body>
			<li><a href="logout.php">Log Out</a></li>
	</body>
</html>