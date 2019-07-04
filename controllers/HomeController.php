<?php

class HomeController extends Controller {

    public function index(){
        $dados['reservaN'] = (new ReservaDAO())->todas_reservas_proprias_n();
        $dados['reservaA'] = (new ReservaDAO())->todas_reservas_proprias_a();
        $dados['b'] = BASE_URL;
        $dados['t'] = null;

        $this->loadTemplate('home', $dados);
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function professores(){

        $dados['professor'] = (new ProfessorDAO())->todos_professores(new Professor($_SESSION['id_professor'], null, null, null, null, null, null));

        $this->loadTemplate('professores', $dados);
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function trocar_status($id, $status){

        $dados['professor'] = (new ProfessorDAO())->trocar_status(new Professor($id, null, null, null, null, null, $status));

        $this->professores();
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
