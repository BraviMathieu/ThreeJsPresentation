<?php

namespace App;


class Alert
{
    private static $_instance;

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Alert();
        }

        return self::$_instance;
    }

    public function __construct($type = null, $message = null)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if ($type && $message) {
            $this->$type($message);
        }
    }

    public static function display()
    {
        self::getInstance();

        if (!isset($_SESSION['alert']) || !is_array($_SESSION['alert'])) {
            return "";
        }

        $out = "";
        foreach ($_SESSION['alert'] as $item) {
            $out .= self::pattern($item);
        }

        unset($_SESSION['alert']);
        return $out;
    }

    private static function pattern($data)
    {
        return <<<SCRIPT
          <script>
          new bs_toast.Toast({
            body: '{$data['message']}',
            className: 'border-0 bg-{$data['type']} text-white',
            btnCloseWhite: true,
            }).show()
          </script>
SCRIPT;
    }

    public function error($message)
    {
        $_SESSION['alert'][] = [
            'message' => $message,
            'type' => 'error'
        ];
    }

    public function info($message)
    {
        $_SESSION['alert'][] = [
            'message' => $message,
            'type' => 'info'
        ];
    }

    public function success($message)
    {
        $_SESSION['alert'][] = [
            'message' => $message,
            'type' => 'success'
        ];
    }

    public function warning($message)
    {
        $_SESSION['alert'][] = [
            'message' => $message,
            'type' => 'warning'
        ];
    }
}