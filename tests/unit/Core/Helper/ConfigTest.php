<?php

/*
 * This file is part of the Indigo Core package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Core\Helper;

use Codeception\TestCase\Test;

/**
 * Tests for Config Helper
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Indigo\Core\Helper\Config
 * @group              Core
 * @group              Helper
 */
class ConfigTest extends Test
{
	/**
	 * Class using Config Helper
	 *
	 * @var DummyConfig
	 */
	protected $object;

	/**
	 * Config array
	 *
	 * @var []
	 */
	protected $config = [
		'key' => 'value',
	];

	public function _before()
	{
		$this->object = new DummyConfig($this->config);
	}

	/**
	 * @covers ::getConfig
	 */
	public function testGetConfig()
	{
		$this->assertEquals('value', $this->object->getConfig('key'));
		$this->assertNull($this->object->getConfig('NON_EXISTING_KEY'));
		$this->assertFalse($this->object->getConfig('NON_EXISTING_KEY', false));
		$this->assertEquals(['key' => 'value'], $this->object->getConfig(['key']));
	}

	/**
	 * @covers ::setConfig
	 */
	public function testSetConfig()
	{
		$this->assertEquals($this->object, $this->object->setConfig('key', 'value2'));
		$this->assertEquals('value2', $this->object->getConfig('key'));
	}

	/**
	 * @covers ::mergeConfig
	 */
	public function testMergeConfig()
	{
		$config = [
			'key3' => 'value4',
		];

		$this->object->mergeConfig($config, true);

		$config = array_merge($this->config, $config);
		$this->assertEquals($config, $this->object->getConfig());
	}

		/**
	 * @covers ::mergeConfig
	 */
	public function testMergeConfigReverse()
	{
		$config = [
			'key2' => 'value3',
		];

		$this->object->mergeConfig($config);

		$config = array_merge($config, $this->config);
		$this->assertEquals($config, $this->object->getConfig());
	}
}
