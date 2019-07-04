<?php

class HorarioDAO extends Model {
    public function todos_horarios(){
        $sql = "SELECT * FROM horarios ORDER BY id_horario";

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
}