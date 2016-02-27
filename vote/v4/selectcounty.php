<?php
session_start();

if(!isset($_SESSION['mobile'])){
	Header("Location:./index.php");
	exit;
}elseif(isset($_SESSION['finished'])){
	Header("Location:./thanks.html");
	exit;
}elseif(!isset($_SESSION['select'])){
	Header("Location:./select.php");
	exit;
}elseif(isset($_POST['step'])&&$_POST['step']=='selectcounty'){
	//save value to session
	$_SESSION['selectcounty']=$_POST['selectcounty'];
	Header("Location:./questionx.php");
	exit;
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
		请选择一个县（市、区）进行评价。
	</p>

	<div class=main>
		<form id="user_login" action="" method="post" onsubmit="return checkMust(['selectcounty']);">
			<p class="center sub_title" id=selectcounty_error>
				<br>
				<label><input type=radio name=selectcounty value=1 />三河市</label>&nbsp;&nbsp;&nbsp;
				<label><input type=radio name=selectcounty value=2 />大厂县</label><br><br>
				<label><input type=radio name=selectcounty value=3 />香河县</label>&nbsp;&nbsp;&nbsp;
				<label><input type=radio name=selectcounty value=4 />广阳区</label><br><br>
				<label><input type=radio name=selectcounty value=5 />安次区</label>&nbsp;&nbsp;&nbsp;
				<label><input type=radio name=selectcounty value=6 />永清县</label><br><br>
				<label><input type=radio name=selectcounty value=7 />固安县</label>&nbsp;&nbsp;&nbsp;
				<label><input type=radio name=selectcounty value=8 />霸州市</label><br><br>
				<label><input type=radio name=selectcounty value=9 />文安县</label>&nbsp;&nbsp;&nbsp;
				<label><input type=radio name=selectcounty value=10 />大城县</label><br>
			</p>
			<br>
			<p class="red center">*注：每个手机号只限评价一个选项。</p>
			<br>
			<input type=hidden name=step value=selectcounty />
			<div class=center><input class=btn type="submit" value="下一步" /></div>
			<!-- <input class=btn type="button" value="下一步" onClick='location.href = "questionx.html";' /> -->
		</form>
	</div>
</body>
</html>