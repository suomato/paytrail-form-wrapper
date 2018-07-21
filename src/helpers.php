<?php

namespace Suomato;

function sha256($string)
{
    return hash('sha256', $string);
}

function twigMarkup($element)
{
    return new \Twig_Markup($element, 'utf-8');
}

function stringifyAttributes($attributes)
{
    foreach ($attributes as $key => $value) {
        $attributes_string .= $key . '="' . $value . '" ';
    }

    return rtrim($attributes_string);
}
