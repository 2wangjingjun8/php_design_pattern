<?php
header("Content-type:text/html;charset=utf-8");
/**
* 虎
*/
abstract class Tiger
{
	
	public abstract function climb();
}

/**
* x虎
*/
class Xtiger extends Tiger
{
	public function climb()
	{
		echo "摔下来<br>";
	}
}
/**
* m虎
*/
class Mtiger extends Tiger
{
	public function climb()
	{
		echo "爬上去树顶<br>";
	}
}

/**
* 客户端
*/
class Client
{
	
	public static function call(Tiger $animal)
	{
		$animal->climb();
	}
}

Client::call(new Xtiger());
Client::call(new Mtiger());
Client::call(new Mtiger());
Client::call(new Mtiger());


