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

Autoloader::add_core_namespace('Indigo\\Core');

Autoloader::add_classes(array(
	'Theme' => __DIR__ . '/classes/theme.php',
	'Num'   => __DIR__ . '/classes/num.php',
	'Ini'   => __DIR__ . '/classes/ini.php',

	'Monolog\\Handler\\ConsoleHandler'  => __DIR__ . '/classes/monolog/handler/console.php',
	'Monolog\\Handler\\SpecificHandler' => __DIR__ . '/classes/monolog/handler/specific.php',
));

Autoloader::add_classes(array(
	'Indigo\\Core\\Image'         => __DIR__ . '/classes/image.php',
	'Indigo\\Core\\Image_Driver'  => __DIR__ . '/classes/image/driver.php',
	'Indigo\\Core\\Image_Gd'      => __DIR__ . '/classes/image/gd.php',
	'Indigo\\Core\\Image_Imagick' => __DIR__ . '/classes/image/imagick.php',
));

\Package::load('menu');

$menu = \Menu::instance('admin');

$menu->add(array(
	array(
		'name' => 'Dashboard',
		'url' => 'admin',
		'badge' => 3,
		'icon' => 'dashboard'
	)
));