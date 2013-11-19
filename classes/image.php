<?php

namespace Indigo\Core;

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
