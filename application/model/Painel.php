<?php

namespace App\Model;

class Painel extends \Core\Classes\Model
{
    public function dadosLastAgendamentos()
    {
        $sql = "SELECT * FROM cliente cli INNER JOIN agenda ag ON cli.id_cliente = ag.id_cliente ORDER BY ag.data DESC LIMIT 5;";
        $statement = $this->con->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $result = $statement->fetchAll();
        return $result;       
    }

    public function dadosTotalGanhoMes()
    {
        $sql = "SELECT sum(valor) as 'totalValor' FROM agenda WHERE data < DATETIME('now', '-30 day');";
        $statement = $this->con->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $result = $statement->fetchAll();
        foreach ($result as $k => $cliente) {
            $resultado = $cliente->totalValor;
        }
        return $resultado;
    }

    public function dadosAgendamentosMes()
    {
        $sql = "SELECT count(*) as 'contaAgenda' FROM agenda WHERE data < DATETIME('now', '-30 day');";
        $statement = $this->con->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $result = $statement->fetchAll();
        foreach ($result as $k => $cliente) {
            $resultado = $cliente->contaAgenda;
        }
        return $resultado;
    }

    public function dadosClientesMes()
    {
        $sql = "SELECT count(*) as 'contaClientes' FROM cliente"; // WHERE data > DATETIME('now', '-30 day');
        $statement = $this->con->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $result = $statement->fetchAll();
        foreach ($result as $k => $cliente) {
            $resultado = $cliente->contaClientes;
        }
        return $resultado;
    }

    public function metaGanhosMes()
    {
        $sql = "SELECT meta_ganhos FROM meta WHERE id_meta = 1;";
        $statement = $this->con->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $result = $statement->fetchAll();
        foreach ($result as $k => $meta) {
            $resultado = $meta->meta_ganhos;
        }
        return $resultado;
    } 

    public function metaAgendamentosMes()
    {
        $sql = "SELECT meta_agend FROM meta WHERE id_meta = 1;";
        $statement = $this->con->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $result = $statement->fetchAll();
        foreach ($result as $k => $meta) {
            $resultado = $meta->meta_agend;
        }
        return $resultado;
    } 

    public function metaClientesMes()
    {
        $sql = "SELECT meta_cliente FROM meta WHERE id_meta = 1;";
        $statement = $this->con->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $result = $statement->fetchAll();
        foreach ($result as $k => $meta) {
            $resultado = $meta->meta_cliente;
        }
        return $resultado;
    }

    // RIGHT
    public function dadosGanhosGerais()
    {
        $sql = "SELECT sum(valor) as 'contaGanhosMes' FROM agenda;";
        $statement = $this->con->prepare($sql);
        $statement->execute();
        $result = $statement->setFetchMode(\PDO::FETCH_OBJ);
        $result = $statement->fetchAll();
        foreach ($result as $k => $agenda) {
            $resultado = $agenda->contaGanhosMes;
        }
        return $resultado;
    }

    public function dadosAgendamentosGerais()
    {
        $sql = "SELECT count(*) as 'contaAgendamentosMes' FROM agenda;";
        $statement = $this->con->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $result = $statement->fetchAll();
        foreach ($result as $k => $agenda) {
            $resultado = $agenda->contaAgendamentosMes;
        }
        return $resultado;
    }

    public function dadosClientesGerais()
    {
        $sql = "SELECT count(*) as 'contaClienteMes' FROM cliente;";
        $statement = $this->con->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $result = $statement->fetchAll();
        foreach ($result as $k => $cliente) {
            $resultado = $cliente->contaClienteMes;
        }
        return $resultado;
    }

    public function dadosRegistros()
    {
        $sql = "SELECT id_registro, id_registro_admin, acao_registro, data_registro, substr(nome,1,instr(nome, ' ') - 1) as 'nome' FROM registro r INNER JOIN cliente c ON r.id_registro_admin = c.id_cliente ORDER BY id_registro DESC LIMIT 3;";
        $statement = $this->con->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_ASSOC);
        $resultado = $statement->fetchAll();
        return $resultado;
    }

    public function dadosData1()
    {
        $sql = "SELECT data_registro FROM registro r INNER JOIN cliente c ON r.id_registro_admin = c.id_cliente WHERE id_registro = (SELECT MAX(id_registro) FROM registro) ORDER BY id_registro DESC;";
        $statement = $this->con->prepare($sql);
        $statement->execute();
        $result = $statement->setFetchMode(\PDO::FETCH_OBJ);
        $result = $statement->fetchAll();
        foreach ($result as $k => $registro) {
            $resultado = $registro->data_registro;
        }
        return diffSecsMinHourYears($resultado);
    }

    public function dadosData2()
    {
        $sql = "SELECT data_registro FROM registro r INNER JOIN cliente c ON r.id_registro_admin = c.id_cliente WHERE id_registro = (SELECT MAX(id_registro) -1 FROM registro) ORDER BY id_registro DESC;";
        $statement = $this->con->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $result = $statement->fetchAll();
        foreach ($result as $k => $registro) {
            $resultado = $registro->data_registro;
        }
        return diffSecsMinHourYears($resultado);
    }

    public function dadosData3()
    {
        $sql = "SELECT data_registro FROM registro r INNER JOIN cliente c ON r.id_registro_admin = c.id_cliente WHERE id_registro = (SELECT MAX(id_registro) -2 FROM registro) ORDER BY id_registro DESC;";
        $statement = $this->con->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $result = $statement->fetchAll();
        foreach ($result as $k => $registro) {
            $resultado = $registro->data_registro;
        }
        return diffSecsMinHourYears($resultado);
    }

    public function dadosRegistro1()
    {
        $sql = "SELECT id_registro FROM registro WHERE id_registro = (SELECT MAX(id_registro) FROM registro) ORDER BY id_registro DESC;";
        $statement = $this->con->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $result = $statement->fetchAll();
        foreach ($result as $k => $registro) {
            $resultado = $registro->id_registro;
        }
        return $resultado;
    }

    public function dadosRegistro2()
    {
        $sql = "SELECT id_registro FROM registro WHERE id_registro = (SELECT MAX(id_registro) -1 FROM registro) ORDER BY id_registro DESC;";
        $statement = $this->con->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $result = $statement->fetchAll();
        foreach ($result as $k => $registro) {
            $resultado = $registro->id_registro;
        }
        return $resultado;
    }

    public function dadosRegistro3()
    {
        $sql = "SELECT id_registro FROM registro WHERE id_registro = (SELECT MAX(id_registro) -2 FROM registro) ORDER BY id_registro DESC;";
        $statement = $this->con->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $result = $statement->fetchAll();
        foreach ($result as $k => $registro) {
            $resultado = $registro->id_registro;
        }
        return $resultado;
    }

}