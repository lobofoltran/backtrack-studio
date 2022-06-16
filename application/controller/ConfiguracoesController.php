<?php

namespace App\Controller;

class ConfiguracoesController extends \Core\Classes\Controller
{
    public function index()
    {
        $this->listar();
    }

    public function listar()
    {
        $m = new \App\Model\Configuracoes;
        \Core\Classes\View::$title .= ' - Configurações';
        \Core\Classes\View::show('configuracoes/configuracoes.twig',[
            'meta' => $m->getMeta(),
        ]);
    }

    public function registros()
    {
        $m = new \App\Model\Configuracoes;
        // debug($m->dadosLog());
        \Core\Classes\View::$title .= ' - Logs';
        \Core\Classes\View::show('configuracoes/registro.twig',[
            'logs' => $m->dadosLog()
        ]);
    }

    public function recebePost()
    {
        $op = $_GET['op'];
        $data = [];
        switch ($op) {
            case 'meta':
                $u = new \App\Model\Configuracoes;
                $u->setIdMeta(1);
                $u->setMetaGanhos($this->post['meta_ganhos']);
                $u->setMetaAgend($this->post['meta_agend']);
                $u->setMetaCliente($this->post['meta_cliente']);
                $u->insert(1);
                $u->update(1);
                break;
        }
        redirect('/configuracoes');
        $this->index();
    }
}