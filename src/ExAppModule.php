<?php

namespace Ex\Package;

use BEAR\Package\AppMeta;
use BEAR\Package\PackageModule;
use Dotenv;
use Ex\Package\Module\ExModule;
use Ray\Di\AbstractModule;

class ExAppModule extends AbstractModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $appMeta = new AppMeta('Ex\App');
        Dotenv::load($appMeta->appDir);

        // bear/package
        $this->install(new PackageModule($appMeta));
        // ex/package
        $this->install(new ExModule);
    }
}
