<?php
header("Content-type:text/html;charset=utf-8");

/**
* 第一步，分别实例化
*/
/*class Single 
{
	function __construct()
	{
		# code...
	}
}

$s1 = new Single();
$s2 = new Single();
if ($s1 === $s2) {
	echo "是同一个对象";
}else{
	echo "不是同一个对象";
}
// 不是同一个对象
*/

/**
* 第二步，封闭new实例化
*/
/*class Single 
{
	protected function __construct()
	{
		# code...
	}
}

$s1 = new Single();
$s2 = new Single();
if ($s1 === $s2) {
	echo "是同一个对象";
}else{
	echo "不是同一个对象";
}
*/

/**
* 第三步，留个接口new实例化
*/
/*class Single 
{
	public function getInc(){
		return new self();
	}

	protected function __construct()
	{
		# code...
	}
}

$s1 = Single::getInc();
$s2 = Single::getInc();
if ($s1 === $s2) {
	echo "是同一个对象";
}else{
	echo "不是同一个对象";
}
*/

/**
* 第四步，先判断是否实例化，再决定是否需要new实例化
*/
/*class Single 
{
	static $inc = null; 
	public function getInc(){
		if (self::$inc === null) {
			self::$inc = new self();
		}
		return self::$inc;
	}

	protected function __construct()
	{
		# code...
	}
}

$s1 = Single::getInc();
$s2 = Single::getInc();
if ($s1 === $s2) {
	echo "是同一个对象";
}else{
	echo "不是同一个对象";
}*/


/**
* Multi
*/
/*class Multi extends Single
{
	
	function __construct()
	{
		# code...
	}
}
echo "<br>";
$s1 = new Multi();
$s2 = new Multi();
if ($s1 === $s2) {
	echo "是同一个对象";
}else{
	echo "不是同一个对象";
}*/


/**
* 第五步，封闭构造函数，不让继承到，使用final关键字
*/
/*class Single 
{
	static $inc = null; 
	public function getInc(){
		if (self::$inc === null) {
			self::$inc = new self();
		}
		return self::$inc;
	}

	final protected function __construct()
	{
		# code...
	}
}

$s1 = Single::getInc();
$s2 = Single::getInc();
if ($s1 === $s2) {
	echo "是同一个对象";
}else{
	echo "不是同一个对象";
}*/


/**
* Multi
*/
/*class Multi extends Single
{
	
	function __construct()
	{
		# code...
	}
}*/
echo "<br>";

// $s1 = new Multi();
// $s2 = new Multi();

/*
$s1 = Single::getInc();
$s2 = clone $s1;

if ($s1 === $s2) {
	echo "是同一个对象";
}else{
	echo "不是同一个对象";
}
echo "<br>";
echo "<br>";*/

/**
* 第六步，禁止clone
* 
**/
class Single 
{
	static $inc = null; 
	public function getInc(){
		if (self::$inc === null) {
			self::$inc = new self();
		}
		return self::$inc;
	}

	final protected function __construct()
	{
		# code...
	}
	final protected function __clone(){

	}
}


echo "<br>";

$s1 = Single::getInc();
$s2 = clone $s1;

if ($s1 === $s2) {
	echo "是同一个对象";
}else{
	echo "不是同一个对象";
}
echo "<br>";
echo "<br>";











