<?php

namespace Indigo\Core\Test;

class ForgeExample extends \Forge
{
	public static function forge($instance = 'default')
	{
		return static::newInstance($instance, new \stdClass);
	}
}

/**
 * Tests for Forge
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Indigo\Core\Forge
 */
class ForgeTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		ForgeExample::forge();
	}

	/**
	 * @covers ::forge
	 * @covers ::newInstance
	 * @group  Core
	 */
	public function testForge()
	{
		$class = ForgeExample::forge('test');

		$this->assertInstanceOf('stdClass', $class);
	}

	/**
	 * @covers ::exists
	 * @group  Core
	 */
	public function testExists()
	{
		$this->assertTrue(ForgeExample::exists('default'));
		$this->assertFalse(ForgeExample::exists('fake'));
	}

	/**
	 * @covers ::instance
	 * @group  Core
	 */
	public function testInstance()
	{
		$this->assertInstanceOf('stdClass', ForgeExample::instance('default'));
		$this->assertFalse(ForgeExample::instance('fake'));
	}
}
