<?php

namespace App\Controller;

class ClienteController extends \Core\Classes\Controller
{
    public function index()
    {
        $this->listar();
    }

    public function listar()
    {
        $m = new \App\Model\Cliente;
        \Core\Classes\View::$title .= ' - Clientes';
        \Core\Classes\View::show('cliente/lista.twig',[
            'clientes' => $m->dadosClientes(),
        ]);
    }

    public function form()
    {
        $op = $_GET['op'];
        $data = [];
        $data['op'] = $op;
        switch ($op) {
            case 'visual':
                $id = $_GET['id'];
                $m = new \App\Model\Cliente;
                $data['cliente'] = $m->get($id);
                break;
            case 'altera':
                $id = $_GET['id'];
                $m = new \App\Model\Cliente;
                $data['cliente'] = $m->get($id);
                break;
        }
        \Core\Classes\View::show('cliente/form.twig', $data);
    }

    public function recebePost()
    {
        $op = $_GET['op'];
        $data = [];
        switch ($op) {
            case 'inclui':
                $u = new \App\Model\Cliente;
                $u->setNome($this->post['nome']);
                $u->setRG($this->post['rg']);
                $u->setCPF($this->post['cpf']);
                $u->setDataNasc($this->post['dataNasc']);
                $u->setEmail($this->post['email']);
                $u->setCep($this->post['cep']);
                $u->setRua($this->post['rua']);
                $u->setNumero($this->post['numero']);
                $u->setBairro($this->post['bairro']);
                $u->setCidade($this->post['cidade']);
                $u->setUF($this->post['uf']);
                $u->setSenha($this->post['senha']);
                $u->setCargo($this->post['cargo']);
                $u->insert();
                break;
            case 'altera':
                $u = new \App\Model\Cliente;
                $u->setNome($this->post['nome']);
                $u->setRG($this->post['rg']);
                $u->setCPF($this->post['cpf']);
                $u->setDataNasc($this->post['dataNasc']);
                $u->setEmail($this->post['email']);
                $u->setCep($this->post['cep']);
                $u->setRua($this->post['rua']);
                $u->setNumero($this->post['numero']);
                $u->setBairro($this->post['bairro']);
                $u->setCidade($this->post['cidade']);
                $u->setUF($this->post['uf']);
                $u->setSenha($this->post['senha']);
                $u->setCargo($this->post['cargo']);
                if ($this->post['senha'] != '') {
                    $u->setSenha($this->post['senha']);
                }
                $u->update($this->post['id_cliente']);
                break;
            case 'deleta':
                $u = new \App\Model\Cliente();
                $u->delete($_GET['id']);
                break;
        }
        redirect('/cliente');
        $this->index();
    }
}