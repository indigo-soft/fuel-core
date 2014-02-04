<?php
/**
 * Part of Fuel Core Extension.
 *
 * @package 	Fuel
 * @subpackage	Core
 * @version 	1.0
 * @author		Indigo Development Team
 * @license 	MIT License
 * @copyright	2013 - 2014 Indigo Development Team
 * @link		https://indigophp.com
 */

namespace Indigo\Core;

use Orm\Model;
use Orm\Model_Temporal;
use Orm\Observer;

/**
 * CreatedBy observer
 *
 * Sets a user_id property on insert
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Observer_CreatedBy extends Observer
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
	 * Set the properties for this observer instance, based on the parent model's
	 * configuration or the defined defaults.
	 *
	 * @param string Model class this observer is called on
	 */
	public function __construct($class)
	{
		$props = $class::observers(get_class($this));
		$this->_property = isset($props['property']) ? $props['property'] : static::$property;
	}

	/**
	 * Set the CreatedBy property to the current user id.
	 *
	 * @param Model Model object subject of this observer method
	 */
	public function before_insert(Model $obj)
	{
		if ($obj instanceof Model_Temporal)
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
