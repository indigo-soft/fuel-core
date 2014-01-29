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

Autoloader::add_core_namespace('Indigo\\Core');

/**
 * Core Extensions
 */
Autoloader::add_classes(array(
	/**
	 * Image class extensions
	 */
	'Indigo\\Core\\Image'         => __DIR__ . '/classes/image.php',
	'Indigo\\Core\\Image_Driver'  => __DIR__ . '/classes/image/driver.php',
	'Indigo\\Core\\Image_Gd'      => __DIR__ . '/classes/image/gd.php',
	'Indigo\\Core\\Image_Imagick' => __DIR__ . '/classes/image/imagick.php',

	'Indigo\\Core\\Theme' => __DIR__ . '/classes/theme.php',
	'Indigo\\Core\\Num'   => __DIR__ . '/classes/num.php',
));

Autoloader::add_classes(array(
	'Ini' => __DIR__ . '/classes/ini.php',

	'Monolog\\Handler\\ConsoleHandler'  => __DIR__ . '/classes/monolog/handler/console.php',
));