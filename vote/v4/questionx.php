<?php
session_start();

if(!isset($_SESSION['mobile'])){
	Header("Location:./index.php");
	exit;
}elseif(isset($_SESSION['finished'])){
	Header("Location:./thanks.html");
	exit;
}elseif(!isset($_SESSION['selectcounty'])){
	Header("Location:./selectcounty.php");
	exit;
}elseif(isset($_POST['step'])&&$_POST['step']=='questionx'){
	//save value to session
	saveQuestionx();
	
	//不允许再次填写
	//$_SESSION['finished']=true;
	//允许换手机号再填
	session_destroy();
	
	Header("Location:./thanks.html");
	exit;
}

function saveQuestionx(){
	$con = mysql_connect("localhost","root","");
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}
	mysql_query("set character set 'utf-8'");//读库
	mysql_query("set names 'utf-8'");//写库
	mysql_select_db("vote", $con);
	
	$baseinfo_sql="insert into `vote`.`vote_baseinfo` (`mobile`, `sex`, `age`, `profession`, `city`, `county`, `created`, `ip`)values ('".$_SESSION['mobile']."', '".$_SESSION['sex']."', '".$_SESSION['age']."', '".$_SESSION['profession']."', 2, '".$_SESSION['selectcounty']."', now(), '".getip()."');";
	if(!mysql_query($baseinfo_sql)){
		die('Error: ' . mysql_error()."<br>".$baseinfo_sql);
	}
	
	$questionx_sql="insert into `vote`.`vote_questionx` (`mobile`, `county`, `x01`, `x02`, `x03`, `x04`, `x05`, `x06`, `suggest0`, `x11`, `x12`, `x13`, `x14`, `x15`, `x16`, `x17`, `x18`, `suggest1`, `created`)values ('".$_SESSION['mobile']."', '".$_SESSION['selectcounty']."', '".$_POST['x01']."', '".$_POST['x02']."', '".$_POST['x03']."', '".$_POST['x04']."', '".$_POST['x05']."', '".$_POST['x06']."', '".$_POST['suggest0']."', '".$_POST['x11']."', '".$_POST['x12']."', '".$_POST['x13']."', '".$_POST['x14']."', '".$_POST['x15']."', '".$_POST['x16']."', '".$_POST['x17']."', '".$_POST['x18']."', '".$_POST['suggest1']."', now());";
	if (!mysql_query($questionx_sql)){
		die('Error: ' . mysql_error()."<br>".$questionx_sql);
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
					if (false !== strpos($ip, ','))
						$ip = reset(explode(',', $ip));
						return $ip;
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
<body bgcolor=white lang=ZH-CN>

	<div class=main>
		<form id="user_login" action="" method="post">

			<p class=title align=center>县（市、区）党政领导班子评价</p>
			<p class=sub_title><b>一、总体评价</b><em class=red>*必填</em></p>
			<p class="select txt"><label><input type=radio name="x01" value=4 />优秀</label>&nbsp;<label><input type=radio name="x01" value=3 />良好</label>&nbsp;<label><input type=radio name="x01" value=2 />一般</label>&nbsp;<label><input type=radio name="x01" value=1 />较差</label>&nbsp;<label><input type=radio name="x01" value=0 />不了解</label>&nbsp;</p>
			<p class=sub_title><b>二、具体评价</b></p>                                                                                                                                                                                                                  
			<p class=sub_sub_title><b class=blue>1、您认为本县（市、区）党政领导班子团结协作、共谋发展的状况如何？</b><em class=red>*必填</em></p>                                                                                                                          
			<p class="select txt"><label><input type=radio name="x02" value=4 />优秀</label>&nbsp;<label><input type=radio name="x02" value=3 />良好</label>&nbsp;<label><input type=radio name="x02" value=2 />一般</label>&nbsp;<label><input type=radio name="x02" value=1 />较差</label>&nbsp;<label><input type=radio name="x02" value=0 />不了解</label>&nbsp;</p>
			<p class=sub_sub_title><b class=blue>2、您认为本县（市、区）党政领导班子干事创业的精神状态如何？</b><em class=red>*必填</em></p>                                                                                                                                
			<p class="select txt"><label><input type=radio name="x03" value=4 />优秀</label>&nbsp;<label><input type=radio name="x03" value=3 />良好</label>&nbsp;<label><input type=radio name="x03" value=2 />一般</label>&nbsp;<label><input type=radio name="x03" value=1 />较差</label>&nbsp;<label><input type=radio name="x03" value=0 />不了解</label>&nbsp;</p>
			<p class=sub_sub_title><b class=blue>3、您认为本县（市、区）党政领导班子谋划发展、引领发展的思路和举措如何？</b><em class=red>*必填</em></p>                                                                                                                    
			<p class="select txt"><label><input type=radio name="x04" value=4 />优秀</label>&nbsp;<label><input type=radio name="x04" value=3 />良好</label>&nbsp;<label><input type=radio name="x04" value=2 />一般</label>&nbsp;<label><input type=radio name="x04" value=1 />较差</label>&nbsp;<label><input type=radio name="x04" value=0 />不了解</label>&nbsp;</p>
			<p class=sub_sub_title><b class=blue>4、您认为本县（市、区）党政领导班子抓工作的力度和成效如何？</b><em class=red>*必填</em></p>                                                                                                                                
			<p class="select txt"><label><input type=radio name="x05" value=4 />优秀</label>&nbsp;<label><input type=radio name="x05" value=3 />良好</label>&nbsp;<label><input type=radio name="x05" value=2 />一般</label>&nbsp;<label><input type=radio name="x05" value=1 />较差</label>&nbsp;<label><input type=radio name="x05" value=0 />不了解</label>&nbsp;</p>
			<p class=sub_sub_title><b class=blue>5、您认为本县（市、区）党政领导班子党风廉政和廉洁自律情况如何？</b><em class=red>*必填</em></p>                                                                                                                            
			<p class="select txt"><label><input type=radio name="x06" value=4 />优秀</label>&nbsp;<label><input type=radio name="x06" value=3 />良好</label>&nbsp;<label><input type=radio name="x06" value=2 />一般</label>&nbsp;<label><input type=radio name="x06" value=1 />较差</label>&nbsp;<label><input type=radio name="x06" value=0 />不了解</label>&nbsp;</p>
			<p class=sub_title><b>三、对本县（市、区）党政领导班子和市管干部的意见和建议</b></p>
			<p class=txt><textarea name=suggest0 id=suggesttext placeholder="请输入您的意见和建议！"></textarea></p>
			
			<p class=title align=center>县（市、区）民生改善社会调查</p>
			<p class=sub_sub_title><b class=blue>1、您认为本县（市、区）收入水平如何？</b><em class=red>*必填</em></p>
			<p class="select txt"><label><input type=radio name="x11" value=4 />满意</label>&nbsp;<label><input type=radio name="x11" value=3 />有改善</label>&nbsp;<label><input type=radio name="x11" value=2 />没变化</label>&nbsp;<label><input type=radio name="x11" value=1 />不如以前</label>&nbsp;<label><input type=radio name="x11" value=0 />不了解</label>&nbsp;</p>
			<p class=sub_sub_title><b class=blue>2、您认为本县（市、区）物价水平如何？</b><em class=red>*必填</em></p>                                                                                                                                                          
			<p class="select txt"><label><input type=radio name="x12" value=4 />满意</label>&nbsp;<label><input type=radio name="x12" value=3 />有改善</label>&nbsp;<label><input type=radio name="x12" value=2 />没变化</label>&nbsp;<label><input type=radio name="x12" value=1 />不如以前</label>&nbsp;<label><input type=radio name="x12" value=0 />不了解</label>&nbsp;</p>
			<p class=sub_sub_title><b class=blue>3、您认为本县（市、区）就医方便程度如何？</b><em class=red>*必填</em></p>                                                                                                                                                      
			<p class="select txt"><label><input type=radio name="x13" value=4 />满意</label>&nbsp;<label><input type=radio name="x13" value=3 />有改善</label>&nbsp;<label><input type=radio name="x13" value=2 />没变化</label>&nbsp;<label><input type=radio name="x13" value=1 />不如以前</label>&nbsp;<label><input type=radio name="x13" value=0 />不了解</label>&nbsp;</p>
			<p class=sub_sub_title><b class=blue>4、您认为本县（市、区）就业状况如何？</b><em class=red>*必填</em></p>                                                                                                                                                          
			<p class="select txt"><label><input type=radio name="x14" value=4 />满意</label>&nbsp;<label><input type=radio name="x14" value=3 />有改善</label>&nbsp;<label><input type=radio name="x14" value=2 />没变化</label>&nbsp;<label><input type=radio name="x14" value=1 />不如以前</label>&nbsp;<label><input type=radio name="x14" value=0 />不了解</label>&nbsp;</p>
			<p class=sub_sub_title><b class=blue>5、您认为本县（市、区）就学方便程度如何？</b><em class=red>*必填</em></p>                                                                                                                                                      
			<p class="select txt"><label><input type=radio name="x15" value=4 />满意</label>&nbsp;<label><input type=radio name="x15" value=3 />有改善</label>&nbsp;<label><input type=radio name="x15" value=2 />没变化</label>&nbsp;<label><input type=radio name="x15" value=1 />不如以前</label>&nbsp;<label><input type=radio name="x15" value=0 />不了解</label>&nbsp;</p>
			<p class=sub_sub_title><b class=blue>6、您认为本县（市、区）交通便捷程度如何？</b><em class=red>*必填</em></p>                                                                                                                                                      
			<p class="select txt"><label><input type=radio name="x16" value=4 />满意</label>&nbsp;<label><input type=radio name="x16" value=3 />有改善</label>&nbsp;<label><input type=radio name="x16" value=2 />没变化</label>&nbsp;<label><input type=radio name="x16" value=1 />不如以前</label>&nbsp;<label><input type=radio name="x16" value=0 />不了解</label>&nbsp;</p>
			<p class=sub_sub_title><b class=blue>7、您认为本县（市、区）社会治安状况如何？</b><em class=red>*必填</em></p>                                                                                                                                                      
			<p class="select txt"><label><input type=radio name="x17" value=4 />满意</label>&nbsp;<label><input type=radio name="x17" value=3 />有改善</label>&nbsp;<label><input type=radio name="x17" value=2 />没变化</label>&nbsp;<label><input type=radio name="x17" value=1 />不如以前</label>&nbsp;<label><input type=radio name="x17" value=0 />不了解</label>&nbsp;</p>
			<p class=sub_sub_title><b class=blue>8、您认为本县（市、区）环境质量情况如何？</b><em class=red>*必填</em></p>                                                                                                                                                      
			<p class="select txt"><label><input type=radio name="x18" value=4 />满意</label>&nbsp;<label><input type=radio name="x18" value=3 />有改善</label>&nbsp;<label><input type=radio name="x18" value=2 />没变化</label>&nbsp;<label><input type=radio name="x18" value=1 />不如以前</label>&nbsp;<label><input type=radio name="x18" value=0 />不了解</label>&nbsp;</p>
			<p class="sub_sub_title"><b>9、对本县（市、区）民生改善情况的意见和建议</b></p>
			<p class=txt><textarea name=suggest1 id=suggesttext placeholder="请输入您的意见和建议！"></textarea></p>
			<br>
			<input type=hidden name=step value=questionx />
			<div class=center><input class=btn type="submit" value="提交问卷" /></div>
			<!-- <input class=btn type="button" value="提交问卷" onClick='location.href = "thanks.html";' /> -->
		</form>
	</div>
	<script type="text/javascript">
	$(function(){
		$("#suggesttext").keyup(function(){
			if($(this).val().length > 999){
				$(this).val($(this).val().substring(0,1000));
			}
		});
	});
	</script>
</body>
</html>