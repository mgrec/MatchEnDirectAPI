<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 16/12/2016
 * Time: 13:44
 */
require 'vendor/autoload.php';
require_once "config.php";
use Controller\indexController;

$app->get('/', function ($request, $response, $args) {
    echo 'Hello ';
});


$app->get('/{name}', function ($request, $response, $args) {
    $indexController = new indexController();
    $indexController->render($args['name']);
});

$app->run();