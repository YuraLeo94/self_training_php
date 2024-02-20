<?php
class CreateAccountForm extends Form
{

    public function renderCreateAccountForm($fields, $error, $name = 'submit')
    {

        echo "<div class='container d-flex flex-column align-items-center'>";
        echo '<h2>Create Account</h2>';
        $this->render($fields, $name, 'Apply', 'create_acc');
        if ($error) echo "<div>".$error."</div>";
        echo '</div>';
    }
}