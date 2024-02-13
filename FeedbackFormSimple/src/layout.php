<?php
require_once('View/headerView.php');
require_once('View/formField.php');
require_once('View/feedbackForm.php');
require_once('View/feedbackPage.php');
require_once('Control/routerController.php');
require_once('utils/const/index.php');

include __DIR__ . '/../config/env.php';
$baseUrl = getenv('BASE_URL');

$buttons = [
    ['name' => 'Home', 'href' => RoutingPaths::HOME],
    ['name' => 'Feedback', 'href' => RoutingPaths::FEEDBACK]
];

$fields = [
    [
        'wrapperClassName' => 'mb-3', 
        'label' => 'Name', 
        'name' => 'name', 
        'type' => 'text', 
        'placeholder' => 'Enter your name', 
        'value' => ''
    ],
    [
        'wrapperClassName' => 'mb-3', 
        'label' => 'Email', 
        'name' => 'email', 
        'type' => 'email', 
        'placeholder' => 'Enter your email', 
        'value' => '',
    ],
    [
        'wrapperClassName' => 'mb-3', 
        'label' => 'Feedback', 
        'name' => 'feedback', 
        'type' => '', 
        'placeholder' => 'Enter your feedback', 
        'value' => '',
    ]
];

(new HeaderView())->renderHeader("Simple Feedback form", $buttons);
(new RouterController())->handleRequest($baseUrl);
?>