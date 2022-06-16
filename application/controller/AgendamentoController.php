<?php

namespace App\Controller;

class AgendamentoController extends \Core\Classes\Controller
{
    public function index()
    {
        $this->listar();
    }

    public function listar()
    {
        $m = new \App\Model\Agendamento;
        \Core\Classes\View::$title .= ' - Agendamentos';
        \Core\Classes\View::show('agendamento/lista.twig',[
            'agendamentos' => $m->dadosAgenda(),
        ]);
    }

    public function form()
    {
        $op = $_GET['op'];
        $data = [];
        $data['op'] = $op;
        switch ($op) {
            case 'inclui':
                $m = new \App\Model\Agendamento;
                $data['clientes'] = $m->dadosClientes();
                $data['salas'] = $m->dadosSala();
                break;
            case 'visual':
                $id = $_GET['id'];
                $m = new \App\Model\Agendamento;
                $m = new \App\Model\Agendamento;
                $data['clientes'] = $m->dadosClientes();
                $data['salas'] = $m->dadosSala();
                $data['cliente'] = $m->get($id);
                break;
            case 'altera':
                $id = $_GET['id'];
                $m = new \App\Model\Agendamento;
                $m = new \App\Model\Agendamento;
                $data['clientes'] = $m->dadosClientes();
                $data['salas'] = $m->dadosSala();
                $data['cliente'] = $m->get($id);
                break;
        }
        \Core\Classes\View::show('agendamento/form.twig', $data);
    }

    public function recebePost()
    {
        $op = $_GET['op'];
        $data = [];
        switch ($op) {
            case 'inclui':
                $u = new \App\Model\Agendamento;
                $u->setIDCliente($this->post['id_cliente']);
                $u->setIDSala($this->post['id_sala']);
                $u->setData($this->post['dataagend']);
                $u->setHorario2($this->post['horarioagend']);
                $u->setTipo2($this->post['tipoagend']);
                $u->setValor($this->post['valoragend']);
                $u->setFormaPag($this->post['formapag']);
                $u->insert();
                break;
            case 'altera':
                $u = new \App\Model\Agendamento;
                $u->setIDCliente($this->post['id_cliente']);
                $u->setIDSala($this->post['id_sala']);
                $u->setData($this->post['dataagend']);
                $u->setHorario2($this->post['horarioagend']);
                $u->setTipo2($this->post['tipoagend']);
                $u->setValor($this->post['valoragend']);
                $u->setFormaPag($this->post['formapag']);
                $u->update($this->post['id_agenda']);
                break;
            case 'deleta':
                $u = new \App\Model\Agendamento();
                $u->delete($_GET['id']);
                break;
        }
        redirect('/agendamento');
        $this->index();
    }
}