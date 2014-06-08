<?php

namespace Indigo\Core\Forge;

use Codeception\TestCase\Test;

/**
 * Tests for Forge Instance helper
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Indigo\Core\Forge\Instance
 */
class InstanceTest extends Test
{
	/**
	 * @covers ::instance
	 * @group  Core
	 */
	public function testInstance()
	{
		$this->assertInstanceOf('stdClass', \AdvancedForgeExample::instance('test'));
	}
}
