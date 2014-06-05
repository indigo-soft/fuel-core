<?php

/*
 * This file is part of the Indigo Core package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
