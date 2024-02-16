<?php

class FeedbackItemView
{

    public function render($feedbacks, $editModeFeedbackIndex)
    {
        foreach ($feedbacks as $index => $feedback) {
            echo "<form method='POST' action=".htmlspecialchars(parse_url($_SERVER['REQUEST_URI'])['path']).">";
                echo '<div class="card my-3 w-75">';
                    echo '<div class="card-body text-body">';
                        echo '<div class="my-2 d-flex justify-content-between text-dark mt-2">';
                            echo '<div>' . 'By ' . $feedback['name'] . '</div>';
                            echo '<div>' . '<span class="fw-bold">Date:</span> ' . $feedback['date'] . '</div>';
                        echo '</div>';
                         
                        if ($index !== $editModeFeedbackIndex ) {
                            echo $feedback['body'];
                            $this->renderBasicButtonsPanel($index, $editModeFeedbackIndex !== null);
                        }
                        else {
                            (
                                new FormField(
                                    'mb-3',
                                    'Edit Feedback',
                                    'feedback',
                                    '',
                                    'Enter your feedback',
                                    $feedback['body']
                                )
                            )->render(true);
                            $this->renderEditModeButtons();
                        }
                    echo '</div>';
                echo '</div>';
            echo '</form';
        }
    }

    public function renderBasicButtonsPanel($index, $isEditModeActive) {
        echo '<div class="mt-3 d-flex flex-wrap justify-content-end align-items-center gap-2">';
        echo "<a class='btn btn-outline-secondary' href='?action=delete&index=$index'>Delete</a>";
        echo " <a class='btn btn-outline-secondary".($isEditModeActive ? ' disabled' : '')."' href='?action=edit&index=$index'>Edit</a>";
        echo '</div>';
    }    

    public function renderEditModeButtons() {
        echo '<div class="mt-3 d-flex flex-wrap justify-content-end align-items-center gap-2">';
            echo "<a class='btn btn-outline-secondary' href='?action=cancel'>Cancel</a>";
            echo '<input type="hidden" name="action" value="apply">';
            echo "<button class='btn btn-primary' type='submit'> Apply </button>";
        echo '</div>';
    }

}
