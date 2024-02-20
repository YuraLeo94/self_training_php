<?php
session_start();

$sessionTimeout = 30 * 60;
session_set_cookie_params($sessionTimeout);
require_once('utils/formValidation.php');
require_once('utils/SessionEntryNames.php');
require_once('utils/pageManipulation.php');
require_once('View/form.php');
require_once('View/headerView.php');
require_once('View/formField.php');
require_once('View/feedbackForm.php');
require_once('View/feedbackPage.php');
require_once('View/signInForm.php');
require_once('View/createAccountForm.php');
require_once('View/modalView.php');
require_once('Control/routerController.php');
require_once('Control/feedbackPageController.php');
require_once('Control/userController.php');
require_once('Control/modalController.php');
require_once('Model/FeedbackModel.php');
require_once('Model/userModel.php');
require_once('Model/Config/feedbackForm.config.php');
require_once('Model/Config/signInForm.config.php');
require_once('Model/Config/createAccountForm.config.php');
require_once('utils/const/index.php');
require_once('utils/action/index.php');
require_once('config/database.php');

include __DIR__ . '/../config/env.php';
$baseUrl = getenv('BASE_URL');

$buttons = [
    ['name' => 'Home', 'href' => RoutingPaths::HOME],
    ['name' => 'Feedback', 'href' => RoutingPaths::FEEDBACK]
];

$feedbackPageController = new FeedbackPageController(new FeedbackPage(), new FeedbackModel(), new FeedbackForm());
$userController = new UserController(new UserModel(), new CreateAccountForm(), new SignInForm());
(new ModalController())->showModal();
(new HeaderView())->renderHeader("Simple Feedback form", $buttons);
(new RouterController())->handleRequest($baseUrl, $feedbackPageController, $userController);
(new HandleActions())->handleActions($feedbackPageController, $userController);

