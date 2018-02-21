<?php

// Configuration service.

$service->set('logger.formatter' , function () {
    return new \Ipssi\Logger\Formatter\Error();
});

$service->set('logger', function ($c) {
    $logger = new \Ipssi\Logger\File('app.log');
    $logger->setFormater($c->get('logger.formatter'));
    return $logger;
});