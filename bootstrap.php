<?php
/**
 * Fuel Core package
 *
 * @package 	Fuel
 * @subpackage	Core
 * @version		1.0
 * @author 		Márk Sági-Kazár <mark.sagikazar@gmail.com>
 * @license 	MIT License
 * @link 		https://github.com/indigo-soft
 */

Autoloader::add_classes(array(
	'Fuel\\Core\\Job'          => __DIR__ . '/classes/job.php',
	'Fuel\\Core\\JobException' => __DIR__ . '/classes/job.php',
	'Theme'                    => __DIR__ . '/classes/theme.php',

	'Monolog\\Handler\\ConsoleHandler'         => __DIR__ . '/classes/logger/handler/console.php',
	'Monolog\\Formatter\\ContextLineFormatter' => __DIR__ . '/classes/logger/formatter/context.php',
));
