<?php

class Sala{
    private $id_sala;
    private $descritivo;
    private $recurso;

    public function __construct($id_sala, $descritivo, $recurso){
        $this->id_sala = $id_sala;
        $this->descritivo = $descritivo;
        $this->recurso = $recurso;
    }

    public function getIdSala(){
        return $this->id_sala;
    }

    public function getDescritivo(){
        return $this->descritivo;
    }

    public function getRecurso(){
        return $this->recurso;
    }
}