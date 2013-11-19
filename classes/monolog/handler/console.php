<?php

namespace Monolog\Handler;

use Monolog\Logger;

class ConsoleHandler extends AbstractProcessingHandler
{
	protected $levels = array(
		100 => array('white'),
		200 => array('blue'),
		250 => array('green'),
		300 => array('red'),
		400 => array('red'),
		500 => array('red'),
		550 => array('red'),
		600 => array('red'),
	);

	/**
	 * Construct handler
	 *
	 * @param	integer		$level		The minimum logging level at which this handler will be triggered
	 * @param	boolean		$bubble		Whether the messages that are handled can bubble up the stack or not
	 */
	public function __construct($level = Logger::DEBUG, $bubble = true)
	{
		parent::__construct($level, $bubble);
	}

	public function set_color($level, $foreground_color = 'white', $background_color = null)
	{
		if (array_key_exists($level, $this->levels))
		{
			$this->levels[$level][0] = $foreground_color;
			is_null($background_color) or $this->levels[$level][1] = $background_color;
		}
		return $this;
	}

	/**
	 * {@inheritdoc}
	 */
	protected function write(array $record)
	{
		if (\Fuel::$is_cli)
		{
			$level = \Arr::get($record, 'level', 250);
			$colors = \Arr::get($this->levels, $level, array('white', null));
			$message = \Cli::color((string) $record['formatted'], $colors[0], \Arr::get($colors, 1));
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