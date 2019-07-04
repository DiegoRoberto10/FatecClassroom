<?php

class Reserva {
    private $id_reserva;
    private $disciplina;
    private $professor;
    private $sala;
    private $data_reserva;

    public function __construct($id_reserva = null, $disciplina = null, $professor = null, $sala = null, $data_reserva = null){
        $this->id_reserva = $id_reserva;
        $this->disciplina = $disciplina;
        $this->professor = $professor;
        $this->sala = $sala;
        $this->data_reserva = $data_reserva;
    }

    public function getIdReserva(){
        return $this->id_reserva;
    }

    public function getDisciplina(){
        return $this->disciplina;
    }

    public function getProfessor(){
        return $this->professor;
    }

    public function getSala(){
        return $this->sala;
    }

    public function getDataReserva(){
        return $this->data_reserva;
    }

    public function tratar_data_db($data){
        $data = explode('/', $data);
        $data = $data[2].'-'.$data[1].'-'.$data[0];
        return $data;
    }

    public function tratar_data($data){
        $data = explode('-', $data);
        $data = $data[2].'/'.$data[1].'/'.$data[0];
        return $data;
    }
}