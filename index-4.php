<?php

$request = $_SERVER['REQUEST_URI'];
$viewDir = '/view/';

switch ($request) {
    case '':
    case '/':
        require __DIR__  . '../home.php';
        break;

    case '/view/login':
        require __DIR__ . $viewDir . 'login.php';
        break;
    
    case '/view/regisztracio':
        require __DIR__ . $viewDir . 'regisztracio.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . $viewDir . '404.php';
}