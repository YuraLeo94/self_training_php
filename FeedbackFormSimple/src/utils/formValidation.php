<?php

class FormValidation 
{
    public static function validateIsFilled($fieldName = 'name', $errorMessage = '%s is required') {
        if (isset($_POST['submit'])) {
            if (empty($_POST[$fieldName])) {
               return sprintf($errorMessage, ucfirst($fieldName));
            }
        }
        return '';
    }

    public static function validateEmail($fieldName = 'email', $errorMessages = ['empty' => 'Email is required', 'invalid' => 'Invalid email format']) {
        $error = '';
        if (isset($_POST['submit'])) {
            $value = $_POST[$fieldName];
            if (empty($value)) {
                $error = $errorMessages['empty'];
            }
            elseif (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                $error = $errorMessages['invalid'];
            }
        }
        return $error;
    }

    public static function validatePassword($fieldName = 'password', $errorMessages = ['empty' => 'Password is required', 'length' => 'Password must be at least 6 characters long']) {
        $error = '';
        if (isset($_POST['submit'])) {
            $value = $_POST[$fieldName];
            if (empty($value)) {
                $error = $errorMessages['empty'];
            }
            elseif (strlen($value) < 1) {
                $error = $errorMessages['length'];
            }
        }
        return $error;
    }

    public static function validateConfirmPassword($fieldName = 'confirm_password', $errorMessages = ['empty' => 'Please confirm your password', 'confirm' => 'Passwords do not match']) {
        $error = '';
        if (isset($_POST['submit'])) {
            $password = $_POST['password'];
            $value = $_POST[$fieldName];
            if (empty($value)) {
                $error = $errorMessages['empty'];
            } elseif ($password !== $value) {
                $error = $errorMessages['confirm'];
            }
        }
        return $error;
    }
}