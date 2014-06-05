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
}
