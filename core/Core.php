<?php
class Core {
    public function run(){

        $url = explode('index.php', $_SERVER['PHP_SELF']);
        $url = end($url);
        $params = array();

        if (!empty($url)){
            $url = explode('/', $url);
            array_shift($url);

            $route = new Route();

            if (in_array($url[0], $route->getRoute())) {

                $currentController = $url[0] . 'Controller';
                array_shift($url);

                if (isset($url[0])) {
                    $currentMethod = $url[0];
                    array_shift($url);
                } else {
                    $currentMethod = 'index';
                }

                if (count($url) > 0) {
                    $params = $url;
                }
            }else{
                require_once 'views/404.php';
            }

        }else{
            $currentController = 'UserController';
            $currentMethod = 'index';
        }

        require_once 'core/Controller.php';

        $c = new $currentController();
        call_user_func_array(array($c, $currentMethod), $params);
    }
}