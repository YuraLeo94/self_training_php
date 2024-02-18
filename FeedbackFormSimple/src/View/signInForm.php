<?php

class SignInForm extends Form
{

    public function renderSigInForm($fields, $error, $name = 'submit', )
    {

        echo '<h2>Sign In</h2>';
        $this->render($fields, $name, 'Sign In', 'sign_in');
        echo '<a href="' . RoutingPaths::CREATE_ACCOUNT . '">Create account</a>';
        if ($error) echo "<div>".$error."</div>";
    }
}
