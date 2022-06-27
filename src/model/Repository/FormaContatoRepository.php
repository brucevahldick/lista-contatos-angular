<?php

namespace Model\Repository;

use Model\Entity\BaseEntity;
use Model\Entity\Contato;

class FormaContatoRepository extends AbstractRepository
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

    function getAllOfContato(Contato $contato)
    {
        try {
            return $this->conn->getEntityManager()->getRepository($this->getEntityName())->findBy(['contato' => $contato]);
        } catch (\Exception $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    protected function getEntityName()
    {
        return "Model\Entity\FormaContato";
    }
}