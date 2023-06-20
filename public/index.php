<?php

use Controllers\HomeController;
use Router\Router;

require "../vendor/autoload.php";


$router = new Router();

$router->register('/', ['Controllers\HomeController', 'index']);

// $router->register('/contact', function () {
//     return 'Contact Page';
// });

// echo '<pre>';
// var_dump($router);
// echo '<pre/>';


try {
    $router->resolve($_SERVER["REQUEST_URI"]);
    var_dump($router->resolve($_SERVER["REQUEST_URI"]));
} catch (\Throwable $e) {
    echo $e->getMessage();
}
