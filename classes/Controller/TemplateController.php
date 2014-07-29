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
 * Template Controller
 *
 * A base controller for easily creating templated output
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
trait TemplateController
{
	/**
	 * {@inheritdoc}
	 *
	 * Loads the template and creates the $this->template object
	 *
	 * @codeCoverageIgnore
	 */
	public function before()
	{
		parent::before();

		if (isset($this->template) === false)
		{
			throw new \RuntimeException('Template property does not exist.');
		}

		if (empty($this->template) === false and is_string($this->template))
		{
			$this->template = $this->view($this->template);
		}
	}

	/**
	 * Creates a new View object
	 *
	 * @see View::forge
	 *
	 * @return View
	 */
	protected function view($view, $data = [], $auto_filter = null)
	{
		return \View::forge($view, $data, $auto_filter);
	}

	/**
	 * {@inheritdoc}
	 *
	 * Sets the response if no custom response is returned
	 *
	 * @codeCoverageIgnore
	 */
	public function after($response)
	{
		if (empty($response))
		{
			$response = $this->template;
		}

		return parent::after($response);
	}
}
