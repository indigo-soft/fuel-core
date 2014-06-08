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
 * Abstract forge class to implement Forge model
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
abstract class Forge
{
	/**
	 * Array of instances
	 *
	 * @var array
	 */
	protected static $_instances = array();

	/**
	 * Config name to autoload
	 *
	 * Set this variable to autoload a config with the same name
	 *
	 * @var string
	 */
	protected static $_config;

	/**
	 * Initialize class
	 *
	 * @codeCoverageIgnore
	 */
	public static function _init()
	{
		if (isset(static::$_config))
		{
			\Config::load(static::$_config, true);
		}

		$class = get_called_class();
		static::$_instances[$class] = array();
	}

	/**
	 * Forge and return new instance
	 *
	 * @return mixed
	 *
	 * @codeCoverageIgnore
	 */
	public static function forge() {}

	/**
	 * Return an instance or false
	 *
	 * @param  string $instance
	 * @return mixed
	 */
	public static function instance($instance = null)
	{
		$class = get_called_class();

		if (static::exists($instance))
		{
			$instance = static::$_instances[$class][$instance];
		}
		else
		{
			$instance = false;
		}

		return $instance;
	}

	/**
	 * Properly save a new instance
	 *
	 * @param  string $name
	 * @param  mixed  $instance Anything you can call an instance
	 * @return mixed Instance
	 */
	public static function newInstance($name, $instance)
	{
		$class = get_called_class();

		return static::$_instances[$class][$name] = $instance;
	}

	/**
	 * Check whether an instance exists
	 *
	 * @param  string  $instance
	 * @return boolean
	 */
	public static function exists($instance)
	{
		$class = get_called_class();

		return isset(static::$_instances[$class][$instance]);
	}

	/**
	 * Don't let this class to be instantiated
	 *
	 * @codeCoverageIgnore
	 */
	final private function __construct() {}
}
