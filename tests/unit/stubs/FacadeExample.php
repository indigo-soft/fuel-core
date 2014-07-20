<?php

/**
 * Provides a simple example of usage
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class FacadeExample extends \Facade
{
	public static function forge($instance = 'default')
	{
		return static::newInstance($instance, new \stdClass);
	}
}

class AdvancedFacadeExample extends FacadeExample
{
	use \Indigo\Core\Facade\Instance;
}
