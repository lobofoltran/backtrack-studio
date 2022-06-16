<?php

namespace App\Controller;

class ContatoController extends \Core\Classes\Controller
{
    public function __construct(Bool $logado = false)
    {
        parent::__construct($logado);
    }

    public function index() 
    {
        \Core\Classes\View::show('site/contato.twig', [], 'site/contato.twig');
    }
}