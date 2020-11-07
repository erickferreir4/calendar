<?php declare(strict_types=1);

namespace app\lib;

use app\interfaces\IAssets;

/***
 *
 *	Load Assets
 *
 */
class Assets implements IAssets
{
	public function __construct()
	{
	}

	//load style template
	public function loadStyle($style) : string
	{
		$src = file_get_contents(__DIR__ . '/../templates/style.html');
		return str_replace('[[REPLACE]]', '/assets/css/'.$style.'.css', $src);
	}
		
	//load script template
	public function loadScript($script)	: string
	{
		$src = file_get_contents(__DIR__ . '/../templates/script.html');
		return str_replace('[[REPLACE]]', '/assets/js/'.$script.'.js', $src);
	}
}
