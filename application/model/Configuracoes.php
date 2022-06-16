<?php

namespace App\Model;

class Configuracoes extends \Core\Classes\Model
{
    public $table = 'meta';

    public $pk = 'id_meta';

    public function setIdMeta(Int $id = 1) 
    {
        $this->id_meta = $id;
    }
    
    public function setMetaGanhos(String $meta_ganhos)
    {
        $this->meta_ganhos = $meta_ganhos;
    }

    public function setMetaAgend(String $meta_agend)
    {
        $this->meta_agend = $meta_agend;
    }

    public function setMetaCliente(String $meta_cliente)
    {
        $this->meta_cliente = $meta_cliente;
    }

    public function getMeta()
    {
        $sql = "SELECT meta_ganhos, meta_agend, meta_cliente FROM meta WHERE id_meta = 1;";
        $statement = $this->con->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $resultado = $statement->fetchAll();
        return $resultado;
    }

    public function dadosLog()
    {
        $sql = "SELECT * FROM registro;";
        $statement = $this->con->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_ASSOC);
        $resultado = $statement->fetchAll();
        return $resultado;
    }

}