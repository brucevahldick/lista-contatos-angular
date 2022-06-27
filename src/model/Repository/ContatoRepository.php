<?php

namespace Model\Repository;

use Model\Entity\BaseEntity;

class ContatoRepository extends AbstractRepository
{

    function insert(BaseEntity $entity)
    {
        try {
            $this->conn->getEntityManager()->persist($entity);
            $this->conn->getEntityManager()->flush();
            return true;
        } catch (\Exception $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    protected function getEntityName()
    {
        return "Model\Entity\Contato";
    }
}