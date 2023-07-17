<?php

namespace App\Controllers;

use \App\Utils\View;
use \App\Session\User as SessionUser;

class AdminController extends Controller
{
    public static function index()
    {
        $name = SessionUser::getInfo()['name'];

        $content =  View::render('pages/admin', ['name' => $name]);
        return self::loadContent('Indíce Economico | OMIE ', $content);
    }
}
