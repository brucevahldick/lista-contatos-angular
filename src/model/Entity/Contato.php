<?php

namespace Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table (name="contato")
 */
class Contato implements BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\Column (name="contato_id", type="integer")
     * @ORM\GeneratedValue (strategy="IDENTITY")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column (name="contato_prnome", type="string")
     * @var string
     */
    private $prnome;

    /**
     * @ORM\Column (name="contato_sbrnome", type="string")
     * @var string
     */
    private $sbrnome;

    /**
     * @ORM\OneToMany(targetEntity="FormaContato", mappedBy="contato")
     */
    private $formasDeContato;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getPrnome()
    {
        return $this->prnome;
    }

    /**
     * @param string $prnome
     */
    public function setPrnome($prnome)
    {
        $this->prnome = $prnome;
    }

    /**
     * @return string
     */
    public function getSbrnome()
    {
        return $this->sbrnome;
    }

    /**
     * @param string $sbrnome
     */
    public function setSbrnome($sbrnome)
    {
        $this->sbrnome = $sbrnome;
    }

    /**
     * @return mixed
     */
    public function getFormasDeContato()
    {
        return $this->formasDeContato;
    }

    /**
     * @param mixed $formasDeContato
     */
    public function setFormasDeContato($formasDeContato)
    {
        $this->formasDeContato = $formasDeContato;
    }

    function getObject()
    {
        return [
            "id" => $this->id,
            "prnome" => $this->prnome,
            "sbrnome" => $this->sbrnome
        ];
    }
}