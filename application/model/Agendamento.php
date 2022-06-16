<?php

namespace App\Model;

class Agendamento extends \Core\Classes\Model
{
    public $table = 'agenda';
    
    public $pk = 'id_agenda';
    
    public function setIDCliente(Int $id_cliente)
    {
        $this->id_cliente = $id_cliente;
    }
    
    public function setIDSala(Int $id_sala)
    {
        $this->id_sala = $id_sala;
    }

    public function setData(String $data)
    {
        $this->data = $data;
    }

    public function setHorario2(String $horario2)
    {
        $this->horario = $horario2;
    }

    public function setTipo2(String $tipo2)
    {
        $this->tipo = $tipo2;
    }

    public function setValor(Int $valor)
    {
        $this->valor = $valor;
    }
    
    public function setFormaPag(String $forma_pag)
    {
        $this->forma_pag = $forma_pag;
    }

    public function dadosAgenda()
    {
        $sql = "SELECT * FROM agenda;";
        $statement = $this->con->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_ASSOC);
        $resultado = $statement->fetchAll();
        return $resultado;
    }

    public function dadosClientes() {
        $sql = "SELECT * FROM cliente";
        $statement = $this->con->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_ASSOC);
        $resultado = $statement->fetchAll();
        return $resultado;
    }

    public function dadosSala() 
    {
        $sql = "SELECT * FROM sala;";
        $statement = $this->con->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_ASSOC);
        $resultado = $statement->fetchAll();
        return $resultado;
    }

    public function dadosEquipamentos() 
    {
        $sql = "SELECT * FROM equipamento e INNER JOIN sala s ON s.id_sala = e.id_sala WHERE e.id_sala = 10;";
        $statement = $this->con->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_ASSOC);
        $resultado = $statement->fetchAll();
        return $resultado;
    }

}