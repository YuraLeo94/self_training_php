<?php

class FeedbackModel
{

    public function getFeedbacks()
    {
        global $db;
        $result = mysqli_query($db, 'SELECT * FROM feedbacks');
        $feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);
        print_r($feedback);
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

    public function add($name, $email, $body) {
        global $db;
        $sql = "INSERT INTO feedbacks (name, email, body) VALUES ('$name', '$email', '$body')";
        $db->query($sql);
        if ($db->affected_rows > 0) {
            // todo display modal ok
        } else {
            // todo display modal error
        }
    }
}
