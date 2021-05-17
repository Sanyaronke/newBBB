<?php


class Alert {

    /**
     * set Alert
     *
     * @param string $msg the alert message
     * @param string $color color to apply to the alert
     * @return void
     */
    public static function setAlert(string $msg , string $color) {
        $_SESSION["alert"]=[
            "msg" => $msg,
            "color" => $color
        ];
    }

    /**
     * show the alert message
     *
     * @return void
     */
    public static function echoAlert()
    {
        if(!empty( $_SESSION["alert"])){
            $color = $_SESSION['alert']['color'];
            $txt = $_SESSION['alert']['msg'];
            echo "<span class='text-center text-$color'>{$txt}</span>";
        }
        unset($_SESSION["alert"]);
    }
}