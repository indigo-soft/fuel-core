<?php

class Twig_Indigo_Extension extends Twig_Extension
{

	/**
	 * Gets the name of the extension.
	 *
	 * @return  string
	 */
	public function getName()
	{
		return 'indigo';
	}

	public function getFunctions()
	{
		return array(
			'auth_has_access'    => new Twig_Function_Function('Auth::has_access'),
		);
	}

	public function getFilters()
	{

		return array(
			'md5'      => new Twig_Filter_Function('md5'),
		);
	}
}