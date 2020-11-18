<?php declare(strict_types=1);

namespace app\model;

use app\interfaces\IEvent;


/**
 *
 *	Event Model
 *
 */
//class EventModel implements IEvent
class EventModel 
{
	public $cookie;

	public function __construct()
	{
		$this->cookie = isset($_COOKIE['events'])
			? json_decode($_COOKIE['events'], true)
			: [];
	}

	protected function save()
	{
		setcookie("events", json_encode($this->cookie), time()+3600, '/');
	}

	public function insert($day, $month, $year, $event)
	{
		$this->cookie[$year][$month][$day][] = $event;

		$this->save();
	}

	public function select($year, $month)
	{
		return $this->cookie[$year][$month];
	}

	public function delete($year, $month, $day, $index)
	{
		unset($this->cookie[$year][$month][$day][$index]);
		$this->cookie[$year][$month][$day] = array_values($this->cookie[$year][$month][$day]);

		$this->save();
	}
}
