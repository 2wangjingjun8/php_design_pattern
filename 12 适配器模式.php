<?php 
header("Content-type:text/html;charset=utf-8");

// 适配器模式

/**
* 查看天气接口
*/
class Tianqi
{
	public static function show(){
		$arr = array('tem'=>28,'wind'=>8,'sun'=>'windy','weekday'=>"周三");
		return serialize($arr);
	}
}


//php客户端调用
$b = unserialize(Tianqi::show());
echo "时间：".$b['weekday']."<br>";
echo "温度：".$b['tem']."<br>";
echo "风力：".$b['wind']."<br>";
echo "太阳：".$b['sun']."<br>";

// 突然来了一批Java程序员，需要获取天气接口数据，但是他们不识别序列化后的数据，这时候应该怎么办呢？

/**
* 增加适配器
*/
class ADdapterTianqi extends Tianqi
{
	public static function show()
	{
		$str = parent::show();
		$arr = unserialize($str);
		return json_encode($arr);
	}
}

// 适配器访问数据
echo "<br><br>适配器访问数据:<br>";
$b = json_decode(ADdapterTianqi::show(),true);
echo "时间：".$b['weekday']."<br>";
echo "温度：".$b['tem']."<br>";
echo "风力：".$b['wind']."<br>";
echo "太阳：".$b['sun']."<br>";
