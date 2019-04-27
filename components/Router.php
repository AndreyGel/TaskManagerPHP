<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $path = ROOT.'/config/routes.php';
        $this->routes = include ($path);
    }

    public function run()
    {
          if (!empty($_SERVER['REQUEST_URI'])) {
              $uri = trim($_SERVER['REQUEST_URI'], '/');
          }
        if (empty($uri)) header("Location: /task/list");

        foreach ($this->routes as $uriPattern => $path) {
              if (preg_match("~$uriPattern~", $uri)) {
                  $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                  $segments = explode('/', $internalRoute);
                  $controller = ucfirst(array_shift($segments).'Controller');
                  $action =  'action'.ucfirst(array_shift($segments));

                  $controllerPath = ROOT.'/controllers/'.$controller.'.php';

                  if (file_exists($controllerPath)) {
                      include_once $controllerPath;
                  }
                  $controllerInstance = new $controller;

                  $result = call_user_func_array([$controllerInstance, $action], $segments);

                  if ($result != null) break;




              }
          }
    }

}