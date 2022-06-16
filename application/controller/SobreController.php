<?php

namespace App\Controller;

class SobreController extends \Core\Classes\Controller
{
    public function __construct(Bool $logado = false)
    {
        parent::__construct($logado);
    }

    public function index() 
    {
        \Core\Classes\View::$title .= '';
        \Core\Classes\View::show('site/sobre.twig', [], 'site/sobre.twig');
    }
}