<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//https
$url = "https://vr12.weilian.cn/account_auth_admin/personal-api.login?account=sl343&password=123456&enterpriseCode=SHANGLONG&clientIp=10.1.29.15&appCode=APP&encryptCode=123456";
$ssl = substr($url, 0, 8) == "https://" ? TRUE : FALSE;

var_dump($ssl);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// 		curl_setopt($ch, CURLOPT_POST, 1);
// 		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPGET, 1);
if ($ssl)
{
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 信任任何证书  
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1); // 检查证书中是否设置域名 
}
$output = curl_exec($ch);
curl_close($ch);
var_dump($output);
exit;



 //初始化
$url = "http://pay.weilian.cn/payment/notify?pay_no=P170906001505335&se_payment_code=69116f8c16ba8ed4355f709a1b4317a0&created_ts=1505031574&se_sign=d89a36ba06872e8d22a3a90b0d829ac1";
$url ="http://www.baidu.com";

$url = "http://116.10.197.135:5566/scn-api?method=spTicketsService.findticketid&ticket_no=123&sessionId=a7ba18f5ea6a4704a2d49a6c33dc9c91";

/*
$curl = curl_init();
//设置抓取的url
curl_setopt($curl, CURLOPT_URL, $url);
//设置头文件的信息作为数据流输出
curl_setopt($curl, CURLOPT_HEADER, 1);
//设置获取的信息以文件流的形式返回，而不是直接输出。
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//执行命令
$data = curl_exec($curl);
//关闭URL请求
curl_close($curl);
//显示获得的数据
print_r($data);
*/

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPGET, 1);
$output = curl_exec($ch);
print_r($output);
exit;

//post
$ch = curl_init ();
curl_setopt ( $ch, CURLOPT_URL, $url );
curl_setopt ( $ch, CURLOPT_POST, 1 );
curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt ( $ch, CURLOPT_POSTFIELDS, json_encode($data) );
// 	    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
// 	        'Content-Type: application/json; charset=utf-8',
// 	        'Content-Length: ' . strlen(json_encode($data)))
// 	    );
ob_start();
$output = curl_exec ( $ch );
curl_close ( $ch );