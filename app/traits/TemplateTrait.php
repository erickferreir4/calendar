<?php declare(strict_types=1);

namespace app\traits;

use app\interfaces\IAssets;
use app\lib\Assets;
use app\lib\AssetsCdn;

/***
 *
 *	Trait Template
 *
 */
trait TemplateTrait
{
	private $title;
	private $assets;
	private $styles;
	private $scripts;

	// load layout
	public function layout($layout) : void
	{
		$this->general();
		require_once __DIR__ . '/../view/_includes/_head.php';
		require_once __DIR__ . '/../view/_includes/_header.php';
		require_once __DIR__ . '/../view/'. $layout .'View.php';
		require_once __DIR__ . '/../view/_includes/_footer.php';
	}

	// set title page
	public function setTitle($title) : void
	{
		$this->title = $title;
	}

	// set assets
	public function setAssets(IAssets $assets)
	{
		$this->assets = $assets;
	}

	// load css
	public function addCss($css)
	{
		$this->styles = $this->assets->loadStyle($css) . $this->styles; 
	}

	// load js
	public function addJs($js)
	{
		$this->scripts = $this->assets->loadScript($js) . $this->scripts; 
	}

	// load general cfg
	public function general()
	{
		$this->setAssets( new Assets );
		$this->addCss('reset');
		$this->addCss('general');


		$this->addJs('general');
		$this->setAssets( new AssetsCdn );
		$this->addCss('https://fonts.googleapis.com/css2?family=Lato:wght@100;400;700&display=swap');
	}
}
