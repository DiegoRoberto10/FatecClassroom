<?php

class Recurso{
    private $id_recurso;
    private $descritivo;

    public function __construct($id_recurso, $descritivo){
        $this->id_recurso = $id_recurso;
        $this->descritivo = $descritivo;
    }

    public function getIdRecurso(){
        return $this->id_recurso;
    }

    public function getDescritivo(){
        return $this->descritivo;
    }
}