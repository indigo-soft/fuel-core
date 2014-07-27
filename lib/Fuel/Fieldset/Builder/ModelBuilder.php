<?php

/*
 * This file is part of the Indigo Core package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fuel\Fieldset\Builder;

use Fuel\Fieldset\Form;

/**
 * Allows sets of form fields to be generated from a V1 ORM Model source
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
trait ModelBuilder
{
	/**
	 * Builder object
	 *
	 * @var BuilderInterface
	 */
	protected static $builder;

	/**
	 * Creates a new Form instance
	 *
	 * @return Form
	 */
	public static function forgeForm()
	{
		$form = new Form;

		return static::populateForm($form);
	}

	/**
	 * Populates the given form with the needed fields
	 *
	 * @param Form $form
	 *
	 * @return Form
	 */
	public static function populateForm(Form $form)
	{
		if (static::$builder === null)
		{
			static::setBuilder(new V1Model);
		}

		$elements = static::$builder->generate(get_called_class());

		return $form->setContents($elements);
	}

	/**
	 * Returns the builder
	 *
	 * @return BuilderInterface
	 */
	public static function getBuilder()
	{
		return static::$builder;
	}

	/**
	 * Sets the builder instance
	 *
	 * @param BuilderInterface $builder
	 */
	public static function setBuilder(BuilderInterface $builder)
	{
		static::$builder = $builder;
	}
}
