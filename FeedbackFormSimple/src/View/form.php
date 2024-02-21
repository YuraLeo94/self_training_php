<?php

class Form
{
    public function render($fields, $name, $buttonName, $actionValue) {
       echo "<div class='container d-flex flex-column align-items-center'>"; 
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
           )->render(!$field['type'], call_user_func($field['errorHandler'], $field['name']));
       }
       echo "<div class=\"mb-3\">";
       echo "<input type='hidden' name='action' value=".$actionValue.">";
       echo "<input type=\"submit\" name=\"" . $name . "\" value=" . $buttonName . " class=\"btn text-capitalize btn-dark w-100\">";
       echo "</div>";
       echo '</form>';
       echo "</div>";
    }
}