<?php

require __DIR__ . '/../bootstrap/app.php';
require __DIR__ . '/../vendor/autoload.php';
include __DIR__ . "/vendor/twig/twig/lib/Twig/Autoloader.php";  

$app = new \Slim\App;

$container = $app->getContainer();

$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__ . '/resources/views', [
        'cache' => false
    ]);

    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUrl()->getBasePath()), '/');
    $view->addExctension(new Slim\Views\TwigExtension($container['router'], $basePath));
    
    return $view;
};

$app->get('/', function(){
    //
});

$app->run();