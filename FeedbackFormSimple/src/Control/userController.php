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
        if (!!$email && !!$password) {
            $res = $this->model->login($email, $password);
            PageManipulation::redirectToPage(RoutingPaths::SIGN_IN, RoutingPaths::HOME, $res);
        }
    }

    public function onLogout() {
        $this->model->logout();
        PageManipulation::refreshPage();
    }

    public function onCreatAccount()
    {
        $name = !empty($_POST['name']) ? filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS) : '';
        $email = !empty($_POST['email']) ? filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS) : '';
        $password =  !empty($_POST['password']) ? filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS) : '';
        $confirmPass =  !empty($_POST['confirm_password']) ? filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_SPECIAL_CHARS) : '';
        if (!!$name && !!$email && !!$password && !!$confirmPass) {
            $res = $this->model->createAccount($name, $email, $password);
            PageManipulation::redirectToPage(RoutingPaths::CREATE_ACCOUNT, RoutingPaths::SIGN_IN, $res);
        }
    }

    public function loginErrorHandler()
    {
        $error = null;
        if (isset($_SESSION[SessionEntryNames::PASSWORD_INVALID])) {
            $error = $_SESSION[SessionEntryNames::PASSWORD_INVALID];
        }
        if (isset($_SESSION[SessionEntryNames::EMAIL_INVALID])) {
            $error = $_SESSION[SessionEntryNames::EMAIL_INVALID];
        }
        return $error;
    }

    public function creatAccErrorHandler()
    {
        $error = null;
        if (isset($_SESSION[SessionEntryNames::EMAIL_EXISTS])) {
            $error = $_SESSION[SessionEntryNames::EMAIL_EXISTS];
        }
        if (isset($_SESSION[SessionEntryNames::CREATION_FAILED])) {
            $error = $_SESSION[SessionEntryNames::CREATION_FAILED];
        }
        return $error;
    }
}
