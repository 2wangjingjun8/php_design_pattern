<?php 
header("Content-type:text/html;charset=utf-8");

interface msg{
	function send($to, $content);
}

/**
* 普通信
*/
class ZnMsg implements msg
{
	public function send($to, $content)
	{
		echo "给".$to."发送站内信：".$content;
	}
}

/**
* email信
*/
class EmailMsg implements msg
{
	public function send($to, $content)
	{
		echo "给".$to."发送Email：".$content;
	}
}

/**
* sms信
*/
class SmsMsg implements msg
{
	public function send($to, $content)
	{
		echo "给".$to."发送短信：".$content;
	}
}

// 内容分为普通，加急，特急三种程度
// ZnCommon ZnWarn ZnDanger
// EmailCommon EmailWarn EmailDanger
// SmsCommon SmsWarn SmsDanger

/**
 * 思考：
 * 消息的发送方式是一个变量
 * 消息的紧急程序又是一个变量
 * 为了不修改原来的类，必须要不断地增加新类
 */