<?php
	// ######(以下配置为PM环境：入网测试环境用，生产环境配置见文档说明)#######
	
	// cvn2加密 1：加密 0:不加密
	define('SDK_CVN2_ENC',  0);
	// 有效期加密 1:加密 0:不加密
	define('SDK_DATE_ENC',  0);
	// 卡号加密 1：加密 0:不加密
	define('SDK_PAN_ENC',  0);;
	
	// 签名证书路径
	define('SDK_SIGN_CERT_PATH',  UNIONPAY_PATH.'/certs/PM_700000000000001_acp.pfx');
	
	// 签名证书密码
	 define('SDK_SIGN_CERT_PWD',  '119118');
	
	// 验签证书
	define('SDK_VERIFY_CERT_PATH',  UNIONPAY_PATH.'/certs/UpopRsaCert.cer');
	
	// 密码加密证书
	define('SDK_ENCRYPT_CERT_PATH',  UNIONPAY_PATH.'/certs/verify_sign_acp.cer');
	
	// 验签证书路径
	define('SDK_VERIFY_CERT_DIR',  UNIONPAY_PATH.'/certs');
	
	// 前台请求地址
	define('SDK_FRONT_TRANS_URL',  'https://gateway.95516.com/gateway/api/frontTransReq.do');
	
	// 后台请求地址
	define('SDK_BACK_TRANS_URL',  'https://gateway.95516.com/gateway/api/backTransReq.do');
	
	// 批量交易
	define('SDK_BATCH_TRANS_URL',  'https://gateway.95516.com/gateway/api/batchTrans.do');
	
	//单笔查询请求地址
	define('SDK_SINGLE_QUERY_URL',  'https://gateway.95516.com/gateway/api/backTransReq.do');
	
	//文件传输请求地址
	define('SDK_FILE_QUERY_URL',  'https://filedownload.95516.com/');
	
	//有卡交易地址
	define('SDK_CARD_REQUEST_URL',  'https://gateway.95516.com/gateway/api/cardTransReq.do');
	
	//App交易地址
	define('SDK_APP_REQUEST_URL',  'https://gateway.95516.com/gateway/api/appTransReq.do');
	
	// 前台通知地址 (商户自行配置通知地址)
	define('SDK_FRONT_NOTIFY_URL',  'http://localhost/front_notify');
	// 后台通知地址 (商户自行配置通知地址)
	define('SDK_BACK_NOTIFY_URL',  'http://localhost/back_notify');
	
	//文件下载目录 
	define('SDK_FILE_DOWN_PATH',  UNIONPAY_PATH.'/file');
	
	//日志 目录 
	define('SDK_LOG_FILE_PATH',  UNIONPAY_PATH.'/logs');
	
	//日志级别
	define('SDK_LOG_LEVEL',  'INFO');
