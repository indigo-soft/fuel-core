<?php

// namespace Fuel\Core;

class Theme extends \Fuel\Core\Theme
{
	/**
	 * Enabling a Theme instance to change config after forge/creation.
	 *
	 * @param string|array   $key    If array, it is merged with the current config, otherwise it is the key in the config for the new value.
	 * @param mixed          $value  Is the $key is a string, this is the value put in the config.
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
	 * Getter for the Theme configuration.
	 * @param  string $key [description]
	 * @return mixed       [description]
	 */
	public function get_config($key = null)
	{
		return is_null($key) ? $this->config : \Arr::get($this->config, $key);
	}

}