<?php

class FeedbackItem
{

    public function render($feedback)
    {
        echo '<div class="card my-3 w-75">';
            echo '<div class="card-body text-body">';
                echo '<div class="my-2 d-flex justify-content-between text-dark mt-2">';
                    echo '<div>' . 'By ' . $feedback['name'] . '</div>';
                    echo '<div>' . '<span class="fw-bold">Date:</span> ' . $feedback['date'] . '</div>';
                echo '</div>';
                echo $feedback['body'];
                $this->renderBasicButtonsPanel();
                $this->renderEditModeButtons();
            echo '</div>';
        echo '</div>';
    }

    public function renderBasicButtonsPanel() {
        echo '<div class="mt-3 d-flex flex-wrap justify-content-end align-items-center gap-2">';
            echo '<button class="btn btn-outline-secondary"> Delete </button>';
            echo '<button class="btn btn-outline-secondary">Edit</button>';
        echo '</div>';
    }

    public function renderEditModeButtons() {
        echo '<div class="mt-3 d-flex flex-wrap justify-content-end align-items-center gap-2">';
            echo '<button class="btn btn-outline-secondary">Cancel</button>';
            echo '<button class="btn btn-primary"> Accept </button>';
        echo '</div>';
    }

}
