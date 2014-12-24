<?php

namespace Ex\Package;

use BEAR\Package\AppMeta;
use BEAR\Package\PackageModule;
use Dotenv;
use Ray\AuraSqlModule\AuraSqlModule;
use Ray\DbalModule\DbalModule;
use Ray\Di\AbstractModule;

class ExAppModule extends AbstractModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        // app meta
        $appMeta = new AppMeta('Ex\App');
        // dot env
        Dotenv::load($appMeta->appDir);
        Dotenv::required(['PDO_DSN', 'PDO_USER', 'PDO_PASSWORD']);
        Dotenv::required(['DBAL_CONFIG']);
        // bear/package
        $this->install(new PackageModule($appMeta));
        // ex/package
        $this->install(new ExModule);
        $this->install(new AuraSqlModule($_ENV['PDO_DSN'], $_ENV['PDO_USER']. $_ENV['PDO_PASSWORD']));
        $this->install(new DbalModule($_ENV['DBAL_CONFIG']));
    }
}
