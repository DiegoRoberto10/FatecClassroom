<?php
    require 'config.php';

    spl_autoload_register(function ($class){
        if (strpos($class, 'Controller') > -1){
            if (file_exists('controllers/'.$class.'.php')){
                require_once 'controllers/'.$class.'.php';
            }
        }else if (file_exists('models/DAO/'.$class.'.php')){
            require_once 'models/DAO/'.$class.'.php';
        }else if (file_exists('models/'.$class.'.php')){
            require_once 'models/'.$class.'.php';
        }else if (file_exists('vendor/'.$class.'.php')){
            require_once 'vendor/'.$class.'.php';
        }else{
            require_once 'core/'.$class.'.php';
        }
    });
    session_start();

    $core = new Core();
    $core->run();
