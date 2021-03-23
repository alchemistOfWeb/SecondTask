<?php

namespace App;

class Runner
{
    /**
     * @param Route[] $routes
     */
    static $routes = [];

    public static function start()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        if ( isset(self::$routes[$method][$uri]) ) {
            $route = self::$routes[$method][$uri];
        } else {
            return require_once "views/errors/404.php";
        }

        ($route->callback)();
    }

    public static function setRoute(Route $route, string $type)
    {
        self::$routes[strtoupper($type)][$route->uri] = $route;
    }
}