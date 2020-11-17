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

	protected function add() {

		$model = new EventModel;

		$day = FilterSingleton::sanitize($_POST['day']);
		$month = FilterSingleton::sanitize($_POST['month']);
		$year = FilterSingleton::sanitize($_POST['year']);
		$event = FilterSingleton::sanitize($_POST['event']);

		$model->insert($day, $month, $year, $event);
		unset($model);

		header('Location: /');
	}





}
