<?php

require __DIR__ . '/vendor/autoload.php';

use App\Cart;

$customer = new Cart('Mulyanto');
sleep(2);
$customer->beli('sarung', 2);
$customer->update('kopiah', 3);
$customer->bayar(200000);
