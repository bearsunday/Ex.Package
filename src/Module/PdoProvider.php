<?php
/**
 * This file is part of the Ex.Package package
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace Ex\Package\Module;

use Aura\Sql\ExtendedPdo;
use Ray\Di\ProviderInterface;

class PdoProvider implements ProviderInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD)
     */
    public function get()
    {
        $pdo = new ExtendedPdo(
            $_ENV['DB_DSN'],
            $_ENV['DB_USER'],
            $_ENV['DB_PASS']
        );

        return $pdo;
    }
}
