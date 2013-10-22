<?php

/**
 * Num helper class extension.
 */
class Num extends \Fuel\Core\Num
{
	public static function currency($num, $precision = 4)
	{
		is_float($num) or $num = floatval($num);
		return round($num, $precision);
	}

	public static function num_format($num, $dec = 0, $dec_point = ',', $thousand_sep = '.')
	{
		return number_format($num, $dec, $dec_point, $thousand_sep);
	}
}