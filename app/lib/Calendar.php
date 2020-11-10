<?php declare(strict_types=1);

namespace app\lib;

class Calendar
{
	protected $matrix;
	protected $init_day;
	protected $last_day;

	public function __construct()
	{
		$this->matrix = [
			['sun'],
			['mon'],
			['tue'],
			['wed'],
			['thu'],
			['fri'],
			['sat']
		];
	}

	public function setDate(int $month, int $year)
	{
		$this->init_day = intval(date('N', mktime(0, 0, 0, $month, 1, $year)));
		$this->last_day = intval(date('t', mktime(0, 0, 0, $month, 1, $year)));
	}

	public function generateCalendar()
	{
		//void column
		for($x = 0; $x < $this->init_day; $x++){
			$this->matrix[$x][] = '0';  
		}

		//fill column
		for($x = 1; $x <= $this->last_day; $x++){
			$this->matrix[$this->init_day][] = $x;  

			$this->init_day++;
			if($this->init_day === 7){
				$this->init_day = 0;
			}
		}
	}

	public function getCalendar()
	{
		$html = '';
		foreach($this->matrix as $key => $days){
			$html .= '<ul>';
			for($x = 0; $x < count($days); $x++){
				$html .= '<li>'.$days[$x].'</li>';
			}
			$html .= '</ul>';
		}
		
		return $html;
	}
}
