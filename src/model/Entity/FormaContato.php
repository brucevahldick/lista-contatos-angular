<?php

namespace Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table (name="formaContato")
*/
class FormaContato implements BaseEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue (strategy="IDENTITY")
     * @ORM\Column (name="formaContato_id", type="integer")
     * @var int
    */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Contato", inversedBy="formasDeContato")
     * @ORM\JoinColumn(name="contato_id", referencedColumnName="contato_id", nullable=false)
     * @var Contato
     */
    private $contato;

    /**
     * @ORM\Column (name="formaContato_tipo", type="string")
     * @var string
    */
    private $tipo;

    /**
     * @ORM\Column (name="formaContato_info", type="string")
     * @var string
     */
    private $info;

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
     * @return Contato
     */
    public function getContato()
    {
        return $this->contato;
    }

    /**
     * @param Contato $contato
     */
    public function setContato($contato)
    {
        $this->contato = $contato;
    }

    /**
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param string $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param string $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
    }

    function getObject(){
        return [
            "id" => $this->id,
            "info" => $this->info,
            "tipoContato" => $this->tipo
        ];
    }
}