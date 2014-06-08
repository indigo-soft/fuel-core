<?php

/**
 * Provides a simple example of usage
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class ConfigUtilExample
{
	use \Indigo\Core\Util\Config;

	public function __construct(array $config)
	{
		$this->config = $config;
	}
}
