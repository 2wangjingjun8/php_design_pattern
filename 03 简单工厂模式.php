<?php
header("Content-type:text/html;charset=utf-8");
/**
* 共同接口
*/
 interface db
{
	function conn();
}

/**
* mysql类
*/
class DbMysql implements db
{
	public function conn()
	{
		echo "连接上了mysql<br>";
	}
}

/**
* sqlite类
*/
class DbSqlite implements db
{
	public function conn()
	{
		echo "连接上了sqlite<br>";
	}
}

/**
* 
*/
class Factory
{
	public static function createDb($type)
	{
		if ($type == 'mysql') {
			$db = new DbMysql();
			return $db->conn();
		}elseif ($type == 'sqlite') {
			$db = new DbSqlite();
			return $db->conn();
		}else{
			return 'err:不支持该类型的数据库连接';
		}
	}
}

echo Factory::createDb('mysql');
echo Factory::createDb('sqlite');


