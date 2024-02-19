<?php

class PageManipulation {

    public static function refreshPage() {
        header("Location: " . parse_url($_SERVER['REQUEST_URI'])['path']);
        exit();
    }

    public static function redirectToPage($current, $toPage, $isNeedRedirect) {
        if ($isNeedRedirect) {
            $path = parse_url($_SERVER['REQUEST_URI'])['path'];
            $tmpPath = explode($current, $path);
            header("Location: " . $tmpPath[0] .  $toPage);
            exit();
        }
        else {
            self::refreshPage();
        }
    }
}