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
 * Tests for Template Controller
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Indigo\Core\Controller\ThemeController
 * @group              Controller
 */
class ThemeControllerTest extends TemplateControllerTest
{
	public function _before()
	{
		$this->controller = new DummyThemeController($this->getRequestMock());

		$this->controller->template = __DIR__ . '/../../resources/template.php';
	}

	/**
	 * @covers            ::before
	 * @expectedException RuntimeException
	 */
	public function testFailure()
	{
		$this->controller->theme = null;

		$this->controller->before();
	}
}
