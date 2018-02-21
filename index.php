<?php

require 'vendor/autoload.php';

$logger = new \Ipssi\Logger\File('app.log');
$logger->setFormater(new \Ipssi\Logger\Formatter\Error());
$logger->emergency('Mon message à logger: {test}', ['test' => 'hello']);
