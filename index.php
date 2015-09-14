<?php

require_once __DIR__.'/vendor/autoload.php';

use fokuscms\Components\Foundation\Application as App;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing;
use Symfony\Component\HttpKernel;
use Illuminate\Database\Capsule\Manager as Capsule;



# create request instance and load all
# routes from routing.php
# more route-files can be added here

$request = Request::createFromGlobals();
$routes = include 'system/app/Http/routes.php';



# Add Eloquent ORM known from Laravel Framework
# illuminate/database version 4.2.16
# for setup details check https://github.com/illuminate/database/tree/4.2

$database = include_once 'system/config/database.php';
$capsule = new Capsule;
$capsule->addConnection($database);

$app_config = include_once 'system/config/app.php';

# Make this Capsule instance available globally via static methods
# Setup the Eloquent ORM
$capsule->setAsGlobal();
$capsule->bootEloquent();



# create all objects needed for routing and find a match
# for the requests pathInfo within the routes from route-file

$context = new Routing\RequestContext();
$context->fromRequest($request);
$matcher = new Routing\Matcher\UrlMatcher($routes, $context);
$resolver = new HttpKernel\Controller\ControllerResolver();



# create an object of fokuscms\Components\Application and pass data
# it handles the request and returns an response which is then sent to
# the client

$app = new App($matcher, $resolver, __DIR__.'/system/config/');
$app->setGlobal();
$app->setBasePath(__DIR__);
App::setLanguage(App::config('defaultLanguage'));
$app->setFallbackLanguage($app_config['defaultLanguage']);
$app->setBaseUrl($request->getScheme() . '://' . $request->getHttpHost() . $request->getBasePath());
$response = $app->handle($request);
$response->send();