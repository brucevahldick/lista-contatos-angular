<?php

namespace Model\Factory;

class TipoContatoFactory
{
    /**
     * @var array
     */
    private $tipos;
    public static $TELEFONE = "Telefone";
    public static $CELULAR = "Celular";
    public static $EMAIL = "Email";

    function __construct()
    {
        $this->tipos[] = self::$TELEFONE;
        $this->tipos[] = self::$CELULAR;
        $this->tipos[] = self::$EMAIL;
    }

    function getTipo($id)
    {
        return $this->tipos[$id];
    }

    function getAll()
    {
        return $this->tipos;
    }
}