<?php

/*
 * This file is part of the Indigo Core package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Core\Controller;

/**
 * Dummy Template Controller
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class DummyTemplateController extends \Controller
{
	use TemplateController;

	public $template;
}

/**
 * Dummy Theme Controller
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class DummyThemeController extends \Controller
{
	use ThemeController;

	public $template;

	public $theme = 'default';
}
