<?php

namespace Indigo\Core\Forge;

use Codeception\TestCase\Test;

/**
 * Tests for Forge Instance helper
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Indigo\Core\Util\Config
 */
class ConfigTest extends Test
{
	protected $object;

	protected $config = array(
		'key' => 'value',
	);

	public function _before()
	{
		$this->object = new \ConfigUtilExample($this->config);
	}

	/**
	 * @covers ::getConfig
	 * @group  Core
	 */
	public function testGetConfig()
	{
		$this->assertEquals('value', $this->object->getConfig('key'));
		$this->assertNull($this->object->getConfig('NON_EXISTING_KEY'));
		$this->assertFalse($this->object->getConfig('NON_EXISTING_KEY', false));
		$this->assertEquals(array('key' => 'value'), $this->object->getConfig(array('key')));
	}

	/**
	 * @covers ::setConfig
	 * @group  Core
	 */
	public function testSetConfig()
	{
		$this->assertEquals($this->object, $this->object->setConfig('key', 'value2'));
		$this->assertEquals('value2', $this->object->getConfig('key'));

		$config = array(
			'key2' => 'value3'
		);

		$this->object->setConfig($config);

		$this->assertEquals($config, $this->object->getConfig());
	}

	/**
	 * @covers ::mergeConfig
	 * @group  Core
	 */
	public function testMergeConfig()
	{
		$config = array(
			'key2' => 'value3'
		);

		$this->object->mergeConfig($config);

		$config = array_merge($config, $this->config);
		$this->assertEquals($config, $this->object->getConfig());

		$this->object->setConfig($this->config);

		$config = array(
			'key3' => 'value4'
		);

		$this->object->mergeConfig($config, true);

		$config = array_merge($this->config, $config);
		$this->assertEquals($config, $this->object->getConfig());
	}
}
