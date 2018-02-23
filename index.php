<?php

require 'vendor/autoload.php';

$service = new \Ipssi\Service\Container();
$logger = $service->get('logger');

//$logger->emergency('Mon message à logger: {test}', ['test' => 'hello']);

//$service->get('logger')->emergency();
