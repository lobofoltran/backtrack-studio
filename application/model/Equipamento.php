<?php

namespace App\Model;

class Equipamento extends \Core\Classes\Model
{
    public $table = 'equipamento';

    public $pk = 'id_equipamento';
    
    public function setNome(String $nome)
    {
        $this->nome = $nome;
    }

    public function setMarca(String $marca)
    {
        $this->marca = $marca;
    }

    public function setModelo(String $modelo)
    {
        $this->modelo = $modelo;
    }

    public function setTipo(String $tipo)
    {
        $this->tipo = $tipo;
    }
    
    public function setIDSala(String $id_sala)
    {
        $this->id_sala = $id_sala;
    }

}