<?php

require_once 'vendor/PHPMailer/PHPMailer.php';
require_once 'vendor/PHPMailer/SMTP.php';
require_once 'vendor/PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class NewController extends Controller {

    public function index(){
        if ($_POST) {
            $d = date('d/m/Y');
            if ($_POST['data'] < $d){
                echo "<script>alert('Favor colocar uma DATA VÁLIDA')</script>";
            }else {

                if (isset($_POST['horario'])) {

                    $data = (new Reserva())->tratar_data_db($_POST['data']);
                    $ret = (new ReservaDAO())->cadastrar_reserva(new Reserva(null,
                        $_POST['disciplina'], $_SESSION['id_professor'], $_POST['sala'], $data), $_POST['horario']);

                    if ($ret) {
                        echo "<script>alert('Reservado com Sucesso')</script>";
                    }
                } else {
                    echo "<script>alert('Reserva precisa ter horario')</script>";
                }
            }
        }

        $dados['sala'] = (new SalaDAO())->todas_salas();
        $dados['disciplina'] = (new DisciplinaDAO())->todas_disciplinas_ativas();
        $dados['horario'] = (new HorarioDAO())->todos_horarios();
        $dados['t'] = null;
        $dados['b'] = BASE_URL;

        $this->loadTemplate('newreserva', $dados);
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function r(){
        if ($_POST['id_sala']){

            $rets = (new SalaDAO())->recursos_sala(new Sala($_POST['id_sala'], null, null));

            header('Content-type: application/json');

            echo json_encode($rets);
            return;
        }
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function h(){
        if ($_POST['id_sala']){
            $data = (new Reserva())->tratar_data_db($_POST['data_reserva']);
            $reth = (new ReservaDAO())->horarios_reservados($data, $_POST['id_sala']);

            header('Content-type: application/json');

            echo json_encode($reth);
            return;
        }
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function novo_professor(){
        if ($_POST){

            $ret = (new ProfessorDAO())->todos_p();

            for ($x = 0; $x < count($ret); $x++){
                if ($ret[$x]->matricula == $_POST['matricula']){
                    echo "<script>alert('Matricula já Cadastrada')</script>";
                    $this->loadTemplate('newprofessor', $dados = array());
                    exit();
                }
                if ($ret[$x]->email == $_POST['email']){
                    echo "<script>alert('Email já Cadastrado')</script>";
                    $this->loadTemplate('newprofessor', $dados = array());
                    exit();
                }
            }

            global $config;
            $b = BASE_URL;
            $senha = rand(100000, 999999);
            $user = $config['email'];
            $pass = $config['senha'];
            $nome = $_POST['nome'];
            $matricula = $_POST['matricula'];
            $email = $_POST['email'];

            $ret = (new ProfessorDAO())->novo_professor(new Professor(null, $nome,
                $matricula, $email, md5($senha), 1, 1, 1));

            if ($ret == true){
                echo "<script>alert('Pré-cadastro Completado com Sucesso')</script>";

            }else{
                echo "<script>alert('Erro ao Cadastrar Professor')</script>";
            }

            $mail = new PHPMailer(true);
            try {
                $mail->SMTPDebug = 0;
                $mail->IsSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = $user;
                $mail->Password = $pass;
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->SetFrom($email, 'Fatec Classroom');
                $mail->AddAddress($email, 'Fatec Classroom');

                $mail->IsHTML(true);
                $mail->Subject = "Bem Vindo ao Fatec Classroom";
                $mail->Body    = "<h2>Bem Vindo ao Fatec Classroom</h2>
                                    <p>Sua senha TEMPORÁRIA é '<b>{$senha}</b>', 
                    Complete seu Cadastro do Fatec Classroom no link, <a href='{$b}'>{$b}</a></p>";

                if (!$mail->Send()){
                    $mail->ErrorInfo;
                }

            }catch (Exception $exception){
                echo "<script>alert('Erro ao ENVIAR email para o Professor')</script>";
            }
        }
        $this->loadTemplate('newprofessor', $dados = array());
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function nova_disciplina(){

        if ($_POST){

            $ret = (new DisciplinaDAO())->nova_disciplina(new Disciplina(null, $_POST['disciplina'], new Curso($_POST['curso'], null), 0));

            if ($ret){
                echo "<script>alert('Disciplina Cadastrada com Sucesso')</script>";
            }else{
                echo "<script>alert('Erro ao cadastrar Disciplina')</script>";
            }
        }

        $dados['curso'] = (new CursoDAO())->todos_cursos();
        $dados['disciplina'] = (new DisciplinaDAO())->todas_disciplinas();
        $dados['t'] = null;

        $this->loadTemplate('newdisciplina', $dados);
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function novo_curso(){

        if ($_POST){

            (new CursoDAO())->novo_curso(new Curso(null, $_POST['curso']));

            echo "<script>alert('Curso Cadastrado com Sucesso')</script>";
        }

        $dados['curso'] = (new CursoDAO())->todos_cursos();

        $this->loadTemplate('newcurso', $dados);

    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function editar_curso($id_curso, $descritivo){

        if ($_POST){

            (new CursoDAO())->editar_curso(new Curso($id_curso, $_POST['descritivo']));

            header("location: ".BASE_URL."/new/novo_curso");
        }

        $dados['descritivo'] = $descritivo;

        $this->loadTemplate('editcurso', $dados);

    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function editar_disciplina($id_disciplina, $descritivo){

        if ($_POST){

            (new DisciplinaDAO())->editar_disciplina(new Disciplina($id_disciplina, $_POST['descritivo'], null, null));

            header("location: ".BASE_URL."/new/nova_disciplina");
        }

        $dados['descritivo'] = $descritivo;

        $this->loadTemplate('editdisciplina', $dados);

    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function status_disciplina($id_disciplina, $status){

        $ret = (new DisciplinaDAO())->status_disciplina(new Disciplina($id_disciplina, null, null, $status));

        //header("location: ".BASE_URL."/new/nova_disciplina");

        if ($ret){
            echo "<script>alert('Disciplina ALTERADA com Sucesso')</script>";
        }else{
            echo "<script>alert('ERRO ao ALTERAR Disciplina')</script>";
        }

        $this->nova_disciplina();
    }

    public function finalizar_cadastro(){

        $this->loadTemplate('recuperarsenha', $dados = array());
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function excluir_reserva($id_reserva){

        $ret = (new ReservaDAO())->excluir_reserva(new Reserva($id_reserva,
            null, null, null, null));

        if ($ret){
            echo "<script>alert('Reserva Excluída com Sucesso')</script>";
        }
        $dados['reservaN'] = (new ReservaDAO())->todas_reservas_proprias_n();
        $dados['reservaA'] = (new ReservaDAO())->todas_reservas_proprias_a();
        $dados['b'] = BASE_URL;
        $dados['t'] = null;

        $this->loadTemplate('home', $dados);
    }
}