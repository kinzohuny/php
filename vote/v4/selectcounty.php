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
</head>
<body>
	<p class=title align=center>
		请选择一个县（市、区）进行评价。
	</p>

	<div class=main>
		<form id="user_login" action="" method="post">
		
			<p class="center select"><label><input type=radio name=selectcounty value=1 /><b>三河市</b></label></p>
			<p class="center select"><label><input type=radio name=selectcounty value=2 /><b>大厂县</b></label></p>
			<p class="center select"><label><input type=radio name=selectcounty value=3 /><b>香河县</b></label></p>
			<p class="center select"><label><input type=radio name=selectcounty value=4 /><b>广阳区</b></label></p>
			<p class="center select"><label><input type=radio name=selectcounty value=5 /><b>安次区</b></label></p>
			<p class="center select"><label><input type=radio name=selectcounty value=6 /><b>永清县</b></label></p>
			<p class="center select"><label><input type=radio name=selectcounty value=7 /><b>固安县</b></label></p>
			<p class="center select"><label><input type=radio name=selectcounty value=8 /><b>霸州市</b></label></p>
			<p class="center select"><label><input type=radio name=selectcounty value=9 /><b>文安县</b></label></p>
			<p class="center select"><label><input type=radio name=selectcounty value=10 /><b>大城县</b></label></p>
			<p class=red>*注：每个手机号只限评价一个选项。</p>
			<br>
			<input type=hidden name=step value=selectcounty />
			<div class=center><input class=btn type="submit" value="下一步" /></div>
			<!-- <input class=btn type="button" value="下一步" onClick='location.href = "questionx.html";' /> -->
		</form>
	</div>
</body>
</html>