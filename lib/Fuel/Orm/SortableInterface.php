<?php

/*
 * This file is part of the Indigo Core package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fuel\Orm;

/**
 * Sortable Interface
 *
 * This interface helps the use of Sort observer
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
interface SortableInterface
{
	/**
	 * Returns the maximum sort value
	 *
	 * @return integer
	 */
	public function getSortMax();
}
