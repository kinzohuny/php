<?php
	session_start();
	if(isset($_SESSION['isFinished']) && $_SESSION['isFinished']==true){
		echo "<meta http-equiv=\"refresh\" content=\"0;url=thanks.html\">"; 
	}else if(isset($_SESSION['isBinded']) && $_SESSION['isBinded']==true){
		echo "<meta http-equiv=\"refresh\" content=\"0;url=question.html\">"; 
	}else{
		echo "<meta http-equiv=\"refresh\" content=\"0;url=mobile.html\">"; 
	}
?>
