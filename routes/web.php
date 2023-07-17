<?php

use \App\Controllers;
use \App\Http\Response;
use \App\Session\User as SessionUser;

$objRoute->get('/', [
    function () {
        return new Response(200, Controllers\HomeController::index());
    }
]);

$objRoute->get('/admin', [
    function () {
        if (SessionUser::isLogged()) {
            return new Response(200, Controllers\AdminController::index());
        } else {
            header('Location: /');
            exit;
        }
    }
]);

$objRoute->get('/login', [
    function () {
        if (SessionUser::isLogged()) {
            header('Location: /admin');
            exit;
        } else {
            return new Response(200, Controllers\LoginController::index());
        }
    }
]);

$objRoute->get('/logout', [
    function () {
        return new Response(200, Controllers\LoginController::logout());
    }
]);

$objRoute->post('/login/google', [
    function ($request) {
        return new Response(200, Controllers\LoginController::loginWithGoogle($request));
    }
]);
