<?php declare(strict_types=1);

namespace app\controller;

use app\traits\TemplateTrait;
use app\lib\Calendar;

/***
 *
 *	Index Controller
 *
 */
class IndexController
{
	use TemplateTrait;

	public function __construct()
	{
		$this->setTitle('Calendar');
		$this->layout('Index');	
	}

	protected function renderCalendar()
	{
		$calendar = new Calendar();

		$calendar->setDate(1, 2020);
		$calendar->generateCalendar();

		return $calendar->render();
	}
}
