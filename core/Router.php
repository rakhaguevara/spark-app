<?php

class Router
{
    private static $routes = [];

    public static function get($uri, $action)
    {
        self::$routes[$uri] = $action;
    }

    public static function run()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = rtrim($uri, '/') ?: '/';

        if (!isset(self::$routes[$uri])) {
            http_response_code(404);
            echo "404 - Page Not Found";
            return;
        }

        [$controller, $method] = explode('@', self::$routes[$uri]);

        require_once __DIR__ . '/../app/Controllers/' . $controller . '.php';

        $obj = new $controller();
        $obj->$method();
    }
}
