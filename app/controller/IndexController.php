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

	protected $year;
	protected $month;

	public function __construct()
	{
		$this->saveDate();
		$this->setTitle('Calendar');
		$this->layout('Index');	
	}

	protected function saveDate()
	{
		$this->year = FilterSingleton::number($_POST['year']);
		$this->month = FilterSingleton::number($_POST['month']); 

		if($this->year !== 0 && $this->month !== 0){
			setcookie("date", json_encode([$this->year, $this->month]), time()+3600, '/');
		}
		else {
			if( isset($_COOKIE['date']) ){
				$date = json_decode($_COOKIE['date'], true);
				$this->year = $date[0];
				$this->month = $date[1];
			}
			else {
				$this->year = getdate()['year'];
				$this->month = getdate()['mon'];
			}
		}
	}

	protected function renderCalendar()
	{
		//$year = FilterSingleton::number($_POST['year']);
		//$month = FilterSingleton::number($_POST['month']); 

		//$this->year = $this->year === 0 ? getdate()['year'] : $this->year;
		//$this->month = $this->month === 0 ? getdate()['mon'] : $this->month;

		$calendar = new Calendar();

		$calendar->setDate(intval($this->month), intval($this->year));
		$calendar->generateCalendar();

		return $calendar->getCalendar();
	}

}
