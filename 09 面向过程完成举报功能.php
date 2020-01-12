<?php 
header("Content-type:text/html;charset=utf-8");
$lev = $_POST['lev'];

if ($lev == 1) {
	$process = new Broad();
	$process->process();
}elseif ($lev == 2) {
	$process = new Admin();
	$process->process();
}elseif ($lev == 3) {
	$process = new Police();
	$process->process();
}else{
	echo "一切正常";
}
/**
* 版主
*/
class Broad
{
	public function process()
	{
		echo "版主删帖";
	}
}

/**
* 管理员
*/
class Admin
{
	public function process()
	{
		echo "封号处理";
	}
}

/**
* 公安
*/
class Police
{
	public function process()
	{
		echo "被公安抓了";
	}
}