<?php declare(strict_types=1);

/***
 *
 *	Autoload
 *
 */
class ApplicationLoader
{
	public function __construct()
	{
	}

	// spl
	public function loader() : void
	{
		spl_autoload_register([$this, 'loadClass']);
	}

	//	load class
	public function loadClass($class) : bool
	{
		$class = str_replace('\\', '/', $class);


		if( strpos($class, 'app/') !== 0 ) {
			return FALSE;
		}

		$file = __DIR__ . str_replace('app/', '/../', $class) . '.php';

		if( file_exists($file) ) {
			require $file;
		}

		return TRUE;
	}
}

