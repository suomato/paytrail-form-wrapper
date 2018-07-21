<?php

namespace Suomato\Utils;

use function Suomato\twigMarkup;
use function Suomato\stringifyAttributes;

class Form
{
    public function open($args)
    {
        $action = $args['url'];
        $method = $args['method'] ?? 'get';

        return twigMarkup('<form action="' . $action . '" method="' . $method . '">');
    }

    public function close()
    {
        return twigMarkup('</form>');
    }

    public function hidden($name = '', $value = '', $attributes = [])
    {
        $attribute_string = stringifyAttributes(array_merge(compact('name', 'value'), $attributes));

        return twigMarkup('<input type="hidden" ' . $attribute_string . '>');
    }

    public function submit($value, $attributes = [])
    {
        $attribute_string = stringifyAttributes(array_merge(compact('value'), $attributes));

        return twigMarkup('<input type="submit"' . $attribute_string . '>');
    }
}
