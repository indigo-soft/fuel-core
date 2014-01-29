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
