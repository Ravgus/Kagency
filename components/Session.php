<?php

class Session
{
    public static function init_session(){ //старт сессии
        if(!isset($_SESSION)) {
            session_start();
        }
    }

    public static function get_session_id(){
        return session_id();
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function has($key)
    {
        return isset($_SESSION[$key]);
    }

    public static function get($key)
    {
        if (self::has($key)) {
            return $_SESSION[$key];
        }
        return null;
    }

    public static function delete($key)
    {
        unset($_SESSION[$key]);
    }

    public static function clear() //очистка переменных сессии
    {
        session_unset();
    }

    public static function destroy() //удаление сессии
    {
        self::clear();
        session_destroy();
    }
}