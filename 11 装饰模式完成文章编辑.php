<?php 
header("Content-type:text/html;charset=utf-8");

/**
* 文章编辑类
*/
class Article
{
	protected $content;
	protected $art = null;
	public function __construct($content)
	{
		$this->content = $content;
	}
	public function decorator(){
		return $this->content;
	}
}


/**
* 小编加个摘要
*/
class BianArticle extends Article
{
	public function __construct(Article $art){
		$this->art = $art;
		$this->decorator();
	}

	public function decorator()
	{
		return $this->content = $this->art->content."小编加了个摘要<br>";
	}
}


/**
* SEO对文章描述做了个修改
*/
class SEOArticle extends Article
{
	public function __construct(Article $art){
		$this->art = $art;
		$this->decorator();
	}

	public function decorator()
	{
		return $this->content = $this->art->content."SEO对文章描述做了个修改<br>";
	}
}

$b = new SEOArticle(new BianArticle(new Article("完成了文章编辑<br>")));
echo $b->decorator();

