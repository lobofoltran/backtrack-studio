<?php

namespace App\Controller;

class LoginController extends \Core\Classes\Controller
{
    public function __construct(Bool $logado = false)
    {
        parent::__construct($logado);
    }

    public function index()
    {
        if(\Core\Classes\Security::isAtivo()){
            redirect('/painel');
        }
        \Core\Classes\View::show('site/login.twig', [], 'site/login.twig');
    }

    public function logar()
    {
        if ($this->checkPost()) {
            $m = new \App\Model\Cliente;
            $m->setCPF($this->post['cpf']);
            $m->setSenha($this->post['senha']);
            if($m->authDb()) {
                redirect('/painel');
            } else {
                redirect('/login');
            }
        } else {
            redirect('/login');
        }
    }

    public function logof()
    {
        \Core\Classes\Security::destroy();
        redirect(DEFAULTCONTROLLER);
    }
}