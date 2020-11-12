<?php declare(strict_types=1);

namespace app\helpers;

/**
 *
 *	Filter Input
 *
 */
class FilterSingleton
{
	private function __construct()
	{
	}

	public static function sanitize($input) : string
	{
		return filter_var($input, FILTER_SANITIZE_SPECIAL_CHARS);
	}

	public static function number($input) : int
	{
		return (int) filter_var($input, FILTER_SANITIZE_NUMBER_INT);
	}
}
