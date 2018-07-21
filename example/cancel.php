<?php

require __DIR__ . '/../vendor/autoload.php';

use Suomato\PaytrailForm;

$params_out                   = 'ORDER_NUMBER,PAYMENT_ID,AMOUNT,CURRENCY,PAYMENT_METHOD,TIMESTAMP,STATUS';

$message = PaytrailForm::isReceiptCorrect($params_out) ? 'Receipt is Correct!' : 'Something went wrong!';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cancel Page</title>
</head>
<body>
    <h1>Cancel page</h1>
    <h4><?= $message ?></h4>
</body>
</html>
