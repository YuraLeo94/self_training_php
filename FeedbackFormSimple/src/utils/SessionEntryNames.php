<?php

class SessionEntryNames
{
    const PASSWORD_INVALID = 'password_invalid';
    const EMAIL_INVALID = 'email_invalid';
    const USER_NAME = 'user_name';
    const USER_EMAIL = 'user_email';
    const UID = 'uid';
    const EMAIL_EXISTS = 'email_exists';
    const CREATION_FAILED = 'creation_failed';
    const EDIT_MODE_FEEDBACK_INDEX = 'edit_mode_feedback_index';
    
    public static function clean($names) {
        foreach($names as $name) {
            $_SESSION[$name] = null;
        }
    }
}