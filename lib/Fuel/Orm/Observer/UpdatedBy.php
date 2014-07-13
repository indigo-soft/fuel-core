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
 * Updated By observer
 *
 * Sets a user_id property on insert
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class UpdatedBy extends Orm\Observer
{
	/**
	 * Default property to set the id on
	 *
	 * @var string
	 */
	public static $property = 'updated_by';

	/**
	 * Property to set the id on
	 *
	 * @var string
	 */
	protected $_property;

	/**
	 * Names of any relations that should be taken into account
	 * when checking if the model has been updated
	 *
	 * @var array
	 */
	protected $_relations;

	/**
	 * Sets the properties for this observer instance, based on the parent model's
	 * configuration or the defined defaults.
	 *
	 * @param string Model class this observer is called on
	 */
	public function __construct($class)
	{
		$props = $class::observers(get_class($this));
		$this->_property  = isset($props['property']) ? $props['property'] : static::$property;
		$this->_relations = isset($props['relations']) ? $props['relations'] : array();
	}

	/**
	 * Sets the UpdatedBy property to the current user id.
	 *
	 * @param Model Model object subject of this observer method
	 */
	public function before_save(Orm\Model $obj)
	{
		$this->before_update($obj);
	}

	/**
	 * Sets the UpdatedBy property to the current user id.
	 *
	 * @param Model Model object subject of this observer method
	 */
	public function before_update(Orm\Model $obj)
	{
		// If there are any relations loop through and check if any of them have been changed
		$relation_changed = false;

		foreach ($this->_relations as $relation)
		{
			if ($this->relation_changed($obj, $relation))
			{
				$relation_changed = true;
				break;
			}
		}

		if (($obj->is_changed() or $relation_changed) and $user_id = \Auth::get_user_id())
		{
			$obj->{$this->_property} = $user_id[1];
		}
	}

	/**
	 * Checks to see if any models in the given relation are changed.
	 * This function is lazy so will return true as soon
	 * as it finds something that has changed.
	 *
	 * @param Model  $obj
	 * @param string $relation
	 *
	 * @return boolean
	 */
	protected function relation_changed(Orm\Model $obj, $relation)
	{
		// Check that the relation exists
		if ($obj->relations($relation) === false)
		{
			throw new \InvalidArgumentException('Unknown relation '.$relation);
		}

		// If the relation is not loaded then ignore it.
		if ( ! $obj->is_fetched($relation))
		{
			return false;
		}

		$relation_object = $obj->relations($relation);

		// Check if whe have a singular relation
		if ($relation_object->is_singular())
		{
			// If so check that one model
			return $obj->{$relation}->is_changed();
		}

		// Else we have an array of related objects so start checking them all
		foreach ($obj->{$relation} as $related_model)
		{
			if ($related_model->is_changed())
			{
				return true;
			}
		}

		return false;
	}
}
