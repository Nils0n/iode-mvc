<?php

use \App\Controllers;
use \App\Http\Response;

$objRoute->get('/', [
    function () {
        return new Response(200, Controllers\HomeController::index());
    }
]);
