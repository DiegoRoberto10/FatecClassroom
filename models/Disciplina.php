<?php

class Disciplina{
    private $id_disciplina;
    private $descritivo;
    private $curso;
    private $status;

    public function __construct($id_disciplina = null, $descritivo = null, $curso = null, $status = null){
        $this->id_disciplina = $id_disciplina;
        $this->descritivo = $descritivo;
        $this->curso = $curso;
        $this->status = $status;
    }

    public function getIdDisciplina(){
        return $this->id_disciplina;
    }

    public function getDescritivo(){
        return $this->descritivo;
    }

    public function getCurso(){
        return $this->curso;
    }

    public function getStatus(){
        return $this->status;
    }
}