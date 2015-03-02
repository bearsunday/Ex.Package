<?php

use Doctrine\Common\Annotations\AnnotationRegistry;

// load
$loader = require dirname(__DIR__).'/vendor/autoload.php';
AnnotationRegistry::registerLoader([$loader, 'loadClass']);
/* @var $loader \Composer\Autoload\ClassLoader */

// set the application path into the globals so we can access it in the tests.
$_ENV['TEST_DIR'] = __DIR__;
$_ENV['TMP_DIR'] = __DIR__.'/tmp';
