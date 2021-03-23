<?php

namespace App;

class Route
{
    private string $uri;
    private \Closure $callback;

    public $gettable = ['uri', 'callback'];

    function __get($name)
    {
        if ( in_array($name, $this->gettable) ) {
            return $this->$name;
        }
    }

    private function __construct($uri, \Closure $callback)
    {
        $this->uri = $uri;
        $this->callback = $callback;
    }

    public static function get($uri, \Closure $callback)
    {
        $route = new Route($uri, $callback);

        Runner::setRoute($route, 'get');
    }

    public static function post($uri, \Closure $callback)
    {
        $route = new Route($uri, $callback);

        Runner::setRoute($route, 'post');
    }
}