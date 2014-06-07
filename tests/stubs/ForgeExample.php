<?php

/**
 * Provides a simple example of usage
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class ForgeExample extends \Forge
{
	public static function forge($instance = 'default')
	{
		return static::newInstance($instance, new \stdClass);
	}
}

class ForgeInstanceExample extends ForgeExample
{
	use \Indigo\Core\Forge\Instance;
}
