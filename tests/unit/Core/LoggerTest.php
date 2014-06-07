<?php

namespace Indigo\Core;

use Codeception\TestCase\Test;

/**
 * Tests for Logger
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Indigo\Core\Logger
 */
class LoggerTest extends Test
{
	/**
	 * @covers ::forge
	 * @group  Core
	 */
	public function testForge()
	{
		$class = \Logger::forge('test');

		$this->assertInstanceOf('Monolog\\Logger', $class);

		$handler = \Mockery::mock('Monolog\\Handler\\HandlerInterface');
		$class = \Logger::forge('handler', array($handler));

		$this->assertSame($handler, $class->popHandler());
	}
}
