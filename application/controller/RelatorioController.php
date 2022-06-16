<?php

namespace App\Controller;

class RelatorioController extends \Core\Classes\Controller
{
    public function index() 
    {
        \Core\Classes\View::$title .= ' - Relatórios';
        \Core\Classes\View::show('relatorio.twig', []);
    }

    public function relatorio()
    {
        $op = $_GET['op'];
        switch ($op) {
            case '1':
                $this->makePdfAgendSemana();
                break;
        }
    }

    public function makePdfAgendSemana()
    {
        // implementação do pdf
    }

}