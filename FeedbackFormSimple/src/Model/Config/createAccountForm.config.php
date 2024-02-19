<?php
$validateName = ['FormValidation', 'validateIsFilled'];
$validateEmail =  ['FormValidation', 'validateEmail'];
$validatePassword = ['FormValidation', 'validatePassword'];
$validateConfirmPassword = ['FormValidation', 'validateConfirmPassword'];

$fields = [
    [
        'wrapperClassName' => 'mb-3',
        'label' => 'Name',
        'name' => 'name',
        'type' => 'text',
        'placeholder' => 'Enter your name',
        'value' => '',
        'errorHandler' => $validateName
    ],
    [
        'wrapperClassName' => 'mb-3',
        'label' => 'Email',
        'name' => 'email',
        'type' => 'email',
        'placeholder' => 'Enter your email',
        'value' => '',
        'errorHandler' => $validateEmail
    ],
    [
        'wrapperClassName' => 'mb-3',
        'label' => 'Password',
        'name' => 'password',
        'type' => 'password',
        'placeholder' => 'Enter your password',
        'value' => '',
        'errorHandler' => $validatePassword
    ],
    [
        'wrapperClassName' => 'mb-3',
        'label' => 'Confirm your password',
        'name' => 'confirm_password',
        'type' => 'password',
        'placeholder' => 'Confirm your password',
        'value' => '',
        'errorHandler' => $validateConfirmPassword
    ]
];

define('CREATE_ACCOUNT_FORM_FIELDS', serialize($fields));