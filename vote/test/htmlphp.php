<?php
	session_start();
	if(isset($_SESSION['ok'])){
		session_destroy();
?>
has session
<?php	}else{
		$_SESSION['ok']=1;

?>
no session
<?php 
	}
?>