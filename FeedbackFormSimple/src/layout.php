<?php
require_once('View/headerView.php');
require_once('View/formField.php');
require_once('View/feedbackForm.php');

$headerView = new HeaderView();

$buttons = [
    ['name' => 'Home', 'href' => 'index.php'],
    ['name' => 'Feedback', 'href' => 'feedback.php'],
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

$headerView->renderHeader("Simple Feedback form", $buttons);
(new FeedbackForm())->render($fields);
?>