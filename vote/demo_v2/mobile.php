<?php
session_start();
require './suyusms/Autoloader.php';

$appkey="23256342";
$secret="354b0a1bcba36a8f803ec7b54f02dfc8";
$errorMsg="";

$mobile=$_POST["phonenum"];
$code=$_POST["code"];

//验证验证码是否正确
if(isset($_SESSION['mobile']) && isset($code)){
	if (!empty($code) && strlen($code)==6 ) {
		if(checkcode($_SESSION['mobile'],$code)){
			$_SESSION['isBinded']=true;
			echo '{"success":"true","msg":""}';
		}else{
			echo '{"success":"false","msg":"手机验证码不正确！"}';
		}
	}else {
		echo '{"success":"false","msg":"手机验证码不正确！"}';
	}
//发送验证码短信
}else if(isset($mobile)){
	if (isMobile($mobile)) {
		$_SESSION['mobile']=$mobile;
		//sendcode($mobile);
		echo '{"success":"true","msg":""}';
	}else {
		echo '{"success":"false","msg":"手机号格式不正确！"}';
	}
}else{
	
}

//发送手机验证码
function sendcode($mobile) {
	$c = new TopClient;
	$c->appkey = $GLOBALS['appkey'];
	$c->secretKey = $GLOBALS['secret'];
	$req = new OpenSmsSendvercodeRequest;
	$send_ver_code_request = new SendVerCodeRequest;
	$send_ver_code_request->expire_time="600";
	$send_ver_code_request->session_limit="60";
	$send_ver_code_request->session_limit_in_time="3600";
	$send_ver_code_request->device_limit="5";
	$send_ver_code_request->device_limit_in_time="3600";
	$send_ver_code_request->mobile_limit="5";
	$send_ver_code_request->mobile_limit_in_time="3600";
	// $send_ver_code_request->template_id="123"; 
	$send_ver_code_request->signature_id="374";
	$send_ver_code_request->mobile=$mobile;
	$send_ver_code_request->ver_code_length="6";
	$req->setSendVerCodeRequest(json_encode($send_ver_code_request));
	$resp = $c->execute($req);
}
//验证手机验证码
function checkcode($mobile,$code){
	if (!empty($code)) {
		/* $c = new TopClient;
		$c->appkey = $appkey;
		$c->secretKey = $secret;
		$req = new OpenSmsCheckvercodeRequest;
		$check_ver_code_request = new CheckVerCodeRequest;
		// $check_ver_code_request->check_fail_limit="123";
		// $check_ver_code_request->check_success_limit="123"; 
		$check_ver_code_request->ver_code=$code;
		$check_ver_code_request->mobile=$mobile;
		$req->setCheckVerCodeRequest(json_encode($check_ver_code_request));
		$resp = $c->execute($req); 
		return $resp->successful;*/
		return true;
	} else {
		return false;
	}
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
?>

