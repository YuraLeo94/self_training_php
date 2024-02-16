<?php

class HandleActions
{
    public function handleActions($feedbackPageController)
    {
        $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_SPECIAL_CHARS);
        $id = filter_input(INPUT_POST, 'apply_id', FILTER_SANITIZE_SPECIAL_CHARS);

        if (!$action && isset($_GET['action'])) {
            $action = $_GET['action'];
        }

        if (!!$action) {
            $index = isset($_GET['index']) ? $_GET['index'] : null;

            switch ($action) {
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
                    if ($id) {
                        $feedbackPageController->onApply($id);
                    }
                    // display modal error
                    break;
                case 'delete':
                    if (isset($_GET['id'])) {
                        $feedbackPageController->onDelete($_GET['id']);
                    }
                    // display modal error
                    break;
            }
        }
    }
}
