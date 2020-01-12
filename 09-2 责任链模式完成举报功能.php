<?php 
header("Content-type:text/html;charset=utf-8");

/**
* 版主
*/
class Broad
{
	protected $power = 1;
	protected $prev = 'Admin';
	public function process($lev)
	{
		if ($lev <= $this->power) {
			echo "版主删帖";
		}else{
			$process = new $this->prev;
			$process->process($lev);
		}
		
	}
}

/**
* 管理员
*/
class Admin
{
	protected $power = 2;
	protected $prev = 'Police';
	public function process($lev)
	{
		if ($lev <= $this->power) {
			echo "封号处理";
		}else{
			$process = new $this->prev;
			$process->process($lev);
		}
	}
}

/**
* 公安
*/
class Police
{
	protected $power;
	protected $prev ;
	public function process($lev)
	{
		echo "被公安抓了哈";
	}
}

$lev = $_POST['lev'];
$process = new Broad();
$process->process($lev);