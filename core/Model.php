<?php
class Model {
    protected $conexao;

    public function __construct(){
        global $config;

        try	{
            $this->conexao = new PDO("mysql:host={$config['host']};dbname={$config['dbname']}",
                $config['dbuser'], $config['dbpass']);
            $this->conexao->exec('SET CHARACTER SET utf8');
        }
        catch (PDOException $e) {
            die ($e->getMessage());
        }
    }
}