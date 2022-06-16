<?php

namespace App\Controller;

class CursosController extends \Core\Classes\Controller
{
    public function __construct(Bool $logado = false)
    {
        parent::__construct($logado);
    }

    public function index() 
    {
        \Core\Classes\View::show('site/cursos.twig', [], 'site/cursos.twig');
    }
}