<?php
/**
 * Author: Maycon de Moraes
 * Date:   30/10/2019
 * Description: Trait de segurança da aplicação
 */

namespace Core\Classes;

class Security
{

    // verifica se o usuario esta logado
    public static function loginRegister(Object $u)
    {
        session_start();
        if (!isset($_SESSION['id'])) {
            $_SESSION['id']      = $u->id_cliente;
            $_SESSION['nome']    = $u->nome;
            $_SESSION['cargo']   = $u->perm;
            $_SESSION['rg']      = $u->rg;
            $_SESSION['cpf']     = $u->cpf;
            $_SESSION['email']   = $u->email;
            $_SESSION['cidade']  = $u->cidade;
            $_SESSION['estado']  = $u->uf;
            $_SESSION['inicioLogin']  = date('Y-m-d H:i:s');
        }
    }

    public static function isAtivo()
    {
        session_start();
        // debug($_SESSION);
        if (!isset($_SESSION['id'])) {
            return false;
            $_SESSION = [];
        }
        return true;
    }

    public static function destroy()
    {
        session_start();
        session_destroy();
        $_SESSION = [];
    }
}