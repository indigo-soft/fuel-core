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
