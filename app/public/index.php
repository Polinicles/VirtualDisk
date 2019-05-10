<?php

require_once '../vendor/autoload.php';

use App\Factory\FakeDisk;
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;

/* Initiate the $_SESSION */
session_start();

/* Initiate the disk */
if(!isset($_SESSION['disk'])) {
    $_SESSION['disk'] = FakeDisk::createFakeDisk();
}

/* Define the initial directory */
if(!isset($_SESSION['selectedFolder'])) {
    $_SESSION['selectedFolder'] = 'Home';
}

$router = new RouteCollector();

/* Get the routing from our routes.php */
require_once '../src/Http/routes.php';

$dispatcher = new Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
