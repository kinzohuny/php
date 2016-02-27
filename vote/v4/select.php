<?php
session_start();

if(!isset($_SESSION['mobile'])){
	Header("Location:./index.php");
	exit;
}elseif(isset($_SESSION['finished'])){
	Header("Location:./thanks.html");
	exit;
}elseif(!isset($_SESSION['sex']) || !isset($_SESSION['age']) || !isset($_SESSION['profession'])){
	Header("Location:./baseinfo.php");
	exit;
}elseif(isset($_POST['step'])&&$_POST['step']=='select'){
	//save value to session
	$_SESSION['select']=$_POST['select'];
	
	if(isset($_SESSION['select'])&&$_SESSION['select']==2){
		Header("Location:./selectcounty.php");
		exit;
	}else{
		Header("Location:./questionz.php");
		exit;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>廊坊市干部考核社会评价调查系统</title>
	<link href="./css/main.css" type="text/css" rel="stylesheet">
	<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="./js/check.js"></script>
</head>
<body>
	<p class=title align=center>
		选择评价对象
	</p>

	<div class=main>
		<form id="user_login" action="" method="post" onsubmit="return checkMust(['select']);">
			<p class="sub_title lineheight2"><b>请选择市直单位或县（市、区）进行评价。</b></p>
			<p class="sub_title lineheight2 em2" id=select_error>
				<label><input type=radio name=select value=1 onClick='$("#result").val("questionz.html");' />市直单位</label>&nbsp;&nbsp;&nbsp;
				<label><input type=radio name=select value=2 onClick='$("#result").val("selectcounty.html");' />县（市、区）</label>
			</p>
			<br>
			<p class=red>*注：每个手机号只限评价一个选项。</p>
			<br><br><br>
			<input type=hidden name=step value=select />
			<div class=center><input class=btn type="submit" value="下一步" /></div>
			<!-- <input class=btn type="button" value="下一步" onClick='location.href = $("#result").val();' /> -->
		</form>
	</div>
</body>
</html>