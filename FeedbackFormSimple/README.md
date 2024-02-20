This project/task does not address any business problems. The main goal of this small task was to work with PHP and demonstrate the acquisition of skills in using this language. The project utilized the MVC development pattern.


The process is described below, assuming the user knows what XAMPP is and how to work with it and MySQL.

## Steps to Run a Project Locally
To Run project use XAMPP and run:
1. Apache
2. MySQL
Note: donwload XAMPP can by following link -> https://www.apachefriends.org/download.html

Create DB with name "feedback_form_simple".
This DB should have two tables:
- "feedbacks" with following property: id (PRIMARY Auto inc), name (VARCHAR 255), email (VARCHAR 255), date (DATETIME and default CURRENT_TIMESTEMP), uid (INT and dfault NULL), body (TEXT);
- "users" with following property: uid (PRIMARY Auto inc), name (VARCHAR 255), email (VARCHAR 255), password (VARCHAR 255);

Example project location in XAMPP -> C:\xampp\htdocs\self_training_php\FeedbackFormSimple

Run in browser XAMPP port and project path ->
example: http://localhost:8012/self_training_php/FeedbackFormSimple/

