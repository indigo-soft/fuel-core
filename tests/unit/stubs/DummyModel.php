<?php

/**
 * Dummy Model class
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class DummyModel
{
	use \Fuel\Validation\RuleProvider\ModelProvider;
	use \Fuel\Fieldset\Builder\ModelBuilder;

	public static function properties()
	{
		return array(
			'test' => array(
				'label'      => 'Test',
				'validation' => array('required'),
			),
		);
	}
}