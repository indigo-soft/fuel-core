<?php

namespace Indigo\Core;

use Codeception\TestCase\Test;

/**
 * Tests for Facade
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Indigo\Core\Facade
 */
class FacadeTest extends Test
{
	public function _before()
	{
		\FacadeExample::forge();
	}

	/**
	 * @covers ::forge
	 * @group  Core
	 */
	public function testForge()
	{
		$class = \FacadeExample::forge('test');

		$this->assertInstanceOf('stdClass', $class);
	}

	/**
	 * @covers ::newInstance
	 * @group  Core
	 */
	public function testNewInstance()
	{
		$class = \FacadeExample::newInstance('new', new \stdClass);

		$this->assertInstanceOf('stdClass', $class);
		$this->assertTrue(\FacadeExample::exists('new'));
	}

	/**
	 * @covers ::exists
	 * @group  Core
	 */
	public function testExists()
	{
		$this->assertTrue(\FacadeExample::exists('default'));
		$this->assertFalse(\FacadeExample::exists('fake'));
	}

	/**
	 * @covers ::instance
	 * @group  Core
	 */
	public function testInstance()
	{
		$this->assertInstanceOf('stdClass', \FacadeExample::instance('default'));
		$this->assertFalse(\FacadeExample::instance('fake'));
	}

	/**
	 * @covers ::delete
	 * @group  Core
	 */
	public function testDelete()
	{
		$this->assertTrue(\FacadeExample::delete('default'));
		$this->assertFalse(\FacadeExample::exists('default'));
		$this->assertFalse(\FacadeExample::delete('fake'));
	}
}
