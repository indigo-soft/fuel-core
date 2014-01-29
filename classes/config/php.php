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

class Config_Php extends \Fuel\Core\Config_Php
{
	/**
	 * Whether opcache is enabled
	 *
	 * @var boolean
	 */
	protected static $_opcache;

	/**
	 * Whether APC is enabled
	 *
	 * @var boolean
	 */
	protected static $_apc;

	protected static function check_cache()
	{
		if ( ! isset(static::$_opcache)) {
			static::$_opcache = function_exists('opcache_invalidate');
		}

		if ( ! isset(static::$_apc)) {
			static::$_apc = function_exists('apc_compile_file');
		}

		return static::$_opcache or static::$_apc;
	}

	public function save($contents)
	{
		$file = $this->file;
		$return = parent::save($contents);

		if ($return and $file == $this->file)
		{
			if (static::check_cache())
			{
				$path = \Finder::search('config', $this->file, $this->ext);

				if ($this->file[0] === '/' or (isset($this->file[1]) and $this->file[1] === ':'))
				{
					$path = $this->file;
				}

				// make sure we have a fallback
				$path || $path = APPPATH.'config'.DS.$this->file.$this->ext;

				static::$_opcache and opcache_invalidate($path, true);
				static::$_apc and apc_compile_file($path);
			}
		}

		return $return;
	}
}
