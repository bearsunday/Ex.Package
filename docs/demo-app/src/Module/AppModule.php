<?php

namespace Ex\App\Module;

use Ex\Package\ExAppModule;
use Ray\Di\AbstractModule;

class AppModule extends AbstractModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->install(new ExAppModule);
    }
}
