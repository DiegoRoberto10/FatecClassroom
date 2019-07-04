<?php

require_once 'vendor/PHPMailer/PHPMailer.php';
require_once 'vendor/PHPMailer/SMTP.php';
require_once 'vendor/PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class UserController extends Controller {

    public function index(){

        if ($_POST){
            $dados['professor'] = (new ProfessorDAO())->logar(new Professor(null, null, $_POST['matricula'],
                null, md5($_POST['senha']), null, null));

            if ($dados['professor'][0]->temp == 0) {
                if (count($dados['professor']) > 0 && $dados['professor'][0]->id_status == 1) {
                    $_SESSION['id_professor'] = $dados['professor'][0]->id_professor;
                    $_SESSION['nome'] = $dados['professor'][0]->nome;
                    $_SESSION['email'] = $dados['professor'][0]->email;
                    $_SESSION['matricula'] = $dados['professor'][0]->matricula;
                    $_SESSION['id_permissao'] = $dados['professor'][0]->id_permissao;
                    $_SESSION['id_status'] = $dados['professor'][0]->id_status;

                    echo "<script> alert('Bem Vindo, Professor(a) {$dados['professor'][0]->nome}'); </script>";

                    $dados['reservaN'] = (new ReservaDAO())->todas_reservas_proprias_n();
                    $dados['reservaA'] = (new ReservaDAO())->todas_reservas_proprias_a();
                    $dados['b'] = BASE_URL;
                    $dados['t'] = null;

                    $this->loadTemplate('home', $dados);
                } else {
                    echo "<script> alert('Professor(a) NÃO Cadastrado'); </script>";

                    $this->loadTemplate('login', $dados = array());
                }
            }else{
                $_SESSION['id_professor'] = $dados['professor'][0]->id_professor;
                $_SESSION['nome'] = $dados['professor'][0]->nome;
                $_SESSION['email'] = $dados['professor'][0]->email;
                $_SESSION['matricula'] = $dados['professor'][0]->matricula;
                $_SESSION['id_permissao'] = $dados['professor'][0]->id_permissao;
                $_SESSION['id_status'] = $dados['professor'][0]->id_status;

                //$this->loadTemplate('recuperarsenha', $dados);
                header("location: ".BASE_URL."/user/nova_senha");
            }
        }else{
            $this->loadTemplate('login', $dados = array());
        }
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function nova_senha(){
        if ($_POST){
            if ($_POST['senha1'] == $_POST['senha2']){
                $ret = (new ProfessorDAO())->atualizar_professor_novo(new Professor($_SESSION['id_professor'], null,
                    null, null, md5($_POST['senha1']), null, null, 0));
                if ($ret){
                    echo "<script> alert('Bem Vindo, Professor(a) {$_SESSION['nome']}'); </script>";

                    $dados['reservaN'] = (new ReservaDAO())->todas_reservas_proprias_n();
                    $dados['reservaA'] = (new ReservaDAO())->todas_reservas_proprias_a();
                    $dados['b'] = BASE_URL;
                    $dados['t'] = null;

                    $this->loadTemplate('home', $dados);

                    exit();
                }
            }else{
                echo "<script> alert('Senhas Diferentes') </script>";
            }
        }
        $this->loadTemplate('recuperarsenha', $dados = array());
    }


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function esqueceu_senha(){
        if ($_POST){
            //buscar pelo email
            $ret1 = (new ProfessorDAO())->buscar_por_email(new Professor(null,
                null, null, $_POST['email'], null,
                null, null, null));
            global $config;
            $b = BASE_URL;
            $senha = rand(100000, 999999);
            $user = $config['email'];
            $pass = $config['senha'];
            $email = $_POST['email'];

            $ret2 = (new ProfessorDAO())->atualizar_senha(new Professor($ret1[0]->id_professor,
                null, null, null, md5($senha), null, null,
                1));

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
                $mail->Subject = "Recuperar senha Fatec Classroom";
                $mail->Body    = "<h2>Recuperar senha Fatec Classroom</h2>
                                    <p>Sua senha TEMPORÁRIA é '<b>{$senha}</b>', 
                    Atualize-a agora no link, <a href='{$b}'>{$b}</a></p>";

                if (!$mail->Send()){
                    $mail->ErrorInfo;
                }

                echo "<script>alert('Email com senha temporaria enviado com SUCESSO')</script>";

                //header("location: ".BASE_URL."/");

            }catch (Exception $exception){
                echo "<script>alert('Erro ao ENVIAR email para o Professor')</script>";
            }
        }
        $this->loadTemplate('esqueceusenha', $dados = array());
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function logout(){
        $_SESSION = array();
        session_destroy();

        header("location: ".BASE_URL."/");
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function ajustes(){

        if ($_POST){
            if ($_POST['senha1'] == $_POST['senha2']){

                $ret = (new ProfessorDAO())->atualizar_professor(new Professor($_SESSION['id_professor'], $_POST['nome'],
                    null, $_POST['email'], md5($_POST['senha1']), null, null, null));

                if ($ret){
                    echo "<script> alert('Atualizado com Sucesso!!') </script>";
                    $_SESSION['nome'] = $_POST['nome'];
                    $_SESSION['email'] = $_POST['email'];
                }else{
                    echo "<script> alert('Erro ao Atualizar!!') </script>";
                }

            }else{
                echo "<script> alert('Senhas Diferentes') </script>";
            }
        }

        $this->loadTemplate('ajustes', $dados = array());
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


}