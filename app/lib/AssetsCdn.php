<?php declare(strict_types=1);

namespace app\lib;

use app\interfaces\IAssets;

/***
 *
 *	Load Assets CDN
 *
 */
class AssetsCdn implements IAssets
{
	public function __construct()
	{
	}

	//load style template
	public function loadStyle($style) : string
	{
		$src = file_get_contents(__DIR__ . '/../templates/style.html');
		return str_replace('[[REPLACE]]', $style, $src);
	}
		
	//load script template
	public function loadScript($script)	: string
	{
		$src = file_get_contents(__DIR__ . '/../templates/script.html');
		return str_replace('[[REPLACE]]', $script, $src);
	}
}
