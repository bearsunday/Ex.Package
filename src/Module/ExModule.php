<?php
/**
 * This file is part of the Ex.Package package
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace Ex\Package\Module;

use Aura\Sql\ExtendedPdoInterface;
use Dotenv;
use Ray\Di\AbstractModule;
use Ray\Di\Scope;
use Doctrine\DBAL\Driver\Connection;


class ExModule extends AbstractModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        Dotenv::required(['PDO_DSN', 'PDO_USR', 'PDO_PASSWORD']);
        Dotenv::required(['DBAL_DSN']);
        $this->bind(ExtendedPdoInterface::class)->toProvider(PdoProvider::class)->in(Scope::SINGLETON);
        $this->bind(Connection::class)->toProvider(DbalProvider::class)->in(Scope::SINGLETON);
    }
}
