<?php
$validateEmail =  ['FormValidation', 'validateEmail'];
$validatePassword = ['FormValidation', 'validatePassword'];

$fields = [
    [
        'wrapperClassName' => 'mb-3',
        'label' => 'Enter your email',
        'name' => 'email',
        'type' => 'email',
        'placeholder' => 'email@gmail.com',
        'value' => '',
        'errorHandler' => $validateEmail
    ],
    [
        'wrapperClassName' => 'mb-3',
        'label' => 'Enter your password',
        'name' => 'password',
        'type' => 'password',
        'placeholder' => 'Enter your password',
        'value' => '',
        'errorHandler' => $validatePassword
    ]
];

define('SIGN_IN_FORM_FIELDS', serialize($fields));