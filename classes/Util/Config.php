<?php

/*
 * This file is part of the Indigo Core package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Core\Util;

/**
 * Config util
 *
 * Use configuration inside objects
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
trait Config
{
	/**
	 * Config array
	 *
	 * @var array
	 */
	protected $config = array();

	/**
	* Get config
	*
	* @param  mixed $key     Config key
	* @param  mixed $default Default value
	* @return mixed Config setting value or the whole config array
	*/
	public function getConfig($key = null, $default = null)
	{
		if (is_array($key))
		{
			return \Arr::subset($this->config, $key, $default);
		}

		return \Arr::get($this->config, $key, $default);
	}

	/**
	* Set config
	*
	* @param  mixed $key   Config key or array of key-value pairs
	* @param  mixed $value New config value
	* @return Config
	*/
	public function setConfig($key, $value = null)
	{
		// Merge config or just set an element
		if (is_array($key))
		{
			$this->config = $key;
		}
		else
		{
			\Arr::set($this->config, $key, $value);
		}

		return $this;
	}

	/**
	 * Merge config
	 *
	 * @param  array  $config
	 * @param  boolean $mode
	 * @return Config
	 */
	public function mergeConfig(array $config, $mode = false)
	{
		if ($mode === true)
		{
			$this->config = \Arr::merge($config, $this->config);
		}
		else
		{
			$this->config = \Arr::merge($this->config, $config);
		}

		return $this;
	}
}
