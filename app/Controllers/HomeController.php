<?php

namespace App\Controllers;

use \App\Utils\View;

class HomeController extends Controller
{
    public static function index()
    {
        $content =  View::render('pages/home');
        return self::loadContent('Indíce Economico | OMIE ', $content);
    }
}
