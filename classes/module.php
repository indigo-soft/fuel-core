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
 * Module class extension
 *
 * Check for module bootstrap
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Module extends \Fuel\Core\Module
{
	public static function load($module, $path = null)
	{
		$parent = parent::load($module, $path);

		if ($parent === true)
		{
			$path = static::exists($module);

			if (is_file($path .= 'bootstrap.php'))
			{
				\Fuel::load($path);
			}
		}

		return $parent;
	}
}
