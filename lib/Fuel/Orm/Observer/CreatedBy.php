<?php

/*
 * This file is part of the Indigo Core package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fuel\Orm\Observer;

use Orm;

/**
 * Created By observer
 *
 * Sets a user_id property on insert
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class CreatedBy extends Orm\Observer
{
	/**
	 * Default property to set the id on
	 *
	 * @var string
	 */
	public static $property = 'created_by';

	/**
	 * Property to set the id on
	 *
	 * @var string
	 */
	protected $_property;

	/**
	 * Sets the properties for this observer instance, based on the parent model's
	 * configuration or the defined defaults
	 *
	 * @param string Model class this observer is called on
	 */
	public function __construct($class)
	{
		$props = $class::observers(get_class($this));
		$this->_property = isset($props['property']) ? $props['property'] : static::$property;
	}

	/**
	 * Sets the CreatedBy property to the current user id
	 *
	 * @param Model Model object subject of this observer method
	 */
	public function before_insert(Orm\Model $obj)
	{
		if ($obj instanceof Orm\Model_Temporal)
		{
			if ($obj->{$obj->temporal_property('end_column')} !== $obj->temporal_property('max_timestamp')) {
				return false;
			}
		}

		if ($user_id = \Auth::get_user_id())
		{
			$obj->{$this->_property} = $user_id[1];
		}
	}
}
