<?php

namespace App\Controller;

class GraficosController extends \Core\Classes\Controller
{
    public function index() 
    {
        \Core\Classes\View::$title .= ' - Gráficos';
        \Core\Classes\View::show('graficos.twig', []);
    }
}