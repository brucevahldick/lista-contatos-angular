<?php

namespace Model\Repository;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class Bootstrap
{
    private $entityManager;
    private static $instance;

    private function __construct()
    {
        $isDevMode = true;
        $proxyDir = null;
        $cache = null;
        $useSimpleAnnotationReader = false;
        $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . "/src"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);

        $conn = array(
            'dbname' => 'testedoctrine',
            'user' => 'postgres',
            'password' => 'root',
            'host' => 'localhost',
            'port' => '5433',
            'driver' => 'pdo_pgsql',
        );

        // obtaining the entity manager
        $this->entityManager = EntityManager::create($conn, $config);
    }

    /**
     * @return EntityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * @return Bootstrap
     */
    public static function getInstance()
    {
        if (self::$instance == null)
            self::$instance = new Bootstrap();
        return self::$instance;
    }
}