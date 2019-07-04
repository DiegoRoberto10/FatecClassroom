<?php
require 'environment.php';

global $config;
$config = array();

if (ENVIRONMENT == 'development'){
    $config['dbname'] = 'fatec_classroom';
    $config['host']   = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = 'root';

    //colocar email da conta do google
    $config['email']  = '';
    //colocar senha da conta do google
    $config['senha']  = '';

    define("BASE_URL", "http://localhost/FatecClassroom");
}else{
    $config['dbname'] = 'fatec_classroom';
    $config['host']   = '';
    $config['dbuser'] = '';
    $config['dbpass'] = '';

    define("BASE_URL", "");
}


