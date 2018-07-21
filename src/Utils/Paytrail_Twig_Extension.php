<?php

namespace Suomato\Utils;

class Paytrail_Twig_Extension extends \Twig_Extension implements \Twig_Extension_GlobalsInterface
{
    public function getGlobals()
    {
        return [
            'Form' => new Form(),
        ];
    }
}
