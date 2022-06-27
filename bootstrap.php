<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require "vendor/autoload.php";

$isDevMode = true;
$proxyDir  = null;
$cache     = null;
$useSimpleAnnotationReader = false;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src/model/Entity"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);

$conn = array(
    'dbname' => 'testedoctrine',
    'user' => 'postgres',
    'password' => 'root',
    'host' => 'localhost',
    'port' => '5433',
    'driver' => 'pdo_pgsql',
);

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);