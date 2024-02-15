<?php

class HandleActions {

    public function handleActions($feedbackPageController) {
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            $index = isset($_GET['index']) ? $_GET['index'] : null;
        
            switch ($action) {
                case 'edit':
                    $feedbackPageController->onEdit($index, "Updated Task");
                    break;
                case 'delete':
                    // $feedbackPageController->deleteTask($index);
                    break;
                // Add other actions as needed
            }
        }
    }
}