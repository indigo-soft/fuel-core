<?php

/*
 * This file is part of the Indigo Core package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Core\Facade;

/**
 * Facade Instance helper
 *
 * Return forged class if instance is not found
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
trait Instance
{
	/**
	 * {@inheritdocs}
	 */
	public static function instance($instance = null)
	{
		$instance = parent::instance($instance);

		if ($instance === false)
		{
			$instance = static::forge($instance);
		}

		return $instance;
	}
}
