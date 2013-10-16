<?php

class Num extends \Fuel\Core\Num
{
	public static function currency($input, $precision = 4)
	{
		is_float($input) or $input = floatval($input);
		return round($input, $precision);
	}
}