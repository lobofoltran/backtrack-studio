<?php

namespace App\Controller;

class InicioController extends \Core\Classes\Controller
{
    public function __construct(Bool $logado = false)
    {
        parent::__construct($logado);
    }
    
    public function index() 
    {
        \Core\Classes\View::show('site/index.twig', [], 'site/index.twig');
    }
}