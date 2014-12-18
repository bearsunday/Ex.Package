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

class ExModule extends AbstractModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        Dotenv::required(['DB_DSN', 'DB_USER', 'DB_PASS']);
        $this->bind(ExtendedPdoInterface::class)->toProvider(PdoProvider::class)->in(Scope::SINGLETON);
    }
}



