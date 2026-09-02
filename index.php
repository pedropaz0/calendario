<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Controller\TaskController;
use App\Controller\UserController;

session_start();

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'login':
        $controller = new UserController();
        $controller->login();
        break;
    case 'register':
        $controller = new UserController();
        $controller->register();
        break;
    case 'logout':
        $controller = new UserController();
        $controller->logout();
        break;
    case 'cadastrar':
        $controller = new TaskController();
        $controller->cadastrar();
        break;
    case 'alternar_status':
        $controller = new TaskController();
        $controller->alternarStatus();
        break;
    case 'excluir':
        $controller = new TaskController();
        $controller->excluir();
        break;
    default:
        $controller = new TaskController();
        $controller->index();
        break;
}