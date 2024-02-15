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

    public function onEdit(int $value) {
        $this->model->setEditModeFeedbackIndex($value);
        echo '2' . $this->model->getEditModeFeedbackIndex();
        // $this->updateView();
    }

    public function updateView($feedbacks = null)
    {
        if ($feedbacks === null) {
            $feedbacks = $this->feedbackModel->getFeedbacks();
        }
        echo '1';
        $this->view->render($feedbacks, [$this, 'onEdit'], [$this->model, 'getEditModeFeedbackIndex']);
    }
}
