<?php
require './classes/Router.php';
require './classes/Felhasznalo.php';
$router = new Router();
$felhasznalo = new Felhasznalo();

//$router->get('/', [$felhasznalo, '']);
$router->get('./view/login', [$felhasznalo, 'login']);
$router->post('./view/regisztracio', [$felhasznalo, 'submitNewData']);
$router->dispatch();
