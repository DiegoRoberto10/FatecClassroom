<?php

class ReservaDAO extends Model {

    public function todas_reservas_proprias_n(){
        $sql = "SELECT * FROM reservas r 
                  INNER JOIN reservas_horarios rh ON r.id_reserva = rh.id_reserva
                  INNER JOIN horarios h ON rh.id_horario = h.id_horario
                  INNER JOIN salas s ON r.id_sala = s.id_sala
                  INNER JOIN recursos rc ON rc.id_recurso = s.id_recurso
                  INNER JOIN disciplinas d ON r.id_disciplina = d.id_disciplinas
                  INNER JOIN professores p ON r.id_professor = p.id_professor
                  WHERE r.id_professor = ? AND r.data_reserva > CURRENT_DATE 
                  ORDER BY r.id_reserva, r.id_sala, h.id_horario";
        try{
            $stm = $this->conexao->prepare($sql);
            $stm->bindValue(1, $_SESSION['id_professor']);
            $ret = $stm->execute();

            $this->conexao = null;

            if ($ret) {
                return $ret = $stm->fetchAll(PDO::FETCH_OBJ);
            }
        }catch (PDOException $exception){
            die($exception->getMessage());
        }
    }

    public function todas_reservas_proprias_a(){
        $sql = "SELECT * FROM reservas r 
                  INNER JOIN reservas_horarios rh ON r.id_reserva = rh.id_reserva
                  INNER JOIN horarios h ON rh.id_horario = h.id_horario
                  INNER JOIN salas s ON r.id_sala = s.id_sala
                  INNER JOIN recursos rc ON rc.id_recurso = s.id_recurso
                  INNER JOIN disciplinas d ON r.id_disciplina = d.id_disciplinas
                  INNER JOIN professores p ON r.id_professor = p.id_professor
                  WHERE r.id_professor = ? AND r.data_reserva < CURRENT_DATE 
                  ORDER BY r.id_reserva, r.id_sala, h.id_horario";
        try{
            $stm = $this->conexao->prepare($sql);
            $stm->bindValue(1, $_SESSION['id_professor']);
            $ret = $stm->execute();

            $this->conexao = null;

            if ($ret) {
                return $ret = $stm->fetchAll(PDO::FETCH_OBJ);
            }
        }catch (PDOException $exception){
            die($exception->getMessage());
        }
    }

    public function horarios_reservados($data, $sala){
        $sql = "SELECT rh.id_horario FROM reservas_horarios rh
                            INNER JOIN reservas r ON r.id_reserva = rh.id_reserva
                            WHERE r.data_reserva = ? AND r.id_sala = ?";
        try{
            $stm = $this->conexao->prepare($sql);
            $stm->bindValue(1, $data);
            $stm->bindValue(2, $sala);

            $ret = $stm->execute();

            $this->conexao = null;

            if ($ret) {
                return $ret = $stm->fetchAll(PDO::FETCH_ASSOC);
            }

        }catch (PDOException $exception){
            die($exception->getMessage());
        }
    }

    public function cadastrar_reserva($reserva, $horario){

        $this->conexao->beginTransaction();

        $sqlr = "INSERT INTO reservas (id_professor, id_sala, id_disciplina, data_reserva) VALUES (?, ?, ?, ?)";
        try{
            $stm = $this->conexao->prepare($sqlr);
            $stm->bindValue(1, $reserva->getProfessor());
            $stm->bindValue(2, $reserva->getSala());
            $stm->bindValue(3, $reserva->getDisciplina());
            $stm->bindValue(4, $reserva->getDataReserva());
            $ret = $stm->execute();

            if (!$ret){
                die('Erro ao inserir Reserva');
            }else{
                $id = $this->conexao->lastInsertId();

                $sqlh = "INSERT INTO reservas_horarios (id_reserva, id_horario) VALUES (?, ?)";
                try{
                    $stm2 = $this->conexao->prepare($sqlh);

                    foreach($horario as $h){

                        $stm2->bindValue(1, $id);
                        $stm2->bindValue(2, $h);

                        $ret2 = $stm2->execute();
                        if (!$ret2){
                            $this->conexao->rollBack();
                            die('Erro ao inserir Horarios');
                        }
                    }

                    $this->conexao->commit();
                    $this->conexao = null;

                    return true;
                }catch (PDOException $exception){
                    die($exception->getMessage());
                }
            }
        }catch (PDOException $exception){
            die($exception->getMessage());
        }
    }

    public function excluir_reserva($reserva){

        $this->conexao->beginTransaction();

        $sqlr = "DELETE FROM reservas_horarios WHERE id_reserva = ?";

        try{
            $stm = $this->conexao->prepare($sqlr);
            $stm->bindValue(1, $reserva->getIdReserva());
            $ret = $stm->execute();

            if (!$ret){
                die('Erro ao deletar Reserva');
            }else{
                $sqlh = "DELETE FROM reservas WHERE id_reserva = ?";

                try{
                    $stm2 = $this->conexao->prepare($sqlh);
                    $stm2->bindValue(1, $reserva->getIdReserva());
                    $ret2 = $stm2->execute();

                    if (!$ret2) {
                        $this->conexao->rollBack();
                        die('Erro ao deletar Reserva_Horarios');
                    }

                    $this->conexao->commit();
                    $this->conexao = null;

                    return true;
                }catch (PDOException $exception){
                    die($exception->getMessage());
                }
            }
        }catch (PDOException $exception){
            die($exception->getMessage());
        }
    }
}