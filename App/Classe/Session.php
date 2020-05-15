<?php

namespace App;


class Session
{
    private static $_instance;

    public static function read($key)
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Session();
        }
        return self::$_instance->recup($key);
    }

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Session();
        }
        self::$_instance;
    }

    public static function write($key, $value)
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Session();
        }
        return self::$_instance->writeValue($key, $value);
    }

    public static function destroy()
    {
        if (!is_null(self::$_instance)) {
            self::$_instance = null;
        } else {
            new Session();
        }
        $_SESSION = [];
        session_destroy();
        Alert::getInstance()->success('Vous êtes déconnecté !');
        header('Location: login');
        exit();
    }

    private function writeValue($path, $value)
    {
        $parts = explode('.', $path);
        $obj = '';
        foreach ($parts as $key) {
            $obj .= '{"' . $key . '":';
        }
        $obj .= json_encode($value);
        for ($i = 0; $i < count($parts); $i++) {
            $obj .= '}';
        }
        $_SESSION = array_merge(
            json_decode($obj, true),
            $_SESSION
        );
        return true;
    }

    private function recup($path)
    {
        $parts = explode('.', $path);
        $data = $_SESSION;
        foreach ($parts as $key) {
            if ((is_array($data)) && isset($data[$key])) {
                $data = $data[$key];
            } else {
                return null;
            }
        }
        return $data;
    }

    public function __construct()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }
}