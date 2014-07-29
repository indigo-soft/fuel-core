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
 * @coversDefaultClass Indigo\Core\Controller\TemplateController
 * @group              Core
 * @group              Controller
 */
class TemplateControllerTest extends AbstractControllerTest
{
	public function _before()
	{
		$this->controller = new DummyTemplateController($this->getRequestMock());

		$this->controller->template = __DIR__ . '/../../resources/default/template.php';
	}

	/**
	 * @covers ::before
	 * @covers ::init
	 * @covers ::view
	 */
	public function testTemplate()
	{
		$this->controller->before();

		$this->assertInstanceOf('View', $this->controller->template);
	}

	/**
	 * @covers            ::init
	 * @expectedException RuntimeException
	 */
	public function testFailure()
	{
		$this->controller->template = null;

		$this->controller->before();
	}

	/**
	 * @covers ::after
	 */
	public function testResponse()
	{
		$this->controller->before();

		$response = $this->controller->after(null);

		$this->assertInstanceOf('Response', $response);
		$this->assertSame($this->controller->template, $response->body());
	}
}
