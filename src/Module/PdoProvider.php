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
            $_ENV['PDO_DSN'],
            $_ENV['PDO_USER'],
            $_ENV['PDO_PASSWORD']
        );

        return $pdo;
    }
}
