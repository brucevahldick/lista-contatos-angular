<?php
require '../vendor/autoload.php';

$action = $_GET['action'];
if ($action) {
    try {
        call_user_func(actions()[$action]);
    } catch (Exception $exception) {
        echo $exception->getMessage();
    }
} else {
    throw new Exception();
}

function actions()
{
    return [
        "inserirContato" => function () {
            $inputContent = file_get_contents('php://input');
            $data = json_decode($inputContent, true);
            $controller = new \Controller\ContatoController();
            if ($controller->insert($data))
                echo "Sucesso!";
            else
                echo "Erro";
        },
        "getContatos" => function () {
            $controller = new \Controller\ContatoController();
            $contatos = $controller->getAll();
            $return = [];
            foreach ($contatos as $contato)
                $return[] = $contato->getObject();
            echo json_encode($return);
        },
        "removeContato" => function () {
            $inputContent = file_get_contents('php://input');
            $data = json_decode($inputContent, true);

            $controller = new \Controller\ContatoController();
            $controller->delete($data['id']);
        },
        "editarContato" => function () {
            $inputContent = file_get_contents('php://input');
            $data = json_decode($inputContent, true);

            $controller = new \Controller\ContatoController();
            if ($controller->update($data))
                echo "Sucesso";
            else
                echo "Erro";
        },
        "getFormasContatoContato" => function () {
            try {
                $id = $_GET['id'];
            } catch (Exception $exception) {
                echo $exception->getMessage();
            }
            $controllerFormaContato = new Controller\FormaContatoController();
            $controllerContato = new \Controller\ContatoController();
            $formasContato = $controllerFormaContato->getAllOfContato($controllerContato->getById($id));
            $return = [];
            foreach ($formasContato as $contato)
                $return[] = $contato->getObject();
            echo json_encode($return);
        },
        "removerFormaDeContatoContato" => function () {
            $inputContent = file_get_contents('php://input');
            $data = json_decode($inputContent, true);

            $controller = new \Controller\FormaContatoController();
            $controller->delete($data['id']);
        }
    ];
}