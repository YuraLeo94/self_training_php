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
                $_SESSION[SessionEntryNames::USER_NAME] = $user['name'];
                $_SESSION[SessionEntryNames::USER_EMAIL] = $user['email'];
                $_SESSION[SessionEntryNames::UID] = $user['uid'];
                return true;
            }
            $_SESSION[SessionEntryNames::PASSWORD_INVALID] = "Incorrect password";
            return false;
        }
        $_SESSION[SessionEntryNames::EMAIL_INVALID] = "User with the provided email not found";
        return false;
    }

    public function logout()
    {
        $this->cleanLoginSessionData();
    }

    public function cleanLoginSessionData()
    {
        SessionEntryNames::clean([
            SessionEntryNames::PASSWORD_INVALID,
            SessionEntryNames::EMAIL_INVALID,
            SessionEntryNames::USER_NAME,
            SessionEntryNames::USER_EMAIL,
            SessionEntryNames::UID
        ]);
    }

    public function createAccount($name, $email, $password)
    {
        global $db;

        $name = mysqli_real_escape_string($db, $name);
        $email = mysqli_real_escape_string($db, $email);

        $existingUserCheck = "SELECT * FROM users WHERE email = '$email'";
        $existingUserResult = $db->query($existingUserCheck);
        SessionEntryNames::clean([
            SessionEntryNames::EMAIL_EXISTS,
            SessionEntryNames::CREATION_FAILED
        ]);
        if ($existingUserResult && $existingUserResult->num_rows > 0) {
            $_SESSION[SessionEntryNames::EMAIL_EXISTS] = "User with the provided email already exists";
            return false;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";
        $db->query($sql);

        if ($db->affected_rows > 0) {
            // Account creation successful
            // todo display modal ok
            return true;
        }
        $_SESSION[SessionEntryNames::CREATION_FAILED] = "Account creation failed";
        return false;
    }
}
