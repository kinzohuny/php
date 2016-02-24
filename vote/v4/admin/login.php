<?php
	session_start();
	
	if(isset($_SESSION['admin'])){
		Header("Location:./index.php");
		exit;
	}elseif(isset($_POST['username'])&&isset($_POST['password'])){
		if(checkUser($_POST['username'],$_POST['password'])){
			$_SESSION['admin']=$_POST['username'];
			logUser($_POST['username']);
			Header("Location:./index.php");
			exit;
		}else{
			$msg="用户名或密码错误";
		}
	}
	
	function logUser($username){
		$con = mysql_connect("localhost","root","");
		if (!$con){
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("vote", $con);
		$result = mysql_query("update vote_admin set logined=now(),ip='".getip()."' where name='".$username."';");
		if (!$result){
			die('Error: ' . mysql_error());
		}
		mysql_close($con);
	}
	
	function getip() {
		$unknown = 'unknown';
		if ( isset($_SERVER['HTTP_X_FORWARDED_FOR'])
				&& $_SERVER['HTTP_X_FORWARDED_FOR']
				&& strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'],
						$unknown) ) {
							$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
						} elseif ( isset($_SERVER['REMOTE_ADDR'])
								&& $_SERVER['REMOTE_ADDR'] &&
								strcasecmp($_SERVER['REMOTE_ADDR'], $unknown) ) {
									$ip = $_SERVER['REMOTE_ADDR'];
						}
						if (false !== strpos($ip, ',')){
							$ip = reset(explode(',', $ip));
						}
						return $ip;
	}
	
	function checkUser($username,$password){
		$con = mysql_connect("localhost","root","");
		if (!$con){
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("vote", $con);
		$result = mysql_query("select name from vote_admin where name='".$username."' and pswd=md5('".$password."') limit 1;");
		if (!$result){
			die('Error: ' . mysql_error());
		}
		$exist = (mysql_num_rows($result));
		mysql_close($con);
		return $exist;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' /> 
	<title>登录</title> 
</head>
<body>
	<form method=post>
		<table>
			<tr><td>用户名：</td><td><input name=username></td></tr>
			<tr><td>密码：</td><td><input type=password name=password></td></tr>
		</table>
		<input type=submit value="提交"><em><?php if(isset($msg)) echo $msg; ?></em>
	</form>
</body>
</html>