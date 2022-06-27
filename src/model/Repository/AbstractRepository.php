<?php

namespace Model\Repository;

use Model\Entity\BaseEntity;

abstract class AbstractRepository
{
    protected $conn;

    public function __construct()
    {
        $this->conn = Bootstrap::getInstance();
    }

    abstract function insert(BaseEntity $entity);

    function update()
    {
        try {
            $this->conn->getEntityManager()->flush();
            return true;
        } catch (\Exception $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    function delete(BaseEntity $entity)
    {
        try {
            $this->conn->getEntityManager()->remove($entity);
            $this->conn->getEntityManager()->flush();
            return true;
        } catch (\Exception $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    function getAll()
    {
        try {
            return $this->conn->getEntityManager()->getRepository($this->getEntityName())->findAll();
        } catch (\Exception $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    /**
     * @param int
     */
    function getById($id)
    {
        try {
            return $this->conn->getEntityManager()->getRepository($this->getEntityName())->findOneBy(['id' => $id]);
        } catch (\Exception $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    abstract protected function getEntityName();
}