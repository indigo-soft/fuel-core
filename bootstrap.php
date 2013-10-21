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
	'Theme' => __DIR__ . '/classes/theme.php',
	'Num'   => __DIR__ . '/classes/num.php',
	'Ini'   => __DIR__ . '/classes/ini.php',

	'Monolog\\Handler\\ConsoleHandler'         => __DIR__ . '/classes/monolog/handler/console.php',
	'Monolog\\Formatter\\ContextLineFormatter' => __DIR__ . '/classes/monolog/formatter/context.php',

	// TODO: This should be moved to indigo-base
	'Twig_Indigo_Extension' => __DIR__ . '/classes/twig/indigo/extension.php',
));
