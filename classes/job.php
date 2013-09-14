<?php

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
		try
		{
			return $this->_run();
		}
		catch (\Exception $e)
		{
			throw new \JobException($->getMessage(), $e->getCode());
		}
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
				# code...
				break;
		}
	}
}
