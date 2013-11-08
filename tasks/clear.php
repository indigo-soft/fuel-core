<?php

namespace Fuel\Tasks;

class Clear
{

	/**
	 * This method gets ran when a valid method name is not used in the command.
	 *
	 * Usage (from command line):
	 *
	 * php oil r clear
	 *
	 * @return string
	 */
	public function run()
	{
		\Cli::write('===========================================');
		\Cli::write('Running all clear tasks');
		\Cli::write("-------------------------------------------\n");

		$this->cache();
		$this->temp();
	}



	/**
	 * This method gets ran when a valid method name is not used in the command.
	 *
	 * Usage (from command line):
	 *
	 * php oil r clear:cache [name]
	 *
	 * @return string
	 */
	public function cache($name = null)
	{
		\Cli::write('===========================================');
		\Cli::write('Clearing cache' . ($name ? ': ' . $name : null));
		\Cli::write("-------------------------------------------\n");

		if (is_null($name))
		{
			\Cache::delete_all();
		}
		else
		{
			\Cache::delete($name);
		}
	}

	/**
	 * This method gets ran when a valid method name is not used in the command.
	 *
	 * Usage (from command line):
	 *
	 * php oil r clear:temp "arguments"
	 *
	 * @return string
	 */
	public function temp()
	{
		\Cli::write('===========================================');
		\Cli::write('Clearing temp');
		\Cli::write("-------------------------------------------\n");

		foreach (new \DirectoryIterator(APPPATH . 'tmp/') as $file)
		{
			if ( ! $file->isDot())
			{
				\Cli::write('Deleting ' . $file->getFilename());
				unlink($file->getPathname());
			}
		}
	}

}
/* End of file tasks/clear.php */
