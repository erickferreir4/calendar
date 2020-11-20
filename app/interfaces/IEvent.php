<?php declare(strict_types=1);

namespace app\interfaces;

/**
 *
 *	Interface Event
 *
 */
interface IEvent
{
	public function insert($day, $month, $year, $event);

	public function select($year, $month);

	public function delete($year, $month, $day, $index); 
}

