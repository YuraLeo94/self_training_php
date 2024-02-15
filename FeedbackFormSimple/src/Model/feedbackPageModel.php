<?php

class feedbackPageModel
{
    private $editModeFeedbackIndex = -1;

    public function setEditModeFeedbackIndex(int $value)
    {
        echo 'Value' . $value;
        $this->editModeFeedbackIndex = $value;
    }

    public function getEditModeFeedbackIndex(): int
    {
        return $this->editModeFeedbackIndex;
    }
}
