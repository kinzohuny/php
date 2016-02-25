<?php
session_start();

if(isset($_SESSION['mobile'])){
	Header("Location:./baseinfo.php");
	exit;
}elseif(isset($_SESSION['finished'])){
	Header("Location:./thanks.html");
	exit;
}else{
	//$_SESSION['token']=md5(time() . mt_rand(1,1000000));

}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>廊坊市干部考核社会评价调查系统</title>
<link href="./css/main.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="./js/main.js"></script>
<script type="text/javascript" src="./js/check.js"></script>
</head>
<body>
<p class=title align=center>
廊坊市干部考核社会评价调查系统
</p>
<div class="main">
<br><br>
<table class=mobile>
<tr><td><p class=sub_title>手机号码：</p></td><td><input class=sub_title id="mobile" onkeyup="numCtrl(this,11);" value="<?php if(isset($_SESSION['temp_mobile'])){echo $_SESSION['temp_mobile'];} ?>"/></td><td><input class=sub_title id="second" type="button"  value="发送验证码" /></td></tr>
<tr><td></td><td colspan=2><em class=error id=mobile_error></em></td></tr>
<tr><td><p class=sub_title>图片校验码：</p></td><td><input class=sub_title id="validate" onkeyup="charCtrl(this,4);" /></td><td><img class=sub_title id="validate_img" title="点击刷新" src="captcha.php" align="absbottom" onclick="this.src='captcha.php?'+Math.random();"></img></td></tr>
<tr><td></td><td colspan=2><em class=error id=validate_error></em></td></tr>
<tr><td><p class=sub_title>手机验证码：</p></td><td><input class=sub_title id="code" onkeyup="numCtrl(this,6);" /></td></tr>
<tr><td></td><td colspan=2><em class=error id=code_error></em></td></tr>
</table>
<br><br>
<div class=center><input class=btn id="checkcode" type="button" value="进入问卷" /></div>
</div>
</body>
</html>