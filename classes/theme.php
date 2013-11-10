<?php

class Theme extends \Fuel\Core\Theme
{
	/**
	* Get a config item
	*
	* @param	mixed	$key		Config key
	* @param	mixed	$default	Default value
	* @return	mixed				Config value or whole config array
	*/
	public function get_config($key = null, $default = null)
	{
		return is_null($key) ? $this->config : \Arr::get($this->config, $key, $default);
	}

	/**
	* Set a config item
	*
	* @param	mixed	$key	Config key or array to merge
	* @param	mixed	$value	Config value
	* @return	$this
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

}
