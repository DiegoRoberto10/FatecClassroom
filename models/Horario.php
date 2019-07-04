<?php

class Horario{
    private $id_horario;
    private $descritivo_horario;

    public function __construct($id_horario, $descritivo_horario){
        $this->id_horario = $id_horario;
        $this->descritivo_horario = $descritivo_horario;
    }

    public function getIdHorario(){
        return $this->id_horario;
    }

    public function getDescritivoHorario(){
        return $this->descritivo_horario;
    }
}