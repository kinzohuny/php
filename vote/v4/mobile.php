<?php
session_start();
date_default_timezone_set('PRC');
require './suyusms/Autoloader.php';

$appkey="23256342";
$secret="354b0a1bcba36a8f803ec7b54f02dfc8";

//验证验证码是否正确
if(isset($_POST["code"])){
	//验证验证码正确
	$code=$_POST["code"];
	if (isset($_SESSION['temp_mobile']) && !empty($code) && strlen($code)==6 ) {
//		$_SESSION['mobile']=$_SESSION['temp_mobile'];
// 		echo '{"success":true,"msg":""}';
		$result = checkcode($_SESSION['temp_mobile'],$code);
		if($result){
			$result = (array)$result;
			if($result['successful']=="true"){
				$_SESSION['mobile']=$_SESSION['temp_mobile'];
				echo '{"success":true,"msg":""}';
			}else{
				echo '{"success":false,"msg":"'.$result['message'].'"}';
			}
			
		}else{
			echo '{"success":false,"msg":"手机验证码不正确！"}';
		}
	}else {
		echo '{"success":false,"msg":"手机验证码不正确！"}';
	}
}elseif(isset($_POST["mobile"])){
	if(checkValidate($_POST["validate"])){
		$temp_mobile=$_POST["mobile"];
		if (isMobile($temp_mobile)) {
			if(!existMobile($temp_mobile)){
 				$_SESSION['temp_mobile']=$temp_mobile;
// 				echo '{"success":true,"msg":""}';
				$result = sendcode($temp_mobile);
				if($result){
					$result = (array)$result;
					if($result['successful']=="true"){
						echo '{"success":true,"msg":""}';
					}else{
						echo '{"success":false,"msg":"'.$result['message'].'"}';
					}
				}else{
					echo '{"success":false,"msg":"发送失败！"}';
				}
			}else{
				echo '{"success":false,"msg":"该手机号已填写过该问卷！"}';
			}
		}else {
			echo '{"success":false,"msg":"手机号格式不正确！"}';
		}
	}else{
		echo '{"success":false,"v_msg":"图片校验码不正确！"}';
	}
	
	

}else{
	echo '{"success":false,"msg":"非法请求"}';
}

//发送手机验证码
function sendcode($mobile) {
	$c = new TopClient;
	$c->appkey = $GLOBALS['appkey'];
	$c->secretKey = $GLOBALS['secret'];
	$req = new OpenSmsSendvercodeRequest;
	$send_ver_code_request = new SendVerCodeRequest;
	$send_ver_code_request->expire_time="300";
	$send_ver_code_request->session_limit="1";
	$send_ver_code_request->session_limit_in_time="50";
//	$send_ver_code_request->device_limit="5";
//	$send_ver_code_request->device_limit_in_time="3600";
// 	$send_ver_code_request->mobile_limit="5";
// 	$send_ver_code_request->mobile_limit_in_time="3600";
	$send_ver_code_request->template_id="2712"; 
	$send_ver_code_request->signature_id="374";
	$send_ver_code_request->mobile=$mobile;
	$send_ver_code_request->ver_code_length="6";
	$req->setSendVerCodeRequest(json_encode($send_ver_code_request));
	info_log("sendCode_req:mobile=".$mobile);
	$resp = $c->execute($req);
	info_log("sendCode_resp:".$resp->result->asXML());
	return $resp->result;
}
//验证手机验证码
function checkcode($mobile,$code){
	$c = new TopClient;
	$c->appkey = $GLOBALS['appkey'];
	$c->secretKey = $GLOBALS['secret'];
	$req = new OpenSmsCheckvercodeRequest;
	$check_ver_code_request = new CheckVerCodeRequest;
	$check_ver_code_request->check_fail_limit="9";
	$check_ver_code_request->check_success_limit="3"; 
	$check_ver_code_request->ver_code=$code;
	$check_ver_code_request->mobile=$mobile;
	$req->setCheckVerCodeRequest(json_encode($check_ver_code_request));
	info_log("checkCode_req:mobile=".$mobile.",code=".$code);
	$resp = $c->execute($req); 
	info_log("checkCode_resp:".$resp->result->asXML());
	return $resp->result;
}

/**
* 验证手机号是否正确
* @param INT $mobile
*/
 function isMobile($mobile) {
    if (!is_numeric($mobile)) {
        return false;
    }
    return preg_match('#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#', $mobile) ? true : false;
 }
 
 //手机号是否已存在
 function existMobile($temp_mobile){
 	$con = mysql_connect("localhost","root","");
 	if (!$con){
 		die('Could not connect: ' . mysql_error());
 	}
 	mysql_select_db("vote", $con);
 	$result = mysql_query("select mobile from vote_baseinfo where mobile='".$temp_mobile."' limit 1;");
 	if (!$result){
 		die('Error: ' . mysql_error());
 	}
 	$exist = (mysql_num_rows($result));
 	mysql_close($con);
 	return $exist;
 }
 
 function checkValidate($validate){
 	if(isset($validate) && strtolower($_SESSION['authnum_session'])==strtolower($validate)){
 		$result = true;
 	}else{
 		$result = false;
 	}
 	$_SESSION['authnum_session']=null;
 	return $result;
 }
 
 function checkToken(){
 	if(isset($_POST['token']) && isset($_SESSION['token']) && isset($_POST['token']) == isset($_SESSION['token'])){
 		return true;
 	}else{
 		return false;
 	}
 }
 
 function info_log($log){
 	error_log(date('[y-m-d h:i:s]',time()).$log."\r\n", 3, "./log/sms.log");
 }
?>

