<?php

require_once 'util/application_util.php';

class Router {

    const ROUTES = [
        'GET' => [
            '/' => [
                'controller' => 'welcome',
                'action' => 'index'
            ],
        ],
        'POST' => [
            '/calculate' => [
                'controller' => 'welcome',
                'action' => 'calculate'
            ]
        ]
    ];

    public static function start() {
        ApplicationUtil::setLocale();

        $method = $_SERVER["REQUEST_METHOD"];

        preg_match("/^(\/[\w\-\/]*)?/", $_SERVER["REQUEST_URI"], $matches);

        $path = $matches[1];

        if(array_key_exists($method,self::ROUTES) && array_key_exists($path,self::ROUTES[$method])){

            $route =  self::ROUTES[$method][$path];

            $controller = str_replace('_', '', ucwords($route['controller'], '_') . 'Controller');

            $message = "\nRouter::start\n";
            $message .= "\trequest uri: " . $_SERVER["REQUEST_URI"] . "\n";
            $message .= "\tlocale: " . Locale::GetDefault() . "\n";
            $message .= "\tcontroller: " . $route["controller"] . "\n";
            $message .= "\taction: " . $route["action"] . "\n";
            $message .= "\tmethod: " . $_SERVER["REQUEST_METHOD"] . "\n";
            $message .= "\tparams: ";
            error_log($message);

            $startTime = microtime(true);

            $pathToClass = "controllers/" . $route["controller"] . "_controller.php";
            require($pathToClass);

            call_user_func(array($controller,$route["action"]));

            $timeTaken = microtime(true) - $startTime;
            $message = "\n\ttimeTaken: " . $timeTaken . "\n";
            error_log($message);
            exit();
        }
        else {
            error_log("Router - a rota '$path' para o método '$method' não foi encontrada.");
            header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
            exit();
        }
    }
}
