<?php declare(strict_types=1);

namespace app\controller;

use app\helpers\FilterSingleton;
use app\model\EventModel;

/**
 *
 *	Event Controller
 *
 */
class EventController
{
	public function __construct()
	{
		$path = FilterSingleton::sanitize($_SERVER['REQUEST_URI']);
		$method = explode('/', $path)[2];

		if( method_exists($this, $method) ) {
			$this->$method();
		}
	}

	// add event
	protected function add() 
	{
		$model = new EventModel;

		$day = FilterSingleton::number($_POST['day']);
		$month = FilterSingleton::number($_POST['month']);
		$year = FilterSingleton::number($_POST['year']);
		$event = FilterSingleton::sanitize($_POST['event']);

		if( $day !== 0 && $month !== 0 && $year !== 0 ) {
			$model->insert($day, $month, $year, $event);
		}

		unset($model);
		header('Location: /');
	}

	// remore event
	protected function remove()
	{
		$model = new EventModel;

		$path = FilterSingleton::sanitize($_SERVER['REQUEST_URI']);
		$date = explode('/', $path)[3];

		$day = FilterSingleton::number(explode('-', $date)[0]);
		$month = FilterSingleton::number(explode('-', $date)[1]);
		$year = FilterSingleton::number(explode('-', $date)[2]);
		$index = FilterSingleton::number(explode('-', $date)[3]);

		if( $day !== 0 && $month !== 0 && $year !== 0 ) {
			$model->delete($year, $month, $day, $index);
		}

		unset($model);
		header('Location: /');
	}

}
