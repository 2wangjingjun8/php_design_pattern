<?php
header("Content-type:text/html;charset=utf-8");
/**
* db接口
* 实现连接数据库函数conn
*/
 interface db
{
	function conn();
}
/**
 * 工厂接口
 * 实现创建连接函数createDb
 */
 interface factory
{
	function createDb();
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
* MysqlFactory 
*/
class MysqlFactory implements factory
{
	
	public function createDb()
	{
		return new DbMysql();
	}
}
/**
* SqliteFactory 
*/
class SqliteFactory implements factory
{
	
	public function createDb()
	{
		return new DbSqlite();
	}
}

//不修改源代码，扩展oracle数据库
/**
* oracle
*/
class DbOracle implements db
{
	public function conn()
	{
		echo "连上了oracle数据库<br>";
	}
}
/**
* oracle工厂类
*/
class OracleFactory implements factory
{
	public function createDb()
	{
		return new DbOracle();
	}
}

// 客户端调用
$factory = new MysqlFactory();
$db = $factory->createDb();
$db->conn();
$factory = new SqliteFactory();
$db = $factory->createDb();
$db->conn();

$factory = new OracleFactory();
$db = $factory->createDb();
$db->conn();



