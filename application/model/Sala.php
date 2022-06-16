<?php

namespace App\Model;

class Sala extends \Core\Classes\Model
{
    public $table = 'sala';

    public $pk = 'id_sala';
    
    public function setHorarioDisp1(String $horario_disp1)
    {
        $this->horario_disp1 = $horario_disp1;
    }

    public function setHorarioDisp2(String $horario_disp2)
    {
        $this->horario_disp2 = $horario_disp2;
    }

    public function setHorarioDisp3(String $horario_disp3)
    {
        $this->horario_disp3 = $horario_disp3;
    }

    public function setValorEnsaio(String $valor_ensaio)
    {
        $this->valor_ensaio = $valor_ensaio;
    }
    
    public function setValorGravacao(String $valor_gravacao)
    {
        $this->valor_gravacao = $valor_gravacao;
    }

    public function dadosEquipamentosSala()
    {
        $sql = "SELECT * FROM equipamento e INNER JOIN sala s ON s.id_sala = e.id_sala;";
        $statement = $this->con->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_ASSOC);
        $resultado = $statement->fetchAll();
        return $resultado;
    }

}