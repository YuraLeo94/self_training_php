<?php

class FeedbackPageController
{

    private $feedbackModel;
    private $view;
    private $feedbackFormView;

    public function __construct($view, $feedbackModel, $feedbackFormView)
    {
        $this->view = $view;
        $this->feedbackModel = $feedbackModel;
        $this->feedbackFormView = $feedbackFormView;
    }

    private function refreshView()
    {
        header("Location: " . parse_url($_SERVER['REQUEST_URI'])['path']);
        exit();
    }

    public function onEdit(int $value)
    {
        $_SESSION['editModeFeedbackIndex'] = $value;
        $this->refreshView();
    }

    public function onCancel()
    {
        $_SESSION['editModeFeedbackIndex'] = null;
        $this->refreshView();
    }

    public function onApply($id)
    {
        $body = !empty($_POST['feedback']) ? filter_input(
            INPUT_POST,
            'feedback',
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        ) : '';
        if (!!$body) {
            $_SESSION['editModeFeedbackIndex'] = null;
            $this->feedbackModel->update($id, $body);
            $this->refreshView();
        }
    }

    public function onDelete($index)
    {
        $this->feedbackModel->delete($index);
        $this->refreshView();
    }

    public function showFeedbackForm()
    {
        $fieldsData = unserialize(FEEDBACK_FORM_FIELDS);
        $this->feedbackFormView->renderFeedbackForm($fieldsData);
    }

    public function submitFeedback()
    {
        $name = !empty($_POST['name']) ? filter_input(
            INPUT_POST,
            'name',
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        ) : '';
        $email = !empty($_POST['email']) ? filter_input(
            INPUT_POST,
            'email',
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        ) : '';
        $feedback = !empty($_POST['feedback']) ? filter_input(
            INPUT_POST,
            'feedback',
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        ) : '';
        if (!!$name && !!$email && !!$feedback) {
            $this->feedbackModel->add($name, $email, $feedback);
            $this->refreshView();
        }
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
