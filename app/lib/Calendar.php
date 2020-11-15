<?php declare(strict_types=1);

namespace app\lib;

/**
 *
 * Calendar
 *
 */
class Calendar
{
	protected $matrix;
	protected $weekdays;
	protected $init_day;
	protected $last_day;
	protected $month;
	protected $month_num;
	protected $year;

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

		$this->weekdays = [
			'sunday',
			'monday',
			'tuesday',
			'wednesday',
			'thurday',
			'friday',
			'saturday'
		];
	}

	public function setDate(int $month, int $year)
	{
		$this->init_day = intval(date('N', mktime(0, 0, 0, $month, 1, $year)));
		$this->last_day = intval(date('t', mktime(0, 0, 0, $month, 1, $year)));
		$this->month = date('F', mktime(0, 0, 0, $month, 10));
		$this->month_num = $month;
		$this->year = $year;
	}

	public function generateCalendar()
	{
		if($this->init_day === 7){
			$this->init_day = 0;
		}
		//void column
		for($x = 0; $x < $this->init_day; $x++){
			$this->matrix[$x][] = null;  
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
		$html = file_get_contents(__DIR__ . '/../templates/calendar.html');
		$alldays = '';

		foreach($this->matrix as $key => $days){

			$alldays .= '<ul data-day="'.$this->weekdays[$key].'" data-id="'.($key+1).'">';

			for($x = 0; $x < count($days); $x++){

				if($this->month_num == getdate()['mon'] && getdate()['mday'] === $days[$x]){
					$alldays .= '<li class="is--active">'.$days[$x].'</li>';
					continue;
				}

				if ($days[$x] === null) {
					$alldays .= '<li class="no--active"></li>';
					continue;
				}

				$alldays .= '<li>'.$days[$x].'</li>';
			}
			$alldays .= '</ul>';
		}
		
		$html = str_replace('[[DAYS]]', $alldays, $html);
		$html = str_replace('[[MONTH]]', $this->month, $html);
		$html = str_replace('[[MONTH_NUM]]', $this->month_num, $html);
		$html = str_replace('[[YEAR]]', $this->year, $html);

		$html = str_replace('[[WEEKDAY]]', date("l"), $html);
		$html = str_replace('[[MONTH_NOW]]', date("M j"), $html);
		$html = str_replace('[[MONTH_ABB]]', date('M', mktime(0, 0, 0, $this->month_num, 10)), $html);

		return $html;
	}
}
