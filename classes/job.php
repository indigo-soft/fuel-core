<?php
/**
 * Fuel Core package
 *
 * @package 	Fuel
 * @subpackage	Core
 * @version		1.0
 * @author 		Márk Sági-Kazár <mark.sagikazar@gmail.com>
 * @license 	MIT License
 * @link 		https://github.com/indigo-soft
 */

namespace Fuel\Core;

class JobException extends \FuelException {}

abstract class Job {

	/**
	 * Job arguments
	 *
	 * @var array
	 */
	public $args = array();

	/**
	 * Abstract function extended by children
	 *
	 * @return mixed Job return value
	 */
	abstract protected function _run();

	/**
	 * Run the job
	 *
	 * @return mixed Job return value
	 */
	public function run()
	{
		return $this->_run();
	}

	public function __construct($args = array())
	{
		$this->args = $args;
	}

	public function __call($method, $arguments)
	{
		switch ($method)
		{
			case 'perform':
				return $this->run();
				break;
			default:
				throw new \BadMethodCallException('Invalid method: '.get_called_class().'::'.$method);
				break;
		}
	}
}
