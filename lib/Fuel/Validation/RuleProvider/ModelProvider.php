<?php

/*
 * This file is part of the Indigo Core package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fuel\Validation\RuleProvider;

use Fuel\Validation\Validator;
use Fuel\Validation\ValidationAwareInterface;

/**
 * Allows sets of validation rules to be generated from a V1 ORM Model source
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
trait ModelProvider
{
	/**
	 * Rule Provider object
	 *
	 * @var ValidationAwareInterface
	 */
	protected static $provider;

	/**
	 * Creates a new Validator instance
	 *
	 * @return Validator
	 */
	public static function forgeValidator()
	{
		$validator = new Validator;

		return static::populateValidator($validator);
	}

	/**
	 * Populates the given validator with the needed rules
	 *
	 * @param Validator $validator
	 *
	 * @return Validator
	 */
	public static function populateValidator(Validator $validator)
	{
		if (static::$provider === null)
		{
			static::setProvider(new FromArray(true, 'validation'));
		}

		return static::$provider->populateValidator($validator);
	}

	/**
	 * Returns the provider
	 *
	 * @return ValidationAwareInterface
	 */
	public static function getProvider()
	{
		return static::$provider;
	}

	/**
	 * Sets the provider instance
	 *
	 * @param ValidationAwareInterface $provider
	 */
	public static function setProvider(ValidationAwareInterface $provider)
	{
		static::$provider = $provider;

		static::$provider->setData(static::properties());
	}
}
