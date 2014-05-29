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

	/**
	 * Core extensions
	 */
	'Indigo\\Core\\Module' => __DIR__ . '/classes/module.php',
	'Indigo\\Core\\Num'    => __DIR__ . '/classes/num.php',
	'Indigo\\Core\\Theme'  => __DIR__ . '/classes/theme.php',

	/**
	 * ORM extensions
	 */
	'Indigo\\Orm\\Observer_CreatedBy' => __DIR__ . '/classes/observer/createdby.php',
	'Indigo\\Orm\\Observer_UpdatedBy' => __DIR__ . '/classes/observer/updatedby.php',
));
