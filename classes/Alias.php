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

use Fuel\Alias\Manager;

/**
 * Alias Forge class
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Alias extends Forge
{
	public static function forge($instance = 'default', $placement = 'prepend')
	{
		$manager = new Manager;

		$manager->register($placement);

		return static::newInstance($instance, $manager);
	}
}
