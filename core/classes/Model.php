<?php
/**
 * Classe para abstrair 
 * Author: Maycon de Moraes
 * Date:   30/10/2019
 */

namespace Core\Classes;

abstract class Model
{
    protected $con;
    protected $table;
    protected $pk;
    protected $data = [];

    /**
     * Construtor da model que utiliza uma
     * injeção de depencia para usar a
     * instacia do 
     */
    public function __construct()
    {
        $this->con = \Core\Classes\Database::getInstance();
    }

    /**
     * Metodos sets
     */
    public function setTable($tabela)
    {
        $this->table = $tabela;
    }

    public function setPk($pk)
    {
        $this->pk = $pk;
    }
    
    /**
     * Métodos com abstração de banco de dados
     */
    public function get($id = false)
    {
        if (!$id) {
            return $this->con->query('select * from ' . $this->table)->fetchAll();
        } else {
            return $this->con->query('select * from ' . $this->table .' where ' . $this->pk . ' = ' . $id)->fetch();
        }
    }

    public function insert()
    {
        $campos         = [];
        $camposBind     = [];
        $valores        = [];

        foreach ($this->data as $key => $value) {
            $campos[] = $key;
            $camposBind[] = ":$key";
            $valores[":$key"] = $value;
        }

        $prepare = "INSERT INTO $this->table (" . implode(',', $campos) . ") VALUES (". implode(',', $camposBind) .")";
        
        $idTable = 1;
        $idAdmin = $_SESSION['id'];
        $acao = 'inseriu um novo registro na tabela ' . $this->table;
        $sql = "INSERT INTO registro (id_registro_tabela, id_registro_admin, acao_registro, data_registro) 
                VALUES (:id_registro_tabela, :id_registro_admin, :acao_registro, datetime('now','localtime'));";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(':id_registro_tabela', $idTable);
        $statement->bindParam(':id_registro_admin', $idAdmin);
        $statement->bindParam(':acao_registro', $acao);
        $statement->execute();

        try {
            $stmt = $this->con->prepare($prepare);
            $stmt->execute($valores);
            return $stmt->rowCount();
        } catch (\PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }

    }

    public function delete($id)
    {
        $prepare = "DELETE FROM $this->table WHERE $this->pk = :$this->pk";

        $idTable = 1;
        $idAdmin = $_SESSION['id'];
        $acao = 'deletou um registro da tabela ' . $this->table;
        $sql = "INSERT INTO registro (id_registro_tabela, id_registro_admin, acao_registro, data_registro) 
                VALUES (:id_registro_tabela, :id_registro_admin, :acao_registro, datetime('now','localtime'));";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(':id_registro_tabela', $idTable);
        $statement->bindParam(':id_registro_admin', $idAdmin);
        $statement->bindParam(':acao_registro', $acao);
        $statement->execute();

        try {
            $stmt = $this->con->prepare($prepare);
            $stmt->bindParam(":$this->pk", $id);
            $stmt->execute();
            return $stmt->rowCount();
        } catch (\PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    }

    public function update($id)
    {
        $recupera = $this->con->query('select * from ' . $this->table .' where ' . $this->pk . ' = ' . $id)->fetch();
        if (empty($recupera)) {
            return false;
        }
        
        // recebe os dados atualizados via __set
        foreach ($recupera as $key => $value) {
            $this->data[$key] =  $this->data[$key] ?? $value;
        }

        $bind = [];
        $valores = [];
        foreach ($this->data as $key => $value) {
            $bind[] = "$key = :$key";
            $valores[":$key"] = $value;
        }
        $prepare = "UPDATE $this->table SET ". implode(",", $bind) ." WHERE $this->pk = :$this->pk";
        
        $idTable = 1;
        $idAdmin = $_SESSION['id'];
        $acao = 'alterou um registro da tabela ' . $this->table;
        $sql = "INSERT INTO registro (id_registro_tabela, id_registro_admin, acao_registro, data_registro) 
                VALUES (:id_registro_tabela, :id_registro_admin, :acao_registro, datetime('now','localtime'));";
        $statement = $this->con->prepare($sql);
        $statement->bindParam(':id_registro_tabela', $idTable);
        $statement->bindParam(':id_registro_admin', $idAdmin);
        $statement->bindParam(':acao_registro', $acao);
        $statement->execute();

        try {
            $stmt = $this->con->prepare($prepare);
            $stmt->execute($valores);
            return $stmt->rowCount();
        } catch (\PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }

    }

    /**
     * Métodos magicos
     */
    public function __set($prop, $value)
    {
        $this->data[$prop] = $value;
    }

}