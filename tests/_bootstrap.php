<?php
// This is global bootstrap for autoloading

$fuel = realpath(__DIR__ . '/../../../..');

if ($travis = getenv('TRAVIS_BUILD_DIR'))
{
	$fuel = '/tmp/fuel';
}

$_SERVER['doc_root']     = $fuel;
$_SERVER['app_path']     = $fuel . '/fuel/app';
$_SERVER['core_path']    = $fuel . '/fuel/core';
$_SERVER['package_path'] = $fuel . '/fuel/packages';
$_SERVER['vendor_path']  = $fuel . '/fuel/vendor';

require_once $_SERVER['core_path'] . '/bootstrap_phpunit.php';

if ($travis)
{
	$paths = \Config::get('package_paths', []);
	$paths[] = realpath($travis.'/..').DS;
	\Config::set('package_paths', $paths);
}

\Package::load('core');
\Composer::package('core');
