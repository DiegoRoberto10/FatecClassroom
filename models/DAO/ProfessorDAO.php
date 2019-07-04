<?php

class ProfessorDAO extends Model {
    public function logar($professor){
        $sql = "SELECT * FROM professores WHERE matricula = ? AND senha = ?";
        try {
            $stm = $this->conexao->prepare($sql);

            $stm->bindValue(1, $professor->getMatricula());
            $stm->bindValue(2, $professor->getSenha());

            $ret = $stm->execute();

            $this->conexao = null;

            if ($ret) {
                return $ret = $stm->fetchAll(PDO::FETCH_OBJ);
            }
        } catch (Exception $e) {
            die ($e->getMessage());
        }
    }

    public function todos_professores($professor){
        $sql = "SELECT * FROM professores p INNER JOIN status s ON p.id_status = s.id_status WHERE id_professor != ? AND temp != 1 ORDER BY p.nome";
        try{
            $stm = $this->conexao->prepare($sql);
            $stm->bindValue(1, $professor->getIdProfessor());
            $ret = $stm->execute();
            $this->conexao = null;

            if ($ret) {
                return $ret = $stm->fetchAll(PDO::FETCH_OBJ);
            }

        }catch (PDOException $exception){
            $exception->getMessage();
        }
    }

    public function todos_p(){
        $sql = "SELECT * FROM professores";
        try{
            $stm = $this->conexao->prepare($sql);
            $ret = $stm->execute();
            $this->conexao = null;

            if ($ret) {
                return $ret = $stm->fetchAll(PDO::FETCH_OBJ);
            }

        }catch (PDOException $exception){
            $exception->getMessage();
        }
    }

    public function buscar_por_email($professor){
        $sql = "SELECT * FROM professores WHERE email = ?";
        try{
            $stm = $this->conexao->prepare($sql);
            $stm->bindValue(1, $professor->getEmail());
            $ret = $stm->execute();
            $this->conexao = null;

            if ($ret) {
                return $ret = $stm->fetchAll(PDO::FETCH_OBJ);
            }

        }catch (PDOException $exception){
            $exception->getMessage();
        }
    }

    public function trocar_status($professor){
        $sql = "UPDATE professores SET id_status = ? WHERE id_professor = ?";
        try{
            $stm = $this->conexao->prepare($sql);
            $stm->bindValue(1, $professor->getStatus());
            $stm->bindValue(2, $professor->getIdProfessor());
            $ret = $stm->execute();
            $this->conexao = null;

            if ($ret) {
                return true;
            }else{
                return false;
            }
        }catch (PDOException $exception){
            $exception->getMessage();
        }
    }

    public function atualizar_professor($professor){
        $sql = "UPDATE professores SET nome = ?, email = ?, senha = ? WHERE id_professor = ?";
        try{
            $stm = $this->conexao->prepare($sql);
            $stm->bindValue(1, $professor->getNome());
            $stm->bindValue(2, $professor->getEmail());
            $stm->bindValue(3, $professor->getSenha());
            $stm->bindValue(4, $professor->getIdProfessor());
            $ret = $stm->execute();
            $this->conexao = null;

            if ($ret) {
                return true;
            }else{
                return false;
            }
        }catch (PDOException $exception){
            $exception->getMessage();
        }
    }

    public function atualizar_senha($professor){
        $sql = "UPDATE professores SET senha = ?, temp = ? WHERE id_professor = ?";
        try{
            $stm = $this->conexao->prepare($sql);
            $stm->bindValue(1, $professor->getSenha());
            $stm->bindValue(2, $professor->getTemp());
            $stm->bindValue(3, $professor->getIdProfessor());
            $ret = $stm->execute();
            $this->conexao = null;

            if ($ret) {
                return true;
            }else{
                return false;
            }
        }catch (PDOException $exception){
            $exception->getMessage();
        }
    }

    public function atualizar_professor_novo($professor){
        $sql = "UPDATE professores SET senha = ?, temp = ? WHERE id_professor = ?";
        try{
            $stm = $this->conexao->prepare($sql);
            $stm->bindValue(1, $professor->getSenha());
            $stm->bindValue(2, $professor->getTemp());
            $stm->bindValue(3, $professor->getIdProfessor());
            $ret = $stm->execute();
            $this->conexao = null;

            if ($ret) {
                return true;
            }else{
                return false;
            }
        }catch (PDOException $exception){
            $exception->getMessage();
        }
    }

    public function novo_professor($professor){
        $sql = "INSERT INTO professores (nome, matricula, email, senha, id_permissao, id_status, temp) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        try{
            $stm = $this->conexao->prepare($sql);
            $stm->bindValue(1, $professor->getNome());
            $stm->bindValue(2, $professor->getMatricula());
            $stm->bindValue(3, $professor->getEmail());
            $stm->bindValue(4, $professor->getSenha());
            $stm->bindValue(5, $professor->getPermissao());
            $stm->bindValue(6, $professor->getStatus());
            $stm->bindValue(7, $professor->getTemp());
            $ret = $stm->execute();

            $this->conexao = null;

            if ($ret) {
                return true;
            }else{
                return false;
            }

        }catch (PDOException $exception){
            $exception->getMessage();
        }
    }
}

