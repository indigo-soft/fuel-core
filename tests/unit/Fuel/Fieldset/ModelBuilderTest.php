<?php

/*
 * This file is part of the Indigo Core package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Fuel\Fieldset\Form;
use Fuel\Fieldset\Builder\V1Model;
use Codeception\TestCase\Test;

/**
 * Tests for ModelBuilder
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Fuel\Fieldset\Builder\ModelBuilder
 * @group              Fuel
 */
class ModelBuilderTest extends Test
{
	/**
	 * @covers ::forgeForm
	 * @covers ::populateForm
	 */
	public function testForge()
	{
		$expected = new Form;
		$return = DummyModel::populateForm($expected);

		$actual = DummyModel::forgeForm();

		$this->assertEquals($expected, $actual);
		$this->assertSame($expected, $return);
		$this->assertInstanceOf('Fuel\\Fieldset\\Builder\\V1Model', DummyModel::getBuilder());
	}

	/**
	 * @covers ::getBuilder
	 * @covers ::setBuilder
	 */
	public function testGetSet()
	{
		$builder = new V1Model;

		DummyModel::setBuilder($builder);

		$this->assertSame($builder, DummyModel::getBuilder());
	}
}
