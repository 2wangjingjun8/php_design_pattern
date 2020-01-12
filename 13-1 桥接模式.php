<?php 
header("Content-type:text/html;charset=utf-8");

abstract class msg{
	protected $send = null;
	public function __construct($send){
		$this->send = $send;
	}
	abstract function msg($content);

	function send($to, $content){
		$content = $this->msg($content);
		$this->send->send($to, $content);
	}
}

/**
* 普通信
*/
class ZnMsg
{
	public function send($to, $content)
	{
		echo "给".$to."发送站内信：<br>".$content;
	}
}

/**
* email信
*/
class EmailMsg
{
	public function send($to, $content)
	{
		echo "给".$to."发送Email：<br>".$content;
	}
}

/**
* sms信
*/
class SmsMsg
{
	public function send($to, $content)
	{
		echo "给".$to."发送短信：<br>".$content;
	}
}

// 内容分为普通，加急，特急三种程度

/**
* 普通
*/
class CommonInfo extends msg
{
	
	public function msg($content)
	{
		return "普通：".$content."<br>";
	}
}

/**
* 加急
*/
class WarnInfo extends msg
{
	
	public function msg($content)
	{
		return "加急：".$content."<br>";
	}
}

/**
* 特急
*/
class DangerInfo extends msg
{
	
	public function msg($content)
	{
		return "特急：".$content."<br>";
	}
}

$DangerInfo = new DangerInfo(new EmailMsg());
$DangerInfo->send('小小','不要再去参加极限运动了');

$WarnInfo = new WarnInfo(new EmailMsg());
$WarnInfo->send('毛毛','马上过来办公室开会！');