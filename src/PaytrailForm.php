<?php

namespace Suomato;

use Suomato\Utils\View;

class PaytrailForm
{
    protected $fields = [
        'MERCHANT_AUTHENTICATION_HASH'  => '6pKF4jkv97zmqBJ3ZL8gUw5DfT2NMQ',
        'MERCHANT_ID'                   => 13466,
    ];

    protected $options = [];

    public function __construct($fields = [], $options)
    {
        $fields             = array_merge($this->fields, $fields);
        $fields['AUTHCODE'] = $this->calculateAuthcode($fields);
        $this->fields       = $fields;
        $this->options      = $options;
    }

    public function calculateAuthcode($fields)
    {
        $keys = explode(',', $fields['PARAMS_IN']);

        $authcode_string = $fields['MERCHANT_AUTHENTICATION_HASH'];
        foreach ($keys as $key) {
            $authcode_string .= '|' . $fields[$key];
        }
        return strtoupper(sha256($authcode_string));
    }

    public static function isReceiptCorrect($params_out, $merchant_authentication_hash = '6pKF4jkv97zmqBJ3ZL8gUw5DfT2NMQ')
    {
        $keys = explode(',', $params_out);

        $return_authcode_string = '';
        foreach ($keys as $key) {
            $return_authcode_string .= $_GET[$key] . '|';
        }
        $return_authcode_string .= $merchant_authentication_hash;

        return $_GET['RETURN_AUTHCODE'] === strtoupper(sha256($return_authcode_string));
    }

    public function render()
    {
        View::render('form', [
            'fields'                => $this->fields,
            'submit_button_text'    => $this->options['SUBMIT_BUTTON_TEXT'],
            'submit_button_class'   => $this->options['SUBMIT_BUTTON_CLASS'],
        ]);
    }
}
