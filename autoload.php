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

if (Alias::exists('namespace') === false)
{
	$namespace = Alias::forge('namespace');
	$namespace->aliasNamespace('Indigo\\Core', '');
}

if (Alias::exists('default') === false)
{
	Alias::forge();
}