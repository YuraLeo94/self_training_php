<?php

class UserController
{

    private $model;
    private $createAccountFormView;
    private $signInFormView;

    public function __construct($model, $createAccountFormView, $signInFormView)
    {
        $this->model = $model;
        $this->createAccountFormView = $createAccountFormView;
        $this->signInFormView = $signInFormView;
    }

    public function showCreateAccountFormView()
    {
        $error = $this->creatAccErrorHandler();
        $this->createAccountFormView->renderCreateAccountForm($this->model->getCreateAccountFormFields(), $error);
    }

    public function showSignInFormView()
    {
        $error = $this->loginErrorHandler();
        $this->signInFormView->renderSigInForm($this->model->getSignInFormFields(), $error);
    }

    public function onLogin()
    {
        $email = !empty($_POST['email']) ? filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS) : '';
        $password =  !empty($_POST['password']) ? filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS) : '';
        $res = $this->model->login($email, $password);
        
        if ($res) {
            $path = parse_url($_SERVER['REQUEST_URI'])['path'];
            $tmpPath = explode('signin', $path);
            print_r($tmpPath);
            header("Location: " . $tmpPath[0] . RoutingPaths::HOME);
            exit();
            echo ' Home !';
        }
    }

    public function onLogout() {
        $this->model->logout();
    }

    public function onCreatAccount()
    {
        $name = !empty($_POST['name']) ? filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS) : '';
        $email = !empty($_POST['email']) ? filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS) : '';
        $password =  !empty($_POST['password']) ? filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS) : '';
        $res = $this->model->createAccount($name, $email, $password);
        // move it to model
        if ($res === 'email_exists') $_SESSION['email_exists'] = "User with the provided email already exists";
        if ($res === 'creation_failed') $_SESSION['creation_failed'] = "Account creation failed";
    }

    public function loginErrorHandler()
    {
        $error = null;
        if (isset($_SESSION['password_invalid'])) {
            $error = $_SESSION['password_invalid'];
        }
        if (isset($_SESSION['email_invalid'])) {
            $error = $_SESSION['email_invalid'];
        }
        return $error;
    }

    public function creatAccErrorHandler()
    {
        $error = null;
        if (isset($_SESSION['email_exists'])) {
            $error = $_SESSION['email_exists'];
        }
        if (isset($_SESSION['creation_failed'])) {
            $error = $_SESSION['creation_failed'];
        }
        return $error;
    }
}
