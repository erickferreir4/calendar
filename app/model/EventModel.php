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

	public function insert($day, $month, $year, $event)
	{
		$this->cookie[$year][$month][$day][] = $event;

		setcookie("events", json_encode($this->cookie), time()+3600, '/');
	}

	public function select($year, $month)
	{
		return $this->cookie[$year][$month];
	}
}
