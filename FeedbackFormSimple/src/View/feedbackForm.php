<?php

class FeedbackForm extends Form
{

    public function renderFeedbackForm($fields, $name = 'submit', $buttonName = 'Submit', $actionValue = 'submit')
    {
        echo '<h2>Feedback</h2>';
        echo '<p class="lead text-center">Leave feedback</p>';
        $this->render($fields, $name, $buttonName, $actionValue);
    }
}
