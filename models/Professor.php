<?php

class Professor {
    private $id_professor;
    private $nome;
    private $matricula;
    private $email;
    private $senha;
    private $permissao;
    private $status;
    private $temp;

    public function __construct($id_professor = null, $nome = null,
                                $matricula = null, $email = null,
                                $senha = null, $permissao = null,
                                $status = null, $temp = null){
        $this->id_professor = $id_professor;
        $this->nome = $nome;
        $this->matricula = $matricula;
        $this->email = $email;
        $this->senha = $senha;
        $this->permissao = $permissao;
        $this->status = $status;
        $this->temp = $temp;
    }

    public function getIdProfessor(){
        return $this->id_professor;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getMatricula(){
        return $this->matricula;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function getPermissao(){
        return $this->permissao;
    }

    public function getStatus(){
        return $this->status;
    }

    public function getTemp(){
        return $this->temp;
    }
}