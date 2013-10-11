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
	'Twig_Indigo_Extension'    => __DIR__ . '/classes/twig/indigo/extension.php',
));
