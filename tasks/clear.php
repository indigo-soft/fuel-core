<?php

/*
 * This file is part of the Indigo Core package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
		$this->cache();
		\Cli::write("\n");
		$this->opcache();
		\Cli::write("\n");
		$this->temp();
		\Cli::write("\n");
	}

	public function opcache()
	{
		if (function_exists('opcache_reset'))
		{
			\Cli::write('===========================================');
			\Cli::write('Clearing OpCache');
			\Cli::write("-------------------------------------------\n");

			if (\Ini::get('opcache.enable', '0') !== '1')
			{
				\Cli::error('OpCache is disabled.');
			}
			elseif (\Ini::get('opcache.enable_cli', '0') !== '1')
			{
				\Cli::error('OpCache CLI is disabled.');
			}
			else
			{
				opcache_reset();
			}
		}
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

		$this->clear(APPPATH . 'cache/');
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

		$this->clear(APPPATH . 'tmp/');
	}

	protected function clear($path)
	{
		$base_path = str_replace(APPPATH, 'APPPATH/', $path);

		\Cli::write('Clearing path: ' . $base_path);

		foreach (new \DirectoryIterator($path) as $file)
		{
			if ( ! $file->isDot())
			{
				$file_path = str_replace($path, $base_path, $file->getPathname());

				if ($file->isDir())
				{
					try
					{
						\File::delete_dir($file->getPathname());
						\Cli::write('Deleting ' . $file_path . DS);
					}
					catch (\Exception $e)
					{
						\Cli::error('Directory cannot be deleted: ' . $file_path . DS);
					}
				}
				else
				{
					try
					{
						\File::delete($file->getPathname());
						\Cli::write('Deleting ' . $file_path);
					}
					catch (\Exception $e)
					{
						\Cli::error('File cannot be deleted: ' . $file_path);
					}
				}
			}
		}
	}
}
/* End of file tasks/clear.php */
