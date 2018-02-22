<?php

require 'vendor/autoload.php';

$service = new \Ipssi\Service\Container();

require_once 'services.php';

$logger = $service->get('logger');

var_dump($logger);

//$logger->emergency('Mon message à logger: {test}', ['test' => 'hello']);

//$service->get('logger')->emergency();
