<?php

namespace App\Controller;

class SalaController extends \Core\Classes\Controller
{
    public function index()
    {
        $this->listar();
    }

    public function listar()
    {
        $m = new \App\Model\Sala;
        \Core\Classes\View::$title .= ' - Salas';
        \Core\Classes\View::show('sala/lista.twig',[
            'salas' => $m->get(),
        ]);
    }

    public function equipamentos()
    {
        $id = $_GET['id'];
        $m = new \App\Model\Sala;
        \Core\Classes\View::$title .= " - Sala $id (Equipamentos)";
        \Core\Classes\View::show('sala/equipamentos.twig',[
            'equipamentos' => $m->dadosEquipamentosSala($id),
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
                $m = new \App\Model\Sala;
                $data['sala'] = $m->get($id);
                break;
            case 'altera':
                $id = $_GET['id'];
                $m = new \App\Model\Sala;
                $data['sala'] = $m->get($id);
                break;
        }
        \Core\Classes\View::show('sala/form.twig', $data);
    }

    public function recebePost()
    {
        $op = $_GET['op'];
        $data = [];
        switch ($op) {
            case 'inclui':
                $u = new \App\Model\Sala;
                $u->setHorarioDisp1($this->post['horario_disp1']);
                $u->setHorarioDisp2($this->post['horario_disp2']);
                $u->setHorarioDisp3($this->post['horario_disp3']);
                $u->setValorEnsaio($this->post['valor_ensaio']);
                $u->setValorGravacao($this->post['valor_gravacao']);
                $u->insert();
                break;
            case 'altera':
                $u = new \App\Model\Sala;
                $u->setHorarioDisp1($this->post['horario_disp1']);
                $u->setHorarioDisp2($this->post['horario_disp2']);
                $u->setHorarioDisp3($this->post['horario_disp3']);
                $u->setValorEnsaio($this->post['valor_ensaio']);
                $u->setValorGravacao($this->post['valor_gravacao']);
                $u->update($this->post['id_sala']);
                break;
            case 'deleta':
                $u = new \App\Model\Sala();
                $u->delete($_GET['id']);
                break;
        }
        redirect('/sala');
        $this->index();
    }}