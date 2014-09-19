<?php

/*
 * This file is part of the Indigo Core package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

Autoloader::add_core_namespace('Indigo\\Core', true);
Autoloader::add_core_namespace('Indigo\\Fuel', true);

/**
 * Core Extensions
 */
Autoloader::add_classes(array(
	/**
	 * Core extensions
	 */
	'Indigo\\Core\\Theme'  => __DIR__ . '/classes/theme.php',
));
