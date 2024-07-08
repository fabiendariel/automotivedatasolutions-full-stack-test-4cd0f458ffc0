<?php
require __DIR__ . '/../vendor/autoload.php';

$factory = new \PsrJwt\Factory\Jwt();

$builder = $factory->builder();

$token = $builder->setSecret('Secret123!456$')
    ->build();

echo $token->getToken();