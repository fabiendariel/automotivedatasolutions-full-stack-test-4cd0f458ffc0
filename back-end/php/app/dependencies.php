<?php
declare(strict_types=1);

use App\Application\Settings\SettingsInterface;
use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Tuupola\Middleware\JwtAuthentication;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        LoggerInterface::class => function (ContainerInterface $c) {
            $settings = $c->get(SettingsInterface::class);

            $loggerSettings = $settings->get('logger');
            $logger = new Logger($loggerSettings['name']);

            $processor = new UidProcessor();
            $logger->pushProcessor($processor);

            $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
            $logger->pushHandler($handler);

            return $logger;
        },
        \PDO::class => function (ContainerInterface $container) {
            $settings = $container->get(SettingsInterface::class)->get('db');

            $host = $settings['host'];
            $dbname = $settings['database'];
            $username = $settings['username'];
            $password = $settings['password'];
            $charset = $settings['charset'];
            $flags = $settings['flags'];
            $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

            error_log($dsn);
        
            return new PDO($dsn, $username, $password, $flags);
        },
    ]);
};
