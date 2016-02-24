<?php
session_start();

if(!isset($_SESSION['mobile'])){
	Header("Location:./index.php");
	exit;
}elseif(isset($_SESSION['finished'])){
	Header("Location:./thanks.html");
	exit;
}elseif(isset($_POST['step'])&&$_POST['step']=='baseinfo'){
	//save value to session
	$_SESSION['sex']=$_POST['sex'];
	$_SESSION['age']=$_POST['age'];
	$_SESSION['profession']=$_POST['profession'];
	
	Header("Location:./select.php");
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<META NAME="save"  CONTENT="history">
	<style>
		input{behavior:url(#default#savehistory);}
	</style>
	<title>廊坊市干部考核社会评价调查系统</title>
	<link href="./css/main.css" type="text/css" rel="stylesheet">
	<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
	<p class=title align=center>
		欢迎进入廊坊市干部考核社会评价调查系统
	</p>

	<div class=main>
		<form id="user_login" action="" method="post">
		
			<p class=sub_title><b>参评人基本信息。请实事求是、完整地填写个人信息。</b></p>
			<p class=sub_sub_title><b class=blue>1、性别：</b><em class=red>*必填</em>&nbsp;<label><input type=radio name=sex value=1 />男</label>&nbsp;<label><input type=radio name=sex value=2 />女</label></p>
			<p class=sub_sub_title><b class=blue>2、年龄：</b><em class=red>*必填</em>&nbsp;<label><input type=radio name=age value=1 />25岁以下</label>&nbsp;<label><input type=radio name=age value=2 />26到60岁</label>&nbsp;<label><input type=radio name=age value=3 />61岁以上</label></p>
			<p class=sub_sub_title><b class=blue>3、职业：</b><em class=red>*必填</em>&nbsp;<label><input type=radio name=profession value=1 />行政机关</label>&nbsp;<label><input type=radio name=profession value=2 />事业单位</label>&nbsp;<label><input type=radio name=profession value=3 />企业</label>&nbsp;<label><input type=radio name=profession value=4 />自由职业者</label>&nbsp;<label><input type=radio name=profession value=5 />学生</label>&nbsp;<label><input type=radio name=profession value=6 />其他</label></p>
			<br>
			<input type=hidden name=step value=baseinfo />
			<div class=center><input class=btn type="submit" value="下一步" /></div>
			<!-- <input class=btn type="button" value="下一步" onClick='location.href = "select.html";' /> -->
		</form>
	</div>
</body>
</html>