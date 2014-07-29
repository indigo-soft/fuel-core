<?php

/*
 * This file is part of the Indigo Core package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Fuel\Validation\Validator;
use Fuel\Validation\RuleProvider\FromArray;
use Codeception\TestCase\Test;

/**
 * Tests for ModelProvider
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Fuel\Validation\RuleProvider\ModelProvider
 * @group              Fuel
 */
class ModelProviderTest extends Test
{
	/**
	 * @covers ::forgeValidator
	 * @covers ::populateValidator
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
	 */
	public function testGetSet()
	{
		$provider = new FromArray(true, 'validation');

		DummyModel::setProvider($provider);

		$this->assertSame($provider, DummyModel::getProvider());
	}
}
