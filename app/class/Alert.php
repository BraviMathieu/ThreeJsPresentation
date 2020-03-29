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
        return "<div class='alert-message'>
                <div class=\"row\">
                    <div class=\"col-md-12\">
                        <div class=\"alert alert-{$data['type']}\">
                            {$data['message']}
                        </div>
                    </div>
                </div>
                </div>";
    }

    public function error($message)
    {
        $_SESSION['alert'][] = [
            'message' => $message,
            'type' => 'danger'
        ];
    }

    public function success($message)
    {
        $_SESSION['alert'][] = [
            'message' => $message,
            'type' => 'success'
        ];
    }

}