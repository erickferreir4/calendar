<?php declare(strict_types=1);

namespace app\controller;


/***
 *
 *
 *	App Router
 *
 */
class AppController
{
	public function __construct()
	{
	}

	//	router
	public function router() : void
	{
		$load = $this->getUri();
		new $load();
	}

	//	request uri
	protected function getUri() : string
	{
		$path = $_SERVER['REQUEST_URI'];

		$relativeClass = ucfirst(explode('/', $path)[1]);

		if( $relativeClass === '' || $relativeClass === 'index' ) {
			return 'app\controller\IndexController';
		}

		$file = __DIR__ . '/' . $relativeClass . 'Controller.php';

		if( file_exists($file) ) {
			return 'app\controller\\' . $relativeClass . 'Controller';
		}

		return 'app\controller\NotFoundController';
	}
}
