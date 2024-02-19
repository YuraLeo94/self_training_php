<?php
$validateName = ['FormValidation', 'validateIsFilled'];
$validateEmail =  ['FormValidation', 'validateEmail'];
$validateFeedback =  ['FormValidation', 'validateIsFilled'];

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
        'label' => 'Feedback',
        'name' => 'feedback',
        'type' => '',
        'placeholder' => 'Enter your feedback',
        'value' => '',
        'errorHandler' => $validateFeedback
    ]
];

$fieldsForAuthorizeUser = [
    [
        'wrapperClassName' => 'mb-3',
        'label' => 'Feedback',
        'name' => 'feedback',
        'type' => '',
        'placeholder' => 'Enter your feedback',
        'value' => '',
        'errorHandler' => $validateFeedback
    ]
];

define('FEEDBACK_FORM_FIELDS', serialize($fields));
define('FEEDBACK_FORM_FIELDS_AUTHORIZED', serialize($fieldsForAuthorizeUser));