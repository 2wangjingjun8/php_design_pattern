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
		echo "连接上了mysql";
	}
}

/**
* sqlite类
*/
class DbSqlite implements db
{
	public function conn()
	{
		echo "连接上了sqlite";
	}
}

$db = new DbMysql();
$db->conn();

$db = new DbSqlite();
$db->conn();


