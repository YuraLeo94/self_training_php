<?php

class HandleActions
{
    public function handleActions($feedbackPageController, $userController)
    {
        $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_SPECIAL_CHARS);

        if (!$action && isset($_GET['action'])) {
            $action = $_GET['action'];
        }

        if (!!$action) {
            $index = isset($_GET['index']) ? $_GET['index'] : null;

            switch ($action) {
                case 'close_modal':
                    $_SESSION[SessionEntryNames::SHOW_MODAL] = false;
                    $_SESSION[SessionEntryNames::MODAL_MESSAGE] = null;
                    PageManipulation::refreshPage();
                    break;
                case 'submit':
                    $feedbackPageController->submitFeedback();
                    break;
                case 'edit':
                    $feedbackPageController->onEdit($index);
                    break;
                case 'cancel':
                    $feedbackPageController->onCancel();
                    break;
                case 'apply':
                    $id = filter_input(INPUT_POST, 'apply_id', FILTER_SANITIZE_SPECIAL_CHARS);
                    if ($id) {
                        $feedbackPageController->onApply($id);
                    } else {
                        $_SESSION[SessionEntryNames::MODAL_MESSAGE] = 'Something went wrong.';
                        $_SESSION[SessionEntryNames::SHOW_MODAL] = true;
                        PageManipulation::refreshPage();
                    }
                    break;
                case 'sign_in':
                    $userController->onLogin();
                    break;
                case 'create_acc':
                    $userController->onCreatAccount();
                    break;
                case 'logout':
                    $userController->onLogout();
                    break;
                case 'delete':
                    if (isset($_GET['id'])) {
                        $feedbackPageController->onDelete($_GET['id']);
                    } else {
                        $_SESSION[SessionEntryNames::MODAL_MESSAGE] = 'Something went wrong.';
                        $_SESSION[SessionEntryNames::SHOW_MODAL] = true;
                        PageManipulation::refreshPage();
                    }
                    break;
            }
        }
    }
}
