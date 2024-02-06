<?php
require_once ('View/headerView.php');

$headerView = new HeaderView();

$buttons = [
    ['name' => 'Home', 'href' => 'index.php'],
    ['name' => 'Feedback', 'href' => 'feedback.php'],
];

$headerView->renderHeader("Simple Feedback form", $buttons);
?>