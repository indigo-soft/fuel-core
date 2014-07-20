<?php

/*
 * This file is part of the Indigo Base package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Aliased classes to work with Fuel v1
 */

use Indigo\Core\Alias;

// Make sure that instance is NOT forged before

if (Alias::exists('namespace') === false)
{
	$namespace = Alias::forge('namespace');
	$namespace->aliasNamespace('Indigo\\Core', '');
	$namespace->aliasNamespace('Indigo\\Core\\Exception', '');
	$namespace->aliasNamespace('Indigo\\Fuel', '');
}

if (Alias::exists('default') === false)
{
	Alias::forge();
}
