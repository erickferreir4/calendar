<?php declare(strict_types=1);

namespace app\controller;

use app\traits\TemplateTrait;

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

	protected function generateCalendar()
	{

		$html = '';
		//$array = ['sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat'];
		$array = [[], [], [], [], [], [],  []];


		$ini_days = intval(date('N', mktime(0, 0, 0, 1, 1, 2020)));   // will return 6
		$days = $this->getDays(1, 2020);
		$cont = $ini_days;
		echo $cont;

		for($x = 1; $x <= $days; $x++){

			$array[$cont][] = $x;  

			$cont++;
			if($cont == 7){
				$cont = 0;
			}
		}
		echo '<pre>';
		var_dump($array);
		
	}




	protected function getDays(int $month, int $year) : int 
	{
		return intval(date('t', mktime(0, 0, 0, $month, 1, $year)));
	}


}
