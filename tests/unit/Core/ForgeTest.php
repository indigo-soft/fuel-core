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
	 * @group  Core
	 */
	public function testForge()
	{
		$class = \ForgeExample::forge('test');

		$this->assertInstanceOf('stdClass', $class);
	}

	/**
	 * @covers ::newInstance
	 * @group  Core
	 */
	public function testNewInstance()
	{
		$class = \ForgeExample::newInstance('new', new \stdClass);

		$this->assertInstanceOf('stdClass', $class);
		$this->assertTrue(\ForgeExample::exists('new'));
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

	/**
	 * @covers ::delete
	 * @group  Core
	 */
	public function testDelete()
	{
		$this->assertTrue(\ForgeExample::delete('default'));
		$this->assertFalse(\ForgeExample::exists('default'));
		$this->assertFalse(\ForgeExample::delete('fake'));
	}
}
