<?php

if (!is_file(__DIR__ . '/../vendor/autoload.php')) {
    exit('/!\ Please run composer install /!\\');
}

require __DIR__ . '/../vendor/autoload.php';

date_default_timezone_set('Europe/Paris');

$router = new AltoRouter();

if (array_key_exists('BASE_URI', $_SERVER)) {
    $router->setBasePath($_SERVER['BASE_URI']);
} else {
    $_SERVER['BASE_URI'] = '/';
}

$router->map(
    'GET',
    '/',
    [
        'method' => 'home',
        'controller' => '\PhpTest\Controllers\MainController'
    ],
    'home'
);

$router->map(
    'GET',
    '/city',
    [
        'method' => 'weatherByCity',
        'controller' => '\PhpTest\Controllers\MainController'
    ],
    'weatherByCity'
);

$router->map(
    'GET',
    '/coord',
    [
        'method' => 'weatherByCoordinates',
        'controller' => '\PhpTest\Controllers\MainController'
    ],
    'weatherByCoordinates'
);

$router->map(
    'GET',
    '/cityId',
    [
        'method' => 'weatherByCityId',
        'controller' => '\PhpTest\Controllers\MainController'
    ],
    'weatherByCityId'
);

$router->map(
    'GET',
    '/error',
    [
        'method' => 'home',
        'controller' => '\PhpTest\Controllers\MainController'
    ],
    'error'
);

$match = $router->match();

$dispatcher = new Dispatcher($match, '\PhpTest\Controllers\ErrorController::err404');

// Setup controllers argument(s)
$dispatcher->setControllersArguments($match, $router);

$dispatcher->dispatch();
