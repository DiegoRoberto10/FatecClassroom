<?php

class DisciplinaDAO extends Model {
    public function todas_disciplinas(){
        $sql = "SELECT * FROM disciplinas d INNER JOIN cursos c ON d.id_curso = c.id_curso ORDER BY c.descritivo_curso, d.descritivo_disciplina";

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

    public function todas_disciplinas_ativas(){
        $sql = "SELECT * FROM disciplinas d INNER JOIN cursos c ON d.id_curso = c.id_curso WHERE d.id_status = ? ORDER BY c.descritivo_curso, d.descritivo_disciplina";

        try{
            $stm = $this->conexao->prepare($sql);
            $stm->bindValue(1, 0);
            $ret = $stm->execute();

            $this->conexao = null;

            if ($ret) {
                return $ret = $stm->fetchAll(PDO::FETCH_OBJ);
            }

        }catch (PDOException $exception){
            $exception->getMessage();
        }
    }

    public function nova_disciplina($disciplina){
        $sql = "INSERT INTO disciplinas (descritivo_disciplina, id_curso, id_status) VALUES (?, ?, ?)";

        try{
            $stm = $this->conexao->prepare($sql);
            $stm->bindValue(1, $disciplina->getDescritivo());
            $stm->bindValue(2, $disciplina->getCurso()->getIdCurso());
            $stm->bindValue(3, $disciplina->getStatus());
            $ret = $stm->execute();

            $this->conexao = null;

            if ($ret) {
                return true;
            }

        }catch (PDOException $exception){
            $exception->getMessage();
        }
    }

    public function editar_disciplina($disciplina){
        $sql = "UPDATE disciplinas SET descritivo_disciplina = ? WHERE id_disciplinas = ?";

        try{
            $stm = $this->conexao->prepare($sql);
            $stm->bindValue(1, $disciplina->getDescritivo());
            $stm->bindValue(2, $disciplina->getIdDisciplina());
            $stm->execute();

            $this->conexao = null;

        }catch (PDOException $exception){
            $exception->getMessage();
        }
    }

    public function status_disciplina($disciplina){
        $sql = "UPDATE disciplinas SET id_status = ? WHERE id_disciplinas = ?";

        try{
            $stm = $this->conexao->prepare($sql);
            $stm->bindValue(1, $disciplina->getStatus());
            $stm->bindValue(2, $disciplina->getIdDisciplina());
            $ret = $stm->execute();

            if ($ret) {
                return true;
            }

            $this->conexao = null;

        }catch (PDOException $exception){
            $exception->getMessage();
        }
    }
}