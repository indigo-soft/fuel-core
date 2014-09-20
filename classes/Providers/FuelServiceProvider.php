<?php

/*
 * This file is part of the Indigo Core package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Core\Providers;

use Fuel\Dependency\ServiceProvider;

/**
 * Provides Fuel Core services
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class FuelServiceProvider extends ServiceProvider
{
	/**
	 * {@inheritdoc}
	 */
	public $provides = [
		'alias',
		'alias.namespace',
	];

	/**
	 * {@inheritdoc}
	 */
	public function provide()
	{
		$this->registerSingleton('alias', [$this, 'resolveManager']);

		$this->registerSingleton('alias.namespace', [$this, 'resolveManager']);
	}

	/**
	 * Resolves an Alias Manager
	 *
	 * @param Container $dic
	 * @param string    $placement
	 *
	 * @return Manager
	 */
	public function resolveManager($dic, $placement = 'prepend')
	{
		$manager = $dic->resolve('Fuel\\Alias\\Manager');

		$manager->register($placement);

		return $manager;
	}
}
