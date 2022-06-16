<?php

namespace App\Controller;

class EquipamentoController extends \Core\Classes\Controller
{
    public function index()
    {
        $this->listar();
    }

    public function listar()
    {
        $m = new \App\Model\Equipamento;
        \Core\Classes\View::$title .= ' - Equipamentos';
        \Core\Classes\View::show('equipamento/lista.twig',[
            'equipamentos' => $m->get(),
        ]);
    }

    public function form()
    {
        $op = $_GET['op'];
        $data = [];
        $data['op'] = $op;
        switch ($op) {
            case 'inclui':
                $id = $_GET['id'];
                $u = new \App\Model\Agendamento;
                $data['sala'] = $u->dadosSala();
                break;
            case 'visual':
                $id = $_GET['id'];
                $u = new \App\Model\Agendamento;
                $m = new \App\Model\Equipamento;
                $data['equipamento'] = $m->get($id);
                $data['sala'] = $u->dadosSala();
                break;
            case 'altera':
                $id = $_GET['id'];
                $u = new \App\Model\Agendamento;
                $m = new \App\Model\Equipamento;
                $data['equipamento'] = $m->get($id);
                $data['sala'] = $u->dadosSala();
                break;
        }
        \Core\Classes\View::show('equipamento/form.twig', $data);
    }

    public function recebePost()
    {
        $op = $_GET['op'];
        $data = [];
        switch ($op) {
            case 'inclui':
                $u = new \App\Model\Equipamento;
                $u->setNome($this->post['nome']);
                $u->setMarca($this->post['marca']);
                $u->setModelo($this->post['modelo']);
                $u->setTipo($this->post['tipo']);
                $u->setIDSala($this->post['id_sala']);
                $u->insert();
                break;
            case 'altera':
                $u = new \App\Model\Equipamento;
                $u->setNome($this->post['nome']);
                $u->setMarca($this->post['marca']);
                $u->setModelo($this->post['modelo']);
                $u->setTipo($this->post['tipo']);
                $u->setIDSala($this->post['id_sala']);
                $u->update($this->post['id_equipamento']);
                break;
            case 'deleta':
                $u = new \App\Model\Equipamento();
                $u->delete($_GET['id']);
                break;
        }
        redirect('/equipamento');
        $this->index();
    }
}