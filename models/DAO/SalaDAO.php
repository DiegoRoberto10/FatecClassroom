<?php

class SalaDAO extends Model {
    public function todas_salas(){
        $sql = "SELECT * FROM salas ORDER BY descritivo_sala";

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

    public function recursos_sala($sala){
        $sql = "SELECT r.descritivo_recurso FROM salas s INNER JOIN recursos r ON s.id_recurso = r.id_recurso
                                      WHERE s.id_sala = ?";

        try{
            $stm = $this->conexao->prepare($sql);
            $stm->bindValue(1, $sala->getIdSala());
            $ret = $stm->execute();

            $this->conexao = null;

            if ($ret) {
                return $ret = $stm->fetchAll(PDO::FETCH_ASSOC);
            }

        }catch (PDOException $exception){
            $exception->getMessage();
        }

    }
}