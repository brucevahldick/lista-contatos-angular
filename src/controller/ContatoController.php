<?php

namespace Controller;

use Model\Entity\Contato;
use Model\Entity\FormaContato;
use Model\Repository\ContatoRepository;

class ContatoController extends AbstractController
{
    public function __construct()
    {
        $this->setRepository(new ContatoRepository());
    }

    function insert($params = [])
    {
        $contato = new Contato();
        $contato->setPrnome($params['prnome']);
        $contato->setSbrnome($params['sbrnome']);
        if ($this->repository->insert($contato)) {
            foreach ($params['formasDeContato'] as $param) {
                $param['contato'] = $contato;
                $formaContatoController = new FormaContatoController();
                if (!$formaContatoController->insert($param))
                    return false;
            }
            return true;
        }

        return false;
    }

    function delete($id)
    {
        $contato = $this->repository->getById($id);
        $formaContatoController = new FormaContatoController();
        $formasContato = $formaContatoController->getAllOfContato($contato);
        foreach ($formasContato as $formaContato) {
            if (!$formaContatoController->delete($formaContato->getId()))
                return false;
        }

        return $this->repository->delete($contato);
    }

    function update($params = [])
    {
        $contato = $this->getById($params['id']);
        $contato->setPrnome($params['prnome']);
        $contato->setSbrnome($params['sbrnome']);
        if ($this->repository->update()) {
            foreach ($params['formasDeContato'] as $param) {
                $param['contato'] = $contato;
                $formaContatoController = new FormaContatoController();
                if (isset($param['id'])) {
                    if (!$formaContatoController->update($param))
                        return false;
                } else {
                    if (!$formaContatoController->insert($param))
                        return false;
                }

            }

            return true;
        }

        return false;
    }
}