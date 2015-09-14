<?php

use fokuscms\Components\Routing\Router;

$router = new Router();

/**
 * This is a sample route. This route matches a GET-Request with the route "/"
 * and will invoke the HomeControllers index-method.
 * Also this route is named "home".
 */
$router->get('/', 'HomeController::index', array('name' => 'home'));
$router->get('/en', 'HomeController::englishIndex', array('name' => 'englishHome'));

return $router->getCollection();