<?php
require __DIR__ . '/../vendor/autoload.php';

use Suomato\PaytrailForm;

$paytrail_form = new PaytrailForm(
    [
    /*
     *
     * MERCHANT_AUTHENTICATION_HASH and 'MERCHANT_ID' is the
     * identification number given by Paytrail.
     *
     * If these are commented out, demo credentials will be used
     *
     */

    // 'MERCHANT_AUTHENTICATION_HASH'  => '',
    // 'MERCHANT_ID'                   => '',

    /*
     * URL where customer is redirected after successful payment.
     */
    'URL_SUCCESS'                   => 'http://' . $_SERVER['HTTP_HOST'] . '/example/success.php',

    /**
     * URL where customer is redirected after failed or cancelled payment.
     */
    'URL_CANCEL'                    => 'http://' . $_SERVER['HTTP_HOST'] . '/example/cancel.php',

    /**
     * URL to be called when the payment has been marked as paid.
     * This URL is called with parameters defined in PARAMS_OUT_NOTIFY
     * when the payment is marked as paid.
     */
    'URL_NOTIFY'                    => 'http://www.example.com/notify',

    /**
     * Comma separated list of fields used in AUTHCODE calculation.
     */
    'PARAMS_IN'                     => 'MERCHANT_ID,URL_SUCCESS,URL_CANCEL,ORDER_NUMBER,PARAMS_IN,PARAMS_OUT,ITEM_TITLE[0],ITEM_ID[0],ITEM_QUANTITY[0],ITEM_UNIT_PRICE[0],ITEM_VAT_PERCENT[0],ITEM_DISCOUNT_PERCENT[0],ITEM_TYPE[0],MSG_UI_MERCHANT_PANEL,URL_NOTIFY,LOCALE,CURRENCY,REFERENCE_NUMBER,PAYMENT_METHODS,PAYER_PERSON_PHONE,PAYER_PERSON_EMAIL,PAYER_PERSON_FIRSTNAME,PAYER_PERSON_LASTNAME,PAYER_COMPANY_NAME,PAYER_PERSON_ADDR_STREET,PAYER_PERSON_ADDR_POSTAL_CODE,PAYER_PERSON_ADDR_TOWN,PAYER_PERSON_ADDR_COUNTRY,VAT_IS_INCLUDED,ALG',

    /**
     * Comma separated list of fields used in return AUTHCODE calculation.
     */
    'PARAMS_OUT'                    => 'ORDER_NUMBER,PAYMENT_ID,AMOUNT,CURRENCY,PAYMENT_METHOD,TIMESTAMP,STATUS',

    /**
     * Order number is used to identify one transaction.
     */
    'ORDER_NUMBER'                  => '123456',

    /**
     * Message to consumers bank statement or credit card bill if supported by payment method.
     */
    'MSG_UI_MERCHANT_PANEL'         => 'Order 123456',

    /**
     * The default language of payment method selection page.
     * Supported Values: fi_FI, sv_SE, en_US
     */
    'LOCALE'                        => 'fi_FI',

    /**
     * Payer's first name.
     */
    'PAYER_PERSON_FIRSTNAME'        => 'John',

    /**
     * Payer's last name.
     */
    'PAYER_PERSON_LASTNAME'         => 'Doe',

    /**
     * Payer's email.
     */
    'PAYER_PERSON_EMAIL'            => 'john.doe@example.com',

    /**
     * Payer's telephone number.
     */
    'PAYER_PERSON_PHONE'            => '01234567890',

    /**
     * Payer's street address.
     */
    'PAYER_PERSON_ADDR_STREET'      => 'Test street 1',

    /**
     * Payer's postal code.
     */
    'PAYER_PERSON_ADDR_POSTAL_CODE' => '608009',

    /**
     * Payer's town.
     */
    'PAYER_PERSON_ADDR_TOWN'        => 'Test town',

    /**
     * Payer's town.
     * Format: ISO 3166-2
     */
    'PAYER_PERSON_ADDR_COUNTRY'     => 'FI',

    /**
     * Payer's company.
     */
    'PAYER_COMPANY_NAME'            => 'Test company',

    /**
     * Whether VAT is included in prices given in ITEM records.
     * 1 = VAT is included
     * 0 = VAT is not included.
     */
    'VAT_IS_INCLUDED'               => '1',

    /**
     * Free field for product name.
     */
    'ITEM_TITLE[0]'                 => 'Product 101',

    /**
     * Product id.
     */
    'ITEM_ID[0]'                    => '101',

    /**
     * Quantity of products.
     */
    'ITEM_QUANTITY[0]'              => '2',

    /**
     * The price for a single product.
     */
    'ITEM_UNIT_PRICE[0]'            => '300.00',

    /**
     * Vat percent used for product.
     */
    'ITEM_VAT_PERCENT[0]'           => '15.00',

    /**
     * Item discount.
     */
    'ITEM_DISCOUNT_PERCENT[0]'      => '50',

    /**
     * Type of the product.
     * 1 = normal
     * 2 = shipment cost3 = handling cost.
     */
    'ITEM_TYPE[0]'                  => '1',
],
[
    /**
     * Submit button text
     */
    'SUBMIT_BUTTON_TEXT'            => 'Pay here',

    /**
     * Submit button css-classes
     */
    'SUBMIT_BUTTON_CLASS'           => 'paytrail-submit-button',
]
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        input {
            display: block;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <?php $paytrail_form->render();?>
</body>
</html>

