<?php
require_once 'app/Core/Session.php';
require_once 'app/Core/Router.php';


use App\Core\Router;
use App\Core\Session;

$session = new Session();

$session->start();

$session->set('testing', 'My ass');




$router = new Router();
$router->run();