<?php
/**
 * This file is part of the BEAR.Sunday package
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace Ex\Package\Inject;

use Aura\Sql\ExtendedPdoInterface;
use Psr\Log\LoggerInterface;

trait AuraSqlInject
{
    /**
     * @var ExtendedPdoInterface
     */
    private $pdo;

    /**
     * PSR Logger setter
     *
     * @param LoggerInterface $logger
     *
     * @\Ray\Di\Di\Inject
     */
    public function setAuraSql(ExtendedPdoInterface $pdo)
    {
        $this->$pdo = $pdo;
    }
}
