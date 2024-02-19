<?php

class PageManipulation
{

    public static function refreshPage()
    {
        echo '<script type="text/javascript">';
        echo 'window.location.href = "' . parse_url($_SERVER['REQUEST_URI'])['path'] . '";';
        echo '</script>';
    }

    public static function redirectToPage($current, $toPage, $isNeedRedirect)
    {
        if ($isNeedRedirect) {
            $path = parse_url($_SERVER['REQUEST_URI'])['path'];
            $tmpPath = explode($current, $path);
            header("Location: " . $tmpPath[0] .  $toPage);
            exit();
        } else {
            self::refreshPage();
        }
    }
}
