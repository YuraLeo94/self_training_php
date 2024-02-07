<?php

class FeedbackItem
{

    public function render($feedback)
    {
        echo '<div class="card my-3 w-75">';
        echo '<div class="card-body text-center">';
        echo $feedback['body'];
        echo '<div class="text-secondary mt-2">';
        echo 'By' . $feedback['name'];
        echo $feedback['date'];
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}
