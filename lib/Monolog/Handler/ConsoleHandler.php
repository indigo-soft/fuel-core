<?php

/*
 * This file is part of the Indigo Core package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Handler;

use Monolog\Logger;

/**
 * Console Handler
 *
 * Handle log messages in oil console
 *
 * @author Márk-Sági-Kazár <mark.sagikazar@gmail.com>
 */
class ConsoleHandler extends AbstractProcessingHandler
{
	protected $levels = array(
		100 => array('white', null),
		200 => array('blue', null),
		250 => array('green', null),
		300 => array('red', null),
		400 => array('red', null),
		500 => array('red', null),
		550 => array('red', null),
		600 => array('red', null),
	);

	/**
	 * Set color for level
	 *
	 * @param  integer     $level
	 * @param  string      $foreground_color
	 * @param  string|null $background_color
	 * @return ConsoleHandler
	 */
	public function setColor($level, $foreground_color = 'white', $background_color = null)
	{
		if (array_key_exists($level, $this->levels))
		{
			$this->levels[$level][0] = $foreground_color;
			$this->levels[$level][1] = $background_color;
		}

		return $this;
	}

	/**
	 * {@inheritdocs}
	 */
	protected function write(array $record)
	{
		if (\Fuel::$is_cli)
		{
			$colors = \Arr::get($this->levels, $record['level'], array('white', null));

			list($fg, $bg) = $colors;

			$message = \Cli::color((string) $record['formatted'], $fg, $bg);

			if ($level >= 300)
			{
				\Cli::error($message);
			}
			else
			{
				\Cli::write($message);
			}
		}
	}
}