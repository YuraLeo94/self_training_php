<?php

class UserModel
{

    private $createAccountFormFields;
    private $signInFormFields;

    public function __construct()
    {
        $this->createAccountFormFields = unserialize(CREATE_ACCOUNT_FORM_FIELDS);
        $this->signInFormFields = unserialize(SIGN_IN_FORM_FIELDS);
    }

    public function getCreateAccountFormFields()
    {
        return $this->createAccountFormFields;
    }

    public function getSignInFormFields()
    {
        return $this->signInFormFields;
    }

    public function login($email, $password)
    {
        global $db;

        $email = mysqli_real_escape_string($db, $email);
        $password = mysqli_real_escape_string($db, $password);

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $db->query($sql);
        
        $this->cleanLoginSessionData();
        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['uid'] = $user['uid'];
                return true;
            } else {
                $_SESSION['password_invalid'] = "Incorrect password";
                return false;
            }
        } else {
            $_SESSION['email_invalid'] = "User with the provided email not found";
            return false;
        }
    }

    public function logout() {
        $this->cleanLoginSessionData();
    }

    public function cleanLoginSessionData()
    {
        $_SESSION['password_invalid'] = null;
        $_SESSION['email_invalid'] = null;
        $_SESSION['user_name'] = null;
        $_SESSION['user_email'] = null;
        $_SESSION['uid'] = null;
    }

    public function createAccount($name, $email, $password)
    {
        global $db;

        $name = mysqli_real_escape_string($db, $name);
        $email = mysqli_real_escape_string($db, $email);

        $existingUserCheck = "SELECT * FROM users WHERE email = '$email'";
        $existingUserResult = $db->query($existingUserCheck);

        if ($existingUserResult && $existingUserResult->num_rows > 0) {
            // set to ssesion and display error
            // return false;
            return 'email_exists';
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";
        $db->query($sql);

        if ($db->affected_rows > 0) {
            // Account creation successful
            // todo display modal ok
            // redirect to the sign in form
            // return true;
            return '';
        } else {
            // Account creation failed
            // todo display modal error
            // return false;
            return 'creation_failed';
        }
    }
}
