<?php 
header("Content-type:text/html;charset=utf-8");

interface math{
	function cal($v1, $v2);
}

class mathadd implements math
{
	public function cal($v1, $v2){
		return $v1 + $v2;
	}
}

class mathreduce implements math
{
	public function cal($v1, $v2){
		return $v1 - $v2;
	}
}

class mathmulti implements math
{
	public function cal($v1, $v2){
		return $v1 * $v2;
	}
}

class mathdiv implements math
{
	public function cal($v1, $v2){
		return $v1 / $v2;
	}
}

/**
* 
*/
class Cmath 
{
	protected $type;
	protected $calc = null;
	function __construct($type)
	{
		$this->type = $type;
		$cal = 'math'.$type;
		$this->calc = new $cal();

	}
	public function cal($v1, $v2){
		return $this->calc->cal($v1, $v2);
	}

}

$op = $_POST['op'];
$cal = new Cmath($op);
echo $cal->cal($_POST['v1'], $_POST['v2']);