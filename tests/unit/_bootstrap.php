<?php
// Here you can initialize variables that will be available to your tests

$package = \Codeception\Configuration::projectDir();

\Package::load('core', $package);

require_once __DIR__ . '/stubs/Controllers.php';
require_once __DIR__ . '/stubs/Facades.php';
require_once __DIR__ . '/stubs/Helpers.php';
require_once __DIR__ . '/stubs/Models.php';
