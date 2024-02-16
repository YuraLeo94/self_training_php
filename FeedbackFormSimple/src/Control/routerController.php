<?php


class RouterController
{
    public function handleRequest($baseUrl, $feedbackPageController, $feedbackModel)
    {

        $url = $_SERVER['REQUEST_URI'];
        $path =  parse_url($url)['path'];
        $requestURL = explode($baseUrl, $path);
        $requestedPath = '';
        $prefix = '/';

        if (count($requestURL) > 1) $requestedPath = $requestURL[1];

        switch ($requestedPath) {
            case '':
            case '/':
            case $prefix . RoutingPaths::HOME:
                if ($requestedPath !== '/') {
                    header('Location: ' . explode($requestedPath, $path)[0] . '/');
                    exit();
                }
                $feedbackPageController->showFeedbackForm();
                $this->cleanSession();
                break;

            case $prefix . RoutingPaths::FEEDBACK:
                $feedbackPageController->updateView();
                break;


            default:
                $this->cleanSession();
                http_response_code(404);
                echo 'Error 404';
        }
    }


    public function cleanSession()
    {
        session_unset();
    }
}
