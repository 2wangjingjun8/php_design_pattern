<?php
header("Content-type:text/html;charset=utf-8");

/**
* 
*/
class Login implements SplSubject
{
	public $hobby;
	public $loginTimes;
	protected $observers = null;

	function __construct($hobby)
	{
		$this->hobby = $hobby;
		$this->loginTimes = rand(1,10);
		$this->observers = new SplObjectStorage();
	}

	public function login()
	{
		// login业务逻辑编写
		
		$this->notify();
	}

	public function attach(SPLObserver $observer)
	{
		$this->observers->attach($observer);
	}

	public function detach(SPLObserver $observer)
	{
		$this->observers->detach($observer);
	}


	public function notify()
	{
		// $this->observers->rewind();//将内部指针指向开始处
		// while ($this->observers->valid()) {
		// 	$observer= $this->observers->current();//获取当前对象
		// 	$observer->update($this);
		// 	$this->observers->next();//将指针往下走一位
		// }
		foreach ($this->observers as $value) {
			$value->update($this);
		}
	}
}

//用户推送-观察者
class PushUser implements SplObserver
{
	public function update(SplSubject $subject)//传进来一个被观察者
	{
		//写自己的业务逻辑
		if ($subject->hobby == 'sport') {
			echo "推送运动产品<br>";
		}else{
			echo "推送热门产品<br>";
		}
	}
}

//安全信息推送-观察者
class PushSecurity implements SplObserver
{
	public function update(SplSubject $subject)//传进来一个被观察者
	{
		//写自己的业务逻辑
		if ($subject->loginTimes < 5) {
			echo "你今天第".$subject->loginTimes."次安全登录<br>";
		}else{
			echo "你今天第".$subject->loginTimes."次安全登录,出现异常登录<br>";
		}
	}
}

//新闻推送-观察者
class PushNews implements SplObserver
{
	public function update(SplSubject $subject)
	{
		//写自己的业务逻辑
		if ($subject->hobby == 'sport') {
			echo "推送运动新闻<br>";
		}else{
			echo "推送热门新闻<br>";
		}
	}
}


$user= new Login('sport');//创建一个实现了被观察者的接口类
$user->attach(new PushNews());//传进去一个实现了观察者的接口类
$user->attach(new PushUser());
$user->attach(new PushSecurity());
$user->login();

