<?php

namespace Indigo\Core;

use Codeception\TestCase\Test;

/**
 * Tests for Forge
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Indigo\Core\Forge
 */
class ForgeTest extends Test
{
	public function _before()
	{
		\ForgeExample::forge();
	}

	/**
	 * @covers ::forge
	 * @covers ::newInstance
	 * @group  Core
	 */
	public function testForge()
	{
		$class = \ForgeExample::forge('test');

		$this->assertInstanceOf('stdClass', $class);
	}

	/**
	 * @covers ::exists
	 * @group  Core
	 */
	public function testExists()
	{
		$this->assertTrue(\ForgeExample::exists('default'));
		$this->assertFalse(\ForgeExample::exists('fake'));
	}

	/**
	 * @covers ::instance
	 * @group  Core
	 */
	public function testInstance()
	{
		$this->assertInstanceOf('stdClass', \ForgeExample::instance('default'));
		$this->assertFalse(\ForgeExample::instance('fake'));
	}
}
