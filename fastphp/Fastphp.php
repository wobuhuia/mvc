<?php
namespace fastphp;

// 框架根目录
defined('CORE_FATH') or define('CORE_FATH', __DIR__);

/**
 * fastphp框架核心
 */
class Fastphp
{
	// 配置内容
	protected $config = [];

	public function __construct($config)
	{
		$this->config = $config;
	}

	// 运行程序
	public function run()
	{
		sql_autoload_register(array($this, 'loadClass'));
		$this->setReporting();
		$this->removeMagicQuotes();
		$this->unregisterGlobals();
		$this->setDbConfig();
		$this->route();
	}

	// 路由处理
	public function route()
	{
		$controllerName = $this->config['defaultController'];
		$actionName = $this->config['defaultAction'];
		$param = array();

		$url = $_SERVER['REQUEST_URL'];
		// 清除?后面的内容
		$position = strpos($url, '?');
		$url = $position === false ? $url : substr($url, 0, $position);
		// 删除前后的"/"
		$url = trim($url, '/');

		if ($url) {
			// 使用"/"分割字符串,并保存在数组中
			$urlArray = explode('/', $url);
			//删除空的数组元素
			$urlArray = array_filter($urlArray);
		}
	}
	
}















