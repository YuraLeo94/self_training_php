<?php

class HandleActions
{
    public function handleActions($feedbackPageController)
    {
        $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_SPECIAL_CHARS );
        if (!$action && isset($_GET['action'])) {
            $action = $_GET['action'];
        }

        if (!!$action) {
            $index = isset($_GET['index']) ? $_GET['index'] : null;

            switch ($action) {
                case 'edit':
                    $feedbackPageController->onEdit($index);
                    break;
                case 'cancel':
                    $feedbackPageController->onCancel();
                    break;
                case 'apply':
                    $feedbackPageController->onApply();
                    break;
                case 'delete':
                    $feedbackPageController->onDelete($index);
                    break;
            }
        }
    }
}
