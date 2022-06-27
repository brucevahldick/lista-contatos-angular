<?php

namespace Controller;

use Model\Entity\Contato;
use Model\Entity\FormaContato;
use Model\Repository\FormaContatoRepository;

class FormaContatoController extends AbstractController
{

    public function __construct()
    {
        $this->setRepository(new FormaContatoRepository());
    }

    function insert($params = [])
    {
        $formaContato = new FormaContato();
        $formaContato->setInfo($params['info']);
        $formaContato->setTipo($params['tipoContato']);
        $formaContato->setContato($params['contato']);
        if (!$this->repository->insert($formaContato))
            return false;
        return true;
    }

    function update($params = [])
    {
        $formaContato = $this->getById($params['id']);
        $formaContato->setInfo($params['info']);
        $formaContato->setTipo($params['tipoContato']);
        $formaContato->setContato($params['contato']);
        if (!$this->repository->update())
            return false;
        return true;
    }

    function getAllOfContato(Contato $contato)
    {
        return $this->repository->getAllOfContato($contato);
    }

    function delete($id)
    {
        $formaContato = $this->repository->getById($id);
        return $this->repository->delete($formaContato);
    }
}