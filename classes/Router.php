<?php

class Router {

    private $routes = [];

    private function addRoute($method, $path, $callback) {
        $this->routes[] = [
            'method' => $method,
            'path' => trim($path, '/'),
            'callback' => $callback
        ];
    }

    public function get($path, $callback) {
        $this->addRoute('GET', $path, $callback);
    }

    public function post($path, $callback) {
        $this->addRoute('POST', $path, $callback);
    }

    public function dispatch() {
        $requestUri = trim($_SERVER['REQUEST_URI'], '/');
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {
            if ($route['method'] === $requestMethod && $route['path'] === $requestUri) {
                call_user_func($route['callback']);
                return;
            }
        }

        http_response_code(404);
        echo "Az oldal nem található.";
    }
}
