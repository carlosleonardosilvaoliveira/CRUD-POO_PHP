<?php

require_once '../App/core/global.php';

if (isset($_GET['controller'])) {
    $controllerObj = carregarController($_GET['controller']);

    lauchAction($controllerObj);
} else {
    $controllerObj = carregarController(CONTROLLER_DEFECTO);

    lauchAction($controllerObj);
}

function carregarController($controller)
{
    switch ($controller) {
        case 'terminais':
            $strFileController = '../App/Controller/TerminaisController.php';
            require_once $strFileController;
            $controllerObj = new TerminaisController();
            break;

        default:
            $strFileController = '../App/Controller/TerminaisController.php';
            require_once $strFileController;
            $controllerObj = new TerminaisController();
            break;
    }
    return $controllerObj;
}

function lauchAction($controllerObj)
{
    if (isset($_GET['action'])) {
        $controllerObj->run($_GET['action']);
    } else {
        $controllerObj->run(DEFECT_ACTION);
    }
}