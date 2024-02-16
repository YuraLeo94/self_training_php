<?php

class FeedbackPageController
{

    private $feedbackModel;
    private $model;
    private $view;

    public function __construct($model, $view, $feedbackModel)
    {
        $this->model = $model;
        $this->view = $view;
        $this->feedbackModel = $feedbackModel;
    }

    private function refreshView() {
        header("Location: ".parse_url($_SERVER['REQUEST_URI'])['path']);
        exit();

    }

    public function onEdit(int $value) {
        $this->model->setEditModeFeedbackIndex($value);
        $_SESSION['editModeFeedbackIndex'] = $value;
        $this->refreshView();
    }

    public function onCancel() {
        $_SESSION['editModeFeedbackIndex'] = null;
        $this->refreshView();
    }

    public function onApply() {
        $_SESSION['editModeFeedbackIndex'] = null;
        $this->refreshView();
    }

    public function onDelete(int $value) {
        // call model method
        $this->refreshView();
    }

    public function updateView($feedbacks = null)
    {
        $editModeFeedbackIndex = null;
        if (isset($_SESSION['editModeFeedbackIndex'])) {
            $editModeFeedbackIndex = $_SESSION['editModeFeedbackIndex'];
        }

        if ($feedbacks === null) {
            $feedbacks = $this->feedbackModel->getFeedbacks();
        }

        $this->view->render($feedbacks, $editModeFeedbackIndex);
    }
}

session_start();