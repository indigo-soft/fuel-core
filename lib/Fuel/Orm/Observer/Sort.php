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

use Fuel\Orm\SortableInterface;
use Orm;

/**
 * Created By observer
 *
 * Sets a user_id property on insert
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class Sort extends Orm\Observer
{
	/**
	 * Default property to set the sort value on
	 *
	 * @var string
	 */
	public static $property = 'sort';

	/**
	 * Default offset value
	 *
	 * @var integer
	 */
	public static $offset = 10;

	/**
	 * Property to set the sort value on
	 *
	 * @var string
	 */
	protected $_property;

	/**
	 * Default offset value
	 *
	 * @var integer
	 */
	protected $offset;

	/**
	 * Sets the properties for this observer instance, based on the parent model's
	 * configuration or the defined defaults.
	 *
	 * @param string Model class this observer is called on
	 */
	public function __construct($class)
	{
		$props = $class::observers(get_class($this));

		$this->_property = isset($props['property']) ? $props['property'] : static::$property;
		$this->_offset = isset($props['offset']) ? $props['offset'] : static::$offset;
	}

	/**
	 * Sets the sort property to the current sort value
	 *
	 * @param Model Model object subject of this observer method
	 */
	public function before_insert(Orm\Model $obj)
	{
		if ($obj instanceof SortableInterface)
		{
			$max = $obj->getSortMax();
		}
		else
		{
			$max = $obj->query()->max($this->_property);
		}

		$obj->{$this->_property} = $max + $this->_offset;
	}
}
