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
 * Theme class extension
 *
 * @author Tamás Barta <barta.tamas.d@gmail.com>
 */
class Theme extends \Fuel\Core\Theme
{
	/**
	* Returns a config item
	*
	* @param mixed $key     Config key
	* @param mixed $default Default value
	*
	* @return mixed Config value or whole config array
	*/
	public function get_config($key = null, $default = null)
	{
		return is_null($key) ? $this->config : \Arr::get($this->config, $key, $default);
	}

	/**
	* Sets a config item
	*
	* @param mixed $key   Config key or array to merge
	* @param mixed $value Config value
	*
	* @return this
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

	/**
	 * Returns configured paths
	 *
	 * @return array
	 */
	public function get_paths()
	{
		return $this->paths;
	}

	public function get_all_paths($theme_name = null)
	{
		$paths = array();

		if ($theme_name === null)
		{
			$theme_name = $this->active['name'];
		}

		$path_prefix = null;
		$module_path = null;

		if ($this->config['use_modules'] and class_exists('Request', false) and $request = \Request::active() and $module = $request->module)
		{
			// we're using module name prefixing
			$path_prefix = $module.DS;

			// and modules are in a separate path
			is_string($this->config['use_modules']) and $path_prefix = trim($this->config['use_modules'], '\\/').DS.$path_prefix;

			// do we need to check the module too?
			$this->config['use_modules'] === true and $module_path = \Module::exists($module).'themes'.DS;
		}

		foreach ($this->get_parent_themes($theme_name) as $theme)
		{
			if ($this->config['use_modules'] and $module)
			{
				$paths[] = $theme['path'] . $path_prefix;
				$paths[] = $module_path.$theme['name'].DS;
			}

			foreach ($this->paths as $path)
			{
				$paths[] = $path . $theme['name'].DS;
			}
		}

		return array_filter(array_unique($paths), 'is_dir');
	}

	/**
	 * {@inheritdocs}
	 *
	 * Finds the file in parent themes as well
	 */
	public function find_file($view, $themes = null)
	{
		if (is_null($themes))
		{
			$themes = $this->get_parent_themes($this->active['name']);
		}

		return parent::find_file($view, $themes);
	}

	/**
	 * Returns parent theme info
	 *
	 * @param string $theme_name
	 *
	 * @return array
	 */
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
			$return[] = $this->fallback;
		}

		return $return;
	}

	/**
	 * Returns an absolute URL to asset
	 *
	 * @param string $path
	 *
	 * @return string
	 */
	public function asset_url($path)
	{
		$url = $this->asset_path($path);

		if (filter_var($url, FILTER_VALIDATE_URL) === false)
		{
			$url = \Uri::create($url);
		}

		return $url;
	}
}
