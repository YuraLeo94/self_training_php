<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_NAME', 'feedback_form_simple');

$db = new mysqli(DB_HOST, DB_USER, null, DB_NAME);

if ($db->connect_error) {
  die('Connection failed: ' . $db->connect_error);
}
