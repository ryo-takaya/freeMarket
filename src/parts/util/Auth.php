<?php

namespace App\Parts\Util;

class Auth{
    static public $REQUIRE_AUTH = ['/withdraw', '/mypage', '/user/edit', '/passedit', '/passremind', '/registproduct'];

    static public function startSession()
    {
        ini_set('session.gc_maxlifetime', 60*60*24*30);
        ini_set('session.cookie_lifetime', 60*60*24*30);
        session_start();
        session_regenerate_id();
    }

    /**
     * ログインに関する処理
     *
     * @return bool | void
     */
    static public function loginFlow()
    {
        if( !empty($_SESSION['login_date'])){
            if(($_SESSION['login_date'] + $_SESSION['login_limit']) < time()){
                session_destroy();
                header("Location:/login");
            }else {
                $_SESSION['login_date'] = time();
                if (in_array($_SERVER['REQUEST_URI'], self::$REQUIRE_AUTH)) {
                    return;
                }
                header('Location:/mypage');
            }
            return;
        }

        if(!($_SERVER['REQUEST_URI'] === '/login')){
            header('Location:/login');
        }
    }

    static public function logout()
    {
        session_start();
        session_destroy();
        header("Location:/login");
    }
}