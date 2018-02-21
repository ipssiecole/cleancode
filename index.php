<?php

require 'vendor/autoload.php';

$errHandler = new \Ipssi\ErrorException();

//try {
//    trigger_error('my error');
//} catch (Exception $e) {
//    echo $e;
//}

$logger = new \Ipssi\Logger\File('app.log');
$logger->setFormater(new \Ipssi\Logger\Formatter\Error());

$logger->emergency('Mon message à logger: {test}', ['test' => 'hello']);

$service->get('logger')->emergency();
