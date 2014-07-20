<?php

use Fuel\Fieldset\Form;
use Fuel\Fieldset\Builder\V1Model;
use Codeception\TestCase\Test;

/**
 * Tests for ModelBuilder
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Fuel\Fieldset\Builder\ModelBuilder
 */
class ModelBuilderTest extends Test
{
	/**
	 * @covers ::forgeForm
	 * @covers ::populateForm
	 * @group  Fuel
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
	 * @group  Fuel
	 */
	public function testGetSet()
	{
		$builder = new V1Model;

		DummyModel::setBuilder($builder);

		$this->assertSame($builder, DummyModel::getBuilder());
	}
}
