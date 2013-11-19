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

		$this->delete_recursive(APPPATH . 'cache/');
	}

	/**
	 * This method gets ran when a valid method name is not used in the command.
	 *
	 * Usage (from command line):
	 *
	 * php oil r clear:temp
	 *
	 * @return string
	 */
	public function temp()
	{
		\Cli::write('===========================================');
		\Cli::write('Clearing temp');
		\Cli::write("-------------------------------------------\n");

		$this->delete_recursive(APPPATH . 'tmp/');
	}

	protected function delete_recursive($path, $root = null)
	{
		is_null($root) and $root = $path;
		foreach (new \DirectoryIterator($path) as $file)
		{
			if ( ! $file->isDot())
			{
				if ($file->isDir())
				{
					$this->temp_recursive($file->getPathname(), $root);
					\Cli::write('Deleting ' . str_replace($root, '', $file->getPathname()));
					rmdir($file->getPathname());
				}
				else
				{
					\Cli::write('Deleting ' . str_replace($root, '', $file->getPathname()));
					unlink($file->getPathname());
				}
			}
		}
	}
}
/* End of file tasks/clear.php */
