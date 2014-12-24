<?php

namespace BEAR\Package\Module;

use BEAR\Sunday\Extension\Application\AppInterface;
use Ex\Package\ExAppModule;
use Ex\Skeleton\Module\ExApp;
use Ray\Di\Injector;

class ExAppModuleTest extends \PHPUnit_Framework_TestCase
{
    public function testApp()
    {
        new ExAppModule;
//        $injector = new Injector(new ExAppModule);
//        $app = $injector->getInstance(AppInterface::class);
//        $this->assertInstanceOf(ExApp::class, $app);
    }
}
