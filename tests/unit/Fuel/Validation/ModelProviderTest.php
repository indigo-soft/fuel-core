<?php

use Fuel\Validation\Validator;
use Fuel\Validation\RuleProvider\FromArray;
use Codeception\TestCase\Test;

/**
 * Tests for ModelProvider
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Fuel\Validation\RuleProvider\ModelProvider
 */
class ModelProviderTest extends Test
{
	/**
	 * @covers ::forgeValidator
	 * @covers ::populateValidator
	 * @group  Fuel
	 */
	public function testForge()
	{
		$expected = new Validator;
		$return = DummyModel::populateValidator($expected);

		$actual = DummyModel::forgeValidator();

		$this->assertEquals($expected, $actual);
		$this->assertSame($expected, $return);
		$this->assertInstanceOf('Fuel\\Validation\\RuleProvider\\FromArray', DummyModel::getProvider());
	}

	/**
	 * @covers ::getProvider
	 * @covers ::setProvider
	 * @group  Fuel
	 */
	public function testGetSet()
	{
		$provider = new FromArray(true, 'validation');

		DummyModel::setProvider($provider);

		$this->assertSame($provider, DummyModel::getProvider());
	}
}
