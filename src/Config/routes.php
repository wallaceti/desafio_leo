<?php

namespace App\Config;

$dispatcher = \FastRoute\simpleDispatcher(function(\FastRoute\RouteCollector $route) use ($baseUrlPath)
{
    # Course
    $route->post($baseUrlPath . 'courses' , '\App\Controllers\CourseController@create');
    $route->get($baseUrlPath . 'courses/read/{id:\d+}' , '\App\Controllers\CourseController@read');
    $route->post($baseUrlPath . 'courses/update' , '\App\Controllers\CourseController@update');
    $route->get($baseUrlPath . 'courses/delete/{id:\d+}' , '\App\Controllers\CourseController@delete');

    # Home
    $route->get($baseUrlPath, '\App\Controllers\HomeController@index');

});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}

$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {

    case \FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;

    case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;

    case \FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];

        if (is_callable($handler) == 'function') {
            $handler();

        } else {

            if (\strstr($handler, '@')) {

                $handlerParts = \explode('@', $handler);
                $controllerClass = $handlerParts[0];
                $action = $handlerParts[1];

                $controller = new $controllerClass;
                $controller->$action($vars);

            }

        }
        break;

}