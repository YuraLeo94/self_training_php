<?php

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

define('FEEDBACK_FORM_FIELDS', serialize($fields));