<?php

namespace Suomato\Utils;

class View
{
    protected static function twig()
    {
        $loader   = new \Twig_Loader_Filesystem(__DIR__ . '/../views');
        $twig     =  new \Twig_Environment($loader);
        $twig->addExtension(new Paytrail_Twig_Extension);
        return $twig;
    }

    public static function render($template, $params)
    {
        echo self::twig()->render($template . '.twig', $params);
    }

    public static function compile($template, $params)
    {
        return self::twig()->render($template . '.twig', $params);
    }
}
