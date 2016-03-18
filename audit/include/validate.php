<?php
		
	if(!isset($_SESSION['logined']) || $_SESSION['logined']!=true){
		Header("Location:./login.php");
		exit;
	}

?>