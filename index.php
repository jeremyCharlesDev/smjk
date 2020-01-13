<?php

session_start();
include 'Model/Model.php';
include 'View/View.php';

include 'Controller/Controller.php';
include 'Controller/ClientController.php';

if (isset($_GET['controller'])) {
    $controllerStart = ucfirst($_GET["controller"]) . "Controller";
} else {
    $controllerStart = 'ClientController';
}

$controller = new $controllerStart();

if (isset($_GET['action'])) {
    $action = $_GET["action"];
} else {
    $action = 'start';
}

$controller->$action();