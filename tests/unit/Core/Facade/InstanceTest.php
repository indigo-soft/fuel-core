<?php

namespace Indigo\Core\Facade;

use Codeception\TestCase\Test;

/**
 * Tests for Facade Instance helper
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Indigo\Core\Facade\Instance
 */
class InstanceTest extends Test
{
	/**
	 * @covers ::instance
	 * @group  Core
	 */
	public function testInstance()
	{
		$this->assertInstanceOf('stdClass', \AdvancedFacadeExample::instance('test'));
	}
}
