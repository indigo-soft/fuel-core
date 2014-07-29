<?php

/*
 * This file is part of the Indigo Core package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Core\Helper;

/**
 * Dummy Config
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class DummyConfig
{
	use \Indigo\Core\Helper\Config;

	public function __construct(array $config)
	{
		$this->config = $config;
	}
}
