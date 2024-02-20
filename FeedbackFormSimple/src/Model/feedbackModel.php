<?php

class FeedbackModel
{
    private $feedbackFormFields;
    private $feedbackFormFieldsForAuthorized;

    public function __construct()
    {
        $this->feedbackFormFields = unserialize(FEEDBACK_FORM_FIELDS);
        $this->feedbackFormFieldsForAuthorized = unserialize(FEEDBACK_FORM_FIELDS_AUTHORIZED);
    }

    public function getFeedbackFormFields()
    {
        return $this->feedbackFormFields;
    }

    public function getFeedbackFormFieldsForAuthorized()
    {
        return $this->feedbackFormFieldsForAuthorized;
    }

    public function getFeedbacks()
    {
        global $db;
        $result = mysqli_query($db, 'SELECT * FROM feedbacks');
        $feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $feedback;
    }

    public function update($id, $text) {
        global $db;
        $sql = "UPDATE feedbacks SET body = '$text' WHERE ID = $id";
        $db->query($sql);
    }

    public function delete($id) {
        global $db;
        $sql = "DELETE FROM feedbacks WHERE ID = $id";
        $db->query($sql);
    }

    public function add($name, $email, $body, $uid) {
        global $db;
        $sql = '';
        if ($uid) {
            $sql = "INSERT INTO feedbacks (name, email, body, uid) VALUES ('$name', '$email', '$body', '$uid')";
        }
        else {
            $sql = "INSERT INTO feedbacks (name, email, body) VALUES ('$name', '$email', '$body')";
        }
        $db->query($sql);
        if ($db->affected_rows > 0) {
            $_SESSION[SessionEntryNames::MODAL_MESSAGE] = 'Feedback added successfully';
            $_SESSION[SessionEntryNames::SHOW_MODAL] = true;
            PageManipulation::refreshPage();
        } else {
            $_SESSION[SessionEntryNames::MODAL_MESSAGE] = 'Error - Feedback not added.';
            $_SESSION[SessionEntryNames::SHOW_MODAL] = true;
            PageManipulation::refreshPage();
        }
    }
}
