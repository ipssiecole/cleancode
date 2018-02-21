<?php

require 'vendor/autoload.php';

$logger = new \Ipssi\Logger\File('app.log');
$logger->emergency('Mon message à logger: {test}', ['test' => 'hello']);
