<?php

namespace App\Controller;

class PainelController extends \Core\Classes\Controller
{
    public function index()
    {
        session_start();
        $m = new \App\Model\Painel;
        \Core\Classes\View::$title .= ' - Painel';
        \Core\Classes\View::show('dashboard.twig', [
            'agendamentos'      => $m->dadosLastAgendamentos(),
            'valorGanho'        => $m->dadosTotalGanhoMes() ?? 0,
            'totalAgendamentos' => $m->dadosAgendamentosMes() ?? 0,
            'totalClientes'     => $m->dadosClientesMes() ?? 0,
            'meta_ganho'        => $m->metaGanhosMes(),
            'meta_agenda'       => $m->metaAgendamentosMes(),
            'meta_clientes'     => $m->metaClientesMes(),
        ]);
    }

    // public function logado()
    // {
    //     parent::logado();
    //     \Core\Classes\View::show('welcome.html', [
    //         'logado' => 'Você está logado!'
    //     ]);
    // }
}