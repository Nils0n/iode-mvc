<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Http\Router;
use \App\Utils\View;
use \WilliamCosta\DotEnv\Environment;

Environment::load(__DIR__);

define('URL', getenv('URL'));

View::init([
    'URL' => URL
]);


$objRoute = new Router(URL);

include __DIR__ . '/routes/web.php';


$objRoute->run()->sendResponse();
