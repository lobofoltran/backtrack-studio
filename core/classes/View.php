<?php
/**
 * Author: Maycon de Moraes
 * Date:   27/11/2019
 * Description: Classe para abstratir algumas camadas que lidarão com a view
 */

namespace Core\Classes;

abstract class View
{
    private static $fileAppPathView     = '././application/view/html'; 
    private static $fileCorePathView    = '././core/template';
    private static $pathCache           = '././application/view/cache';
    private static $autoReload          = true;
    public static $title                = 'Backtrack Studio';
    public static $twig;

    // deixar a contrução da instancia do twig singleton
    private function __construct(){}


    /** 
     * Retorna uma unica instancia do twig
     */
    public static function getInstanceTwig()
    {
        if (!isset(self::$twig)) {
            $loader = new \Twig\Loader\FilesystemLoader([self::$fileAppPathView, self::$fileCorePathView]);
            self::$twig = new \Twig\Environment($loader, [
                'cache' => self::$pathCache,
                'auto_reload' => self::$autoReload,
            ]);
        }
        return self::$twig;
    }

    /**
     * Abstrai a maneira de mostrar a view do framewok
     * desta maneira ele sempre mostra os dados dentro do template padrão
     */
    public static function show(String $file, Array $data = [], $layout = 'layout-base.twig')
    {   
        $template = self::$twig->render($file, $data);
        $m = new \App\Model\Painel;
        self::$twig->display($layout, [
            'main'              => $template,
            'logado'            => \Core\Classes\Security::isAtivo(),
            'session'           => $_SESSION,
            'tit'               => self::$title,
            'ganhosMes'         => $m->dadosGanhosGerais() ?? 0,
            'agendamentosMes'   => $m->dadosAgendamentosGerais() ?? 0,
            'clientesMes'       => $m->dadosClientesGerais() ?? 0,
            'registros'         => $m->dadosRegistros() ?? 0,
            'data1'             => $m->dadosData1(),
            'data2'             => $m->dadosData2(),
            'data3'             => $m->dadosData3(),
            'id_registro1'      => $m->dadosRegistro1(),
            'id_registro2'      => $m->dadosRegistro2(),
            'id_registro3'      => $m->dadosRegistro3(),
        ]);
    }
}