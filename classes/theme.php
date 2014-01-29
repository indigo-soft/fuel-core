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
 * Theme class extension
 *
 * @author Tamás Barta <barta.tamas.d@gmail.com>
 */
class Theme extends \Fuel\Core\Theme
{
	/**
	* Get a config item
	*
	* @param  mixed  $key      Config key
	* @param  mixed  $default  Default value
	* @return mixed Config value or whole config array
	*/
	public function get_config($key = null, $default = null)
	{
		return is_null($key) ? $this->config : \Arr::get($this->config, $key, $default);
	}

	/**
	* Set a config item
	*
	* @param  mixed  $key    Config key or array to merge
	* @param  mixed  $value  Config value
	* @return $this
	*/
	public function set_config($key, $value = null)
	{
		if (is_array($key))
		{
			$this->config = \Arr::merge($this->config, $key);
		}
		else
		{
			\Arr::set($this->config, $key, $value);
		}

		return $this;
	}

	public function get_paths()
	{
		return $this->paths;
	}

	public function find_file($view, $themes = null)
	{
		if (is_null($themes))
		{
			$themes = $this->get_parent_themes($this->active['name']);
		}

		return parent::find_file($view, $themes);
	}

	public function get_parent_themes($theme_name)
	{
		$return = array($this->create_theme_array($theme_name));
		$theme_info = $this->load_info($theme_name);

		if ( ! empty($theme_info['parent']))
		{
			$return = array_merge($return, $this->get_parent_themes($theme_info['parent']));
		}
		elseif($theme_name !== $this->fallback['name'])
		{
			$return = array_merge($return, $this->fallback);
		}

		return $return;
	}

}
