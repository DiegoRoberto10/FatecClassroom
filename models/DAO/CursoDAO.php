<?php

class CursoDAO extends Model {

    public function todos_cursos(){
        $sql = "SELECT * FROM cursos ORDER BY descritivo_curso";

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
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function novo_curso($curso){
        $sql = "INSERT INTO cursos (descritivo_curso) VALUES (?)";

        try{
            $stm = $this->conexao->prepare($sql);
            $stm->bindValue(1, $curso->getDescritivo());
            $ret = $stm->execute();

            $this->conexao = null;

            if ($ret) {
                return $ret = $stm->fetchAll(PDO::FETCH_OBJ);
            }

        }catch (PDOException $exception){
            $exception->getMessage();
        }
    }

    public function buscar_um_curso($curso){
        $sql = "SELECT * FROM cursos WHERE id_curso = ?";

        try{
            $stm = $this->conexao->prepare($sql);
            $stm->bindValue(1, $curso->getIdCurso());
            $ret = $stm->execute();

            $this->conexao = null;

            if ($ret) {
                return $ret = $stm->fetch(PDO::FETCH_OBJ);
            }

        }catch (PDOException $exception){
            $exception->getMessage();
        }
    }

    public function editar_curso($curso){
        $sql = "UPDATE cursos SET descritivo_curso = ? WHERE id_curso = ?";

        try{
            $stm = $this->conexao->prepare($sql);
            $stm->bindValue(1, $curso->getDescritivo());
            $stm->bindValue(2, $curso->getIdCurso());
            $stm->execute();

            $this->conexao = null;

        }catch (PDOException $exception){
            $exception->getMessage();
        }
    }
}