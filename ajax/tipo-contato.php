<?php

require '../vendor/autoload.php';

use Model\Factory\TipoContatoFactory;

$action = $_GET['action'];
if ($action) {
    try {
        call_user_func(actions()[$action]);
    } catch (Exception $exception) {
        echo $exception->getMessage();
    }
} else {
    throw new Exception("Ação não informada");
}

function actions()
{
    return [
        "getTiposContato" => function () {
            $factory = new TipoContatoFactory();
            echo json_encode($factory->getAll());
        }
    ];
}