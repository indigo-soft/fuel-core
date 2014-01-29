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
 * Image Driver class extension
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
abstract class Image_Driver extends \Fuel\Core\Image_Driver
{
	/**
	 * Create a new image
	 *
	 * @param  int    $width   Width of image
	 * @param  int    $height  Height of image
	 * @param  mixed  $bgcolor Background color of image
	 * @return $this
	 */
	public function create($width, $height, $bgcolor = array(0, 0, 0))
	{
		return $this;
	}

	/**
	 * Fill a rectangle (space between four coordinates) with color
	 *
	 * @param  int    $x1
	 * @param  int    $y1
	 * @param  int    $x2
	 * @param  int    $y2
	 * @param  mixed  $color
	 * @return $this
	 */
	public function fill($x1, $y1, $x2, $y2, $color = array(0, 0, 0))
	{
		return $this;
	}

	/**
	 * Creates a new color usable by all drivers.
	 *
	 * @param   string   $hex    The hex code of the color
	 * @return  array    rgba representation of the hex and alpha values.
	 */
	protected function create_hex_color($hex)
	{
		if ($hex == null)
		{
			$red   = 0;
			$green = 0;
			$blue  = 0;
			$alpha = 0;
		}
		else
		{
			// Check if theres a # in front
			if (substr($hex, 0, 1) == '#')
			{
				$hex = substr($hex, 1);
			}

			// Break apart the hex
			if (strlen($hex) == 6 or strlen($hex) == 8)
			{
				$red   = hexdec(substr($hex, 0, 2));
				$green = hexdec(substr($hex, 2, 2));
				$blue  = hexdec(substr($hex, 4, 2));
				$alpha = hexdec(substr($hex, 6, 2));
			}
			else
			{
				$red   = hexdec(substr($hex, 0, 1).substr($hex, 0, 1));
				$green = hexdec(substr($hex, 1, 1).substr($hex, 1, 1));
				$blue  = hexdec(substr($hex, 2, 1).substr($hex, 2, 1));
				$alpha = hexdec(substr($hex, 3, 1).substr($hex, 3, 1));
			}
		}

		$alpha = floor($alpha / 2.55);

		return array(
			'red'   => $red,
			'green' => $green,
			'blue'  => $blue,
			'alpha' => $alpha
		);
	}
}
