<?php

/*
 * This file is part of the Indigo Core package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Dummy Model
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