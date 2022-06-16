<?php

namespace App\Model;

class Cliente extends \Core\Classes\Model
{
    public $table = 'cliente';
    
    public $pk = 'id_cliente';

    public function setNome(String $nome)
    {
        $this->nome = ucwords($nome);
    }

    public function setRG(String $rg)
    {
        $this->rg = $rg;
    }

    public function setCPF(String $cpf)
    {
        $this->cpf = $cpf;
    }

    public function setDataNasc(String $dataNasc)
    {
        $this->dataNasc = $dataNasc;
    }

    public function setEmail(String $email)
    {
        if (filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
            $this->email = trim($email);
        } else {
            throw new \Exception("Invalid E-mail", 1);   
        }
    }
    
    public function setCEP(String $cep)
    {
        $this->cep = $cep;
    }

    public function setRua(String $rua)
    {
        $this->rua = ucwords($rua);
    }

    public function setNumero(Int $numero)
    {
        $this->numero = $numero;
    }

    public function setBairro(String $bairro)
    {
        $this->bairro = ucwords($bairro);
    }

    public function setCidade(String $cidade)
    {
        $this->cidade = ucwords($cidade);
    }

    public function setUF(String $uf)
    {
        $this->uf = strtoupper($uf);
    }

    public function setSenha(String $senha)
    {
        $this->senha = hash('sha256', $senha);
    }

    public function setCargo(String $perm)
    {
        $this->perm = ucwords($perm);
    }

    public function dadosClientes()
    {
        $sql = "SELECT * FROM cliente;";
        $statement = $this->con->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_ASSOC);
        $resultado = $statement->fetchAll();
        return $resultado;
    }

    public function authDb()
    {
        $sql = "SELECT * from cliente WHERE cpf = '". $this->data['cpf'] . "' AND senha = '" . $this->data['senha'] . "'";
        $statement = $this->con->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(\PDO::FETCH_OBJ);
        $resultado = $statement->fetch();

        if (empty($resultado)) {
            
            return false;
        } else {            
            \Core\Classes\Security::loginRegister($resultado);
            return true;
        }
    }

}