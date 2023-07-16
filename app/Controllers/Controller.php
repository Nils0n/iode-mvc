<?php

namespace App\Controllers;

use \App\Utils\View;



class Controller
{
    private static function getHeader()
    {
        return View::render('/templates/header');
    }

    private static function getFooter()
    {
        return View::render('/templates/footer');
    }

    public static function loadContent($title, $content)
    {

        return View::render(
            '/templates/basis',
            [
                'title' => $title,
                'header' => self::getHeader(),
                'content' => $content,
                'footer' => self::getFooter()
            ]

        );
    }
}
