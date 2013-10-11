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

	public function getFilters()
	{

		return array(
			'md5'      => new Twig_Filter_Function('md5'),
		);
	}
}