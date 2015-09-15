<?php
		define('UNIONPAY_PATH',  dirname(__FILE__));
		
		include_once UNIONPAY_PATH.'/lib/common.php';
		include_once UNIONPAY_PATH.'/lib/SDKConfig.php';
		include_once UNIONPAY_PATH.'/lib/secureUtil.php';
		include_once UNIONPAY_PATH.'/lib/httpClient.php';
		include_once UNIONPAY_PATH.'/lib/log.class.php';
		
    	//PageRetUrl 返回支付后的商户网站页面
		$pagereturl = $_GET['front_url'];
		
		/**
		 *	以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己需要，按照技术文档编写。该代码仅供参考
		 */
		// 初始化日志
		$log = new PhpLog ( SDK_LOG_FILE_PATH, "PRC", SDK_LOG_LEVEL );
		$log->LogInfo ( "============处理前台请求开始===============" );
		
		// 初始化日志
		$params = array(
				'version' => '5.0.0',						//版本号
				'encoding' => 'utf-8',						//编码方式
				'certId' => getSignCertId (),				//证书ID  
				'txnType' => '01',							//交易类型	
				'txnSubType' => '01',						//交易子类
				'bizType' => '000201',						//业务类型
				'frontUrl' =>  SDK_FRONT_NOTIFY_URL,  		//前台通知地址
				'backUrl' => SDK_BACK_NOTIFY_URL,			//后台通知地址	
				'signMethod' => '01',						//签名方法
				'channelType' => '08',						//渠道类型
				'accessType' => '0',						//接入类型
				'merId' => '826340173990002',				//商户代码
				'orderId' => date('Y').time(),						//商户订单号
				'txnTime' => date('YmdHis'),					//订单发送时间
				'txnAmt' => 1,						//交易金额 单位分
				'currencyCode' => '156'				//交易币种	
		);
		
		// 签名
		sign ( $params );
		
		/*手机WAP支付方式*/
		// 前台请求地址
		$front_uri = SDK_FRONT_TRANS_URL;
		$log->LogInfo ( "前台请求地址为>" . $front_uri );
		// 构造 自动提交的表单
		$html_form = create_html ( $params, $front_uri );
		$log->LogInfo ( "-------前台交易自动提交表单>--begin----" );
		$log->LogInfo ( $html_form );
		$log->LogInfo ( "-------前台交易自动提交表单>--end-------" );
		$log->LogInfo ( "============处理前台请求 结束===========" );
		echo $html_form;