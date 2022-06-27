<?php

namespace Controller;

use Model\Repository\AbstractRepository;

abstract class AbstractController
{
    /**
     * @var AbstractRepository
    */
    protected $repository;

    abstract function insert($params = []);
    abstract function update($params = []);
    abstract function delete($id);

    function getAll()
    {
        return $this->repository->getAll();
    }

    /**
     * @param int
    */
    function getById($id)
    {
        return $this->repository->getById($id);
    }

    function setRepository($repository){
        $this->repository = $repository;
    }
}