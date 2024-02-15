<?php

class FeedbackItemView
{

    public function render($feedbacks, $editModeFeedbackIndex, $onEditClick)
    {
        foreach ($feedbacks as $index => $feedback) {
            echo '<div class="card my-3 w-75">';
                echo '<div class="card-body text-body">';
                    echo '<div class="my-2 d-flex justify-content-between text-dark mt-2">';
                        echo '<div>' . 'By ' . $feedback['name'] . '</div>';
                        echo '<div>' . '<span class="fw-bold">Date:</span> ' . $feedback['date'] . '</div>';
                    echo '</div>';
                    echo $feedback['body'];
                    $this->renderBasicButtonsPanel($index);
                   $index === $editModeFeedbackIndex && $this->renderEditModeButtons();
                echo '</div>';
            echo '</div>';
        }
    }

    public function renderBasicButtonsPanel($index) {
        echo '<div class="mt-3 d-flex flex-wrap justify-content-end align-items-center gap-2">';
        echo '<button class="btn btn-outline-secondary">Delete</button>';
        // echo '<button type="submit" class="btn btn-outline-secondary" onclick="' . $onEditClick($index).'">Edit</button>';
        echo " <a class='btn btn-outline-secondary' href='?action=edit&index=$index'>Edit</a> ";
        echo '</div>';
    }    

    public function renderEditModeButtons() {
        echo '<div class="mt-3 d-flex flex-wrap justify-content-end align-items-center gap-2">';
            echo '<button class="btn btn-outline-secondary">Cancel</button>';
            echo '<button class="btn btn-primary"> Accept </button>';
        echo '</div>';
    }

}
