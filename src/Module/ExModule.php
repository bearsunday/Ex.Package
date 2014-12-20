<?php
/**
 * This file is part of the Ex.Package package
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace Ex\Package\Module;

use BEAR\AuraSqlModule\AuraSqlModule;
use BEAR\DbalModule\DbalModule;
use Dotenv;
use Ray\Di\AbstractModule;
use Ray\Di\Scope;

class ExModule extends AbstractModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        Dotenv::required(['PDO_DSN', 'PDO_USER', 'PDO_PASSWORD']);
        Dotenv::required(['DBAL_CONFIG']);
        $this->install(new AuraSqlModule);
        $this->install(new DbalModule);
    }
}
