<?php

/*
 * This file is part of the Indigo Core package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Core;

use Codeception\TestCase\Test;

/**
 * Tests for Logger
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Indigo\Core\Logger
 * @group              Core
 */
class LoggerTest extends Test
{
	/**
	 * @covers ::forge
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
