<?php

class FeedbackForm
{

    public function render($fields, $name = 'submit', $buttonName = 'Submit')
    {
        echo '<h2>Feedback</h2>';
        echo '<p class="lead text-center">Leave feedback</p>';
        echo '<form method="POST" action="' . htmlspecialchars(parse_url($_SERVER['REQUEST_URI'])['path']) . '" class="mt-4 w-75">';
        foreach ($fields as $field) {
            (
                new FormField(
                    $field['wrapperClassName'],
                    $field['label'],
                    $field['name'],
                    $field['type'],
                    $field['placeholder'],
                    $field['value']
                )
            )->render(!$field['type']);
        }
        echo "<div class=\"mb-3\">";
        echo "<input type='hidden' name='action' value='submit'>";
        echo "<input type=\"submit\" name=\"" . $name . "\" value=" . $buttonName . " class=\"btn text-capitalize btn-dark w-100\">";
        echo "</div>";
        echo '</form>';
    }
}
