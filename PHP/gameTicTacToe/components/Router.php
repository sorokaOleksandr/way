<?php

class Router{

    private $routes;

    public function __construct(){

        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);

    }

    private function getUri(){

        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
        }

    }

    public function run(){

        // получаем строку запроса
        $uri = $this->getUri();



        // проверка запроса в routes.php
        foreach ($this->routes as $uriPattern => $path){

            // сравниваем на наличие совпадений
            if(preg_match("~$uriPattern~", $uri)){

                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);




                // определяем какой контроллер и action обрабатывают запрос
                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments).'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action'.ucfirst(array_shift($segments));

                $parameters = $segments;



                // подключаем файл класса-контроллера
                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';

                if(file_exists($controllerFile)){
                    include_once($controllerFile);
                }


                // создаем обьект и вызываем метод
                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                if($result != null){
                    break;
                }



            }
        }

    }

}