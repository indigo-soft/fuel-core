<?php
/**
 * Part of Fuel Core Extension.
 *
 * @package 	Fuel
 * @subpackage	Core
 * @version 	1.0
 * @author		Indigo Development Team
 * @license 	MIT License
 * @copyright	2013 - 2014 Indigo Development Team
 * @link		https://indigophp.com
 */

namespace Indigo\Core;

/**
 * Image GD class extension
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Image_Gd extends \Fuel\Core\Image_Gd
{
	public function create($width, $height, $bgcolor = array(0, 0, 0, 0))
	{
		is_string($bgcolor) and $bgcolor = $this->create_hex_color($bgcolor);

		$image = imagecreate($width, $height);

		if (is_array($bgcolor))
		{
			if (\Arr::is_assoc($bgcolor))
			{
				extract($bgcolor);
			}
			else
			{
				if (count($bgcolor) > 3)
				{
					list($red, $green, $blue, $alpha) = $bgcolor;
				}
				else
				{
					list($red, $green, $blue) = $bgcolor;
					$alpha = 0;
				}
			}
			$alpha = 127 - floor($alpha * 1.27);

			$bgcolor = imagecolorallocatealpha($image, $red, $green, $blue, $alpha);
		}

		// imagecolortransparent($image, $bgcolor);

		$this->image_data = $image;

		return $this;
	}

	public function fill($x1, $y1, $x2, $y2, $color = array(0, 0, 0, 100))
	{
		is_string($color) and $color = $this->create_hex_color($color);

		if (is_array($color))
		{
			if (\Arr::is_assoc($color))
			{
				extract($color);
			}
			else
			{
				if (count($color) > 3)
				{
					list($red, $green, $blue, $alpha) = $color;
				}
				else
				{
					list($red, $green, $blue) = $color;
					$alpha = 100;
				}
			}

			$alpha = 127 - floor($alpha * 1.27);

			$color = imagecolorallocatealpha($this->image_data, $red, $green, $blue, $alpha);
		}

		imagefilledrectangle($this->image_data, $x1, $y1, $x2, $y2, $color);

		return $this;
	}
}
