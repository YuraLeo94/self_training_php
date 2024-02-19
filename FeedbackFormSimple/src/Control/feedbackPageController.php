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

    public function onEdit(int $value)
    {
        $_SESSION[SessionEntryNames::EDIT_MODE_FEEDBACK_INDEX] = $value;
        PageManipulation::refreshPage();
    }

    public function onCancel()
    {
        $_SESSION[SessionEntryNames::EDIT_MODE_FEEDBACK_INDEX] = null;
        PageManipulation::refreshPage();
    }

    public function onApply($id)
    {
        $body = !empty($_POST['feedback']) ? filter_input(
            INPUT_POST,
            'feedback',
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        ) : '';
        if (!!$body) {
            $_SESSION[SessionEntryNames::EDIT_MODE_FEEDBACK_INDEX] = null;
            $this->feedbackModel->update($id, $body);
            PageManipulation::refreshPage();
        }
    }

    public function onDelete($index)
    {
        $this->feedbackModel->delete($index);
        PageManipulation::refreshPage();
    }

    public function showFeedbackForm()
    {
        $fieldsData = $this->feedbackModel->getFeedbackFormFields();
        if (isset($_SESSION[SessionEntryNames::UID]) && !empty($_SESSION[SessionEntryNames::UID])) {
            $fieldsData = $this->feedbackModel->getFeedbackFormFieldsForAuthorized();
        }
        $this->feedbackFormView->renderFeedbackForm($fieldsData);
    }

    public function submitFeedback()
    {
        $feedback = !empty($_POST['feedback']) ? filter_input(
            INPUT_POST,
            'feedback',
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        ) : '';
        $uid = null;
        if (isset($_SESSION[SessionEntryNames::UID]) && !empty($_SESSION[SessionEntryNames::UID])) {
            $name = !empty($_SESSION[SessionEntryNames::USER_NAME]) ? $_SESSION[SessionEntryNames::USER_NAME] : '';
            $email = !empty($_SESSION[SessionEntryNames::USER_EMAIL]) ? $_SESSION[SessionEntryNames::USER_EMAIL] : '';
            $uid = $_SESSION[SessionEntryNames::UID];
        } else {
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
        }
        if (!!$name && !!$email && !!$feedback) {
            $this->feedbackModel->add($name, $email, $feedback, $uid);
            PageManipulation::refreshPage();
        }
    }

    public function showFeedbacks($feedbacks = null)
    {
        $editModeFeedbackIndex = null;
        if (isset($_SESSION[SessionEntryNames::EDIT_MODE_FEEDBACK_INDEX])) {
            $editModeFeedbackIndex = $_SESSION[SessionEntryNames::EDIT_MODE_FEEDBACK_INDEX];
        }

        if ($feedbacks === null) {
            $feedbacks = $this->feedbackModel->getFeedbacks();
        }

        $this->view->render($feedbacks, $editModeFeedbackIndex);
    }
}
