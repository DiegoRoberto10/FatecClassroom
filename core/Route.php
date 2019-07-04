<?php

class Route{

    public $routes = array(
        '', 'home', 'user', 'new'
    );

    public function getRoute(){
        return $this->routes;
    }
}