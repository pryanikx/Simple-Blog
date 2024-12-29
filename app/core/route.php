<?php

class Route {
    static function start($conn) {
        $controllerName = 'Article';
        $actionName = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($routes[1]))
            $controllerName = $routes[1];

        if (!empty($routes[2]))
            $actionName = $routes[2];

        if (isset($routes[3])) {
            $id = $routes[3];
        } else {
            $id = null;
        }

        $modelName = $controllerName . "Model";
        $controllerName = $controllerName . "Controller";

        $modelFile = strtolower($modelName) . '.php';
        $modelPath = "app/models/" . $modelFile;

        if (file_exists($modelPath)) {
                include "app/models/" . $modelFile;
        }

        $controllerFile = strtolower($controllerName) . ".php";
        $controllerPath = "app/controllers/" . $controllerFile;

        if (file_exists($controllerPath)) {
            include "app/controllers/" . $controllerFile;
        } else {
            self::ErrorPage404();
        }

        $controller = new $controllerName($conn);

        if (method_exists($controller, $actionName)) {
            // вызов метода контроллера
            if ($id) {
                $controller->$actionName($id);
            } else {
                $controller->$actionName();
            }
        } else {
            self::ErrorPage404();
        }
    }

   static function ErrorPage404() {
        $host = "http://" . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header('Status: 404 Not Found');
        header('Location:' . $host . '404');
        exit();
   }
}