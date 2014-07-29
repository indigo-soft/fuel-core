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

use Codeception\TestCase\Test;

/**
 * Tests for Controllers
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Indigo\Core\Controller\TemplateController
 */
abstract class AbstractControllerTest extends Test
{
	/**
	 * Controller object
	 *
	 * @var Controller
	 */
	protected $controller;

	/**
	 * Returns Request mock
	 *
	 * @return Request
	 */
	protected function getRequestMock()
	{
		return \Mockery::mock('Request');
	}
}
