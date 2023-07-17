<?php

namespace App\Controllers;

use \App\Utils\View;
use \Google\Client as GoogleClient;
use \App\Session\User as SessionUser;

class LoginController extends Controller
{


    public static function index()
    {
        $content =  View::render('pages/login');
        return self::loadContent('Indíce Economico | OMIE ', $content);
    }

    public static function loginWithGoogle($request)
    {
        $postVars = $request->getPostVars();
        $cookie = $_COOKIE['g_csrf_token'] ?? '';

        if (!isset($postVars['credential']) || !isset($postVars['g_csrf_token']) || $cookie !== $postVars['g_csrf_token']) {
            header('Location: /');
            exit;
        }

        $client = new GoogleClient(['client_id' => '888329983057-067kh0t39dcvk87ac7i368q8utbj82ne.apps.googleusercontent.com']);

        $payload = $client->verifyIdToken($postVars['credential']);
        if ($payload) {
            $userid = $payload['sub'];
            SessionUser::startSession($payload['name'], $payload['email']);
            header('Location: /admin');
            exit;
        } else {
            die('Problemas ao consultar api');
        }
    }


    public static function logout()
    {
        SessionUser::logout();
    }
}
