<?php
/**
 * Classe para conexão via PDO com o banco de dados
 * Author: Maycon de Moraes
 * Date:   30/10/2019
 */

namespace Core\Classes;

use PDO;

class Database
{
    public static $db;
    private static $pathFileConfig = '././core/config/config.ini';

    private function __construct(){}

    public static function getInstance()
    {
        try {
            if (!isset(self::$db)) {
                if (file_exists(self::$pathFileConfig)) {
                    self::$db = new \PDO('sqlite:'.'././core/config/database.db');
                    self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                    self::$db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
               } else {
                   die('Arquivo de configuração de banco de dados não existente!');
               }
            }
            return self::$db;
        } catch (\Throwable $th) {
            echo 'Erro: ' . $th->getMessage();
        }
           
    }

    public function closeInstance()
    {
        self::$db = null;
    }

}