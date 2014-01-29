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
 * PHP ini helper class
 *
 * @author Márk-Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Ini
{
	/**
	 * Autoload PHP configuration and set values
	 */
	public static function _init()
	{
		\Config::load('php', true);

		$php = \Config::get('php', array());

		foreach ($php as $key => $value)
		{
			static::set($key, $value);
		}
	}

	/**
	 * Set one or an array of values
	 *
	 * @param	mixed	$key	Key or array of key-value pairs
	 * @param	mixed	$value	Value
	 * @return	mixed 			Old value, false, or array
	 */
	public static function set($key, $value = null)
	{
		if (is_array($key))
		{
			$return = array();

			foreach ($key as $k => $v)
			{
				$return[$k] = static::set($k, $v);
			}

			return $return;
		}
		else
		{
			return ini_set($key, $value);
		}
	}

	/**
	 * Get one or all values
	 *
	 * @param	mixed	$key	Key or null for all
	 * @return	mixed			Value or array of values
	 */
	public static function get($key = null)
	{
		if (is_null($key))
		{
			return ini_get_all();
		}
		else
		{
			return ini_get($key);
		}
	}
}
