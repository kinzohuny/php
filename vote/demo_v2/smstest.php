<?php

require './suyusms/Autoloader.php';

$appkey="23256342";
$secret="354b0a1bcba36a8f803ec7b54f02dfc8";

$c = new TopClient;
$c->appkey = $appkey;
$c->secretKey = $secret;
$req = new OpenSmsSendvercodeRequest;
$send_ver_code_request = new SendVerCodeRequest;
$send_ver_code_request->expire_time="600";
$send_ver_code_request->session_limit="60";
$send_ver_code_request->device_limit="5";
$send_ver_code_request->device_limit_in_time="3600";
$send_ver_code_request->mobile_limit="5";
$send_ver_code_request->session_limit_in_time="3600";
$send_ver_code_request->mobile_limit_in_time="3600";
/* $send_ver_code_request->template_id="123"; */
$send_ver_code_request->signature_id="374";
$send_ver_code_request->mobile="13601243558";
$send_ver_code_request->ver_code_length="6";
$req->setSendVerCodeRequest(json_encode($send_ver_code_request));
$resp = $c->execute($req);
echo "OK";
?>
