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
 * Image class extension
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Image extends \Fuel\Core\Image
{
	/**
	 * Creates a new image.
	 *
	 * @return  Image_Driver
	 */
	public static function create($width, $height, $color = null)
	{
		return static::instance()->create($width, $height, $color);
	}
}
