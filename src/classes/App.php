<?php

namespace App;

use DI\ContainerBuilder;
use Interop\Container\ContainerInterface;

class App extends \DI\Bridge\Slim\App
{
    protected function configureContainer(ContainerBuilder $builder)
    {
        $definitions = [
            'settings.displayErrorDetails' => true,

            \Slim\Views\Twig::class => function (ContainerInterface $container) {
                $view = new \Slim\Views\Twig(__DIR__ . '/../templates', [
                    'cache' => false,
                ]);

                $view->addExtension(new \Slim\Views\TwigExtension(
                    $container->get('router'),
                    $container->get('request')->getUri()
                ));

                return $view;
            },
            \App\Database\DatabaseInterface::class => function (ContainerInterface $container) {
                return new \App\Database\PDODatabase('mysql:host=localhost;dbname=hackaviz', 'root', 'admin', array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            }
        ];

        $builder->addDefinitions($definitions);
    }
}