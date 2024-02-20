<?php


class RouterController
{
    public function handleRequest($baseUrl, $feedbackPageController, $userController)
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
                SessionEntryNames::clean([
                    SessionEntryNames::EDIT_MODE_FEEDBACK_INDEX
                ]);
                break;

            case $prefix . RoutingPaths::FEEDBACK:
                $feedbackPageController->showFeedbacks();
                break;
            case $prefix . RoutingPaths::SIGN_IN:
                SessionEntryNames::clean([
                    SessionEntryNames::EDIT_MODE_FEEDBACK_INDEX,
                    SessionEntryNames::PASSWORD_INVALID,
                    SessionEntryNames::EMAIL_INVALID
                ]);
                $userController->showSignInFormView();
                break;
            case $prefix . RoutingPaths::CREATE_ACCOUNT:
                SessionEntryNames::clean([
                    SessionEntryNames::EDIT_MODE_FEEDBACK_INDEX,
                    SessionEntryNames::CREATION_FAILED,
                    SessionEntryNames::EMAIL_EXISTS
                ]);
                $userController->showCreateAccountFormView();
                break;
            default:
                session_unset();
                http_response_code(404);
                echo 'Error 404';
        }
    }
}
