<?php
/**
 * Part of Fuel Core Extension.
 *
 * @package 	Fuel
 * @subpackage	Core
 * @version		1.0
 * @author 		Indigo Development Team
 * @license 	MIT License
 * @copyright 	2013 - 2014 Indigo Development Team
 * @link 		https://indigophp.com
 */

namespace Indigo\Core;

/**
 * Num helper class extension
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
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
