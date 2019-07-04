<?php

class Curso{
    private $id_curso;
    private $descritivo;

    public function __construct($id_curso = null, $descritivo = null){
        $this->id_curso = $id_curso;
        $this->descritivo = $descritivo;
    }

    public function getIdCurso(){
        return $this->id_curso;
    }

    public function getDescritivo(){
        return $this->descritivo;
    }
}