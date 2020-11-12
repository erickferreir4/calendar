<?php declare(strict_types=1);

namespace app\controller;

use app\traits\TemplateTrait;
use app\lib\Calendar;
use app\helpers\FilterSingleton;

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

		$year = FilterSingleton::number($_POST['year']);
		$month = FilterSingleton::number($_POST['month']); 

		$year = $year === 0 ? getdate()['year'] : $year;
		$month = $month === 0 ? getdate()['mon'] : $month;

		$calendar = new Calendar();

		$calendar->setDate(intval($month), intval($year));
		$calendar->generateCalendar();

		return $calendar->getCalendar();
	}
}
