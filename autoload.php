<?php
/**
 * Part of Fuel Core Extension.
 *
 * @package 	Fuel
 * @subpackage	Core
 * @version		1.0
 * @author 		Márk Sági-Kazár <mark.sagikazar@gmail.com>
 * @license 	MIT License
 * @copyright   2013 - 2014 Indigo Development Team
 * @link 		https://indigophp.com
 */

/**
 * Autoloader file
 */

Autoloader::add_core_namespace('Indigo\\Core');

Autoloader::add_classes(array(
	'Indigo\\Core\\Config_Php' => __DIR__ . '/classes/config/php.php',
));
