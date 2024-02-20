<?php
require_once('feedbackItemView.php');

class FeedbackPage
{
    public function render($feedbacks, $editModeFeedbackIndex)
    {
        echo "<div class='container d-flex flex-column align-items-center'>";
        echo "<h1>Feedbacks</h1>";
        if (empty($feedbacks)) {
            echo " <p class='lead mt-3'>There is no feedback</p>";
        }
        (new FeedbackItemView())->render($feedbacks, $editModeFeedbackIndex);
        echo "</div>";
    }
}
