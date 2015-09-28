<?php
header ( 'Content-type:text/html;charset=utf-8' );
define('UNIONPAY_PATH',  dirname(__FILE__));
include_once UNIONPAY_PATH.'/lib/common.php';
include_once UNIONPAY_PATH.'/lib/SDKConfig.php';
include_once UNIONPAY_PATH.'/lib/secureUtil.php';
include_once UNIONPAY_PATH.'/lib/httpClient.php';
include_once UNIONPAY_PATH.'/lib/log.class.php';

// 初始化日志
//
$log = new PhpLog ( SDK_LOG_FILE_PATH, "PRC", SDK_LOG_LEVEL );

$log->LogInfo ( "===========处理后台请求开始============" );


$params = array(
	'version' => '5.0.0',		//版本号
	'encoding' => 'utf-8',		//编码方式
	'certId' => getSignCertId (),	//证书ID	
	'signMethod' => '01',		//签名方法
	'txnType' => '00',		//交易类型	
	'txnSubType' => '00',		//交易子类
	'bizType' => '000201',		//业务类型
	'accessType' => '0',		//接入类型
	'channelType' => '08',		//渠道类型
	'orderId' => '20151443081599',	//查询的交易的订单号
	'merId' => '826340173990002',	//商户代码，请修改为自己的商户号
	'txnTime' => '20150924160056',	//查询的交易的订单发送时间 必须和交易中的订单发送时间保持一致
);
// 签名

sign ( $params );
echo "请求：" . getRequestParamString ( $params );
$log->LogInfo ( "后台请求地址为>" . SDK_SINGLE_QUERY_URL );
// 发送信息到后台
$result = sendHttpRequest ( $params, SDK_SINGLE_QUERY_URL );
$log->LogInfo ( "后台返回结果为>" . $result );

echo "应答：" . $result;

//返回结果展示
$result_arr = coverStringToArray ( $result );
echo verify ( $result_arr ) ? '验签成功' : '验签失败';
