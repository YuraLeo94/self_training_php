# Project/task goal
This project/task does not address any business problems. The main goal of this small task was to work with **PHP** and demonstrate the acquisition of skills in using this language. The project utilized the **MVC** development pattern.

## TODO
TODO was described in another file. Here is a link to it ->
https://github.com/YuraLeo94/self_training_php/blob/main/FeedbackFormSimple/todo.md


## Steps to Run a Project Locally
The process is described below, assuming the user knows what **XAMPP** is and how to work with it and **MySQL**.

To Run the project use XAMPP and run:
1. Apache
2. MySQL

Note: XAMPP can be downloaded using the following link -> https://www.apachefriends.org/download.html

Create DB with the name `feedback_form_simple`.
This DB should have two tables:
- `feedbacks` with the following properties: id (PRIMARY Auto inc), name (VARCHAR 255), email (VARCHAR 255), date (DATETIME and default CURRENT_TIMESTEMP), uid (INT and default NULL), body (TEXT);
- `users` with the following property: uid (PRIMARY Auto inc), name (VARCHAR 255), email (VARCHAR 255), password (VARCHAR 255);
Table `feedbacks` must be linked to table `users` using the following parameter `uid`.

Example project location in XAMPP -> C:\xampp\htdocs\self_training_php\FeedbackFormSimple

Run in browser XAMPP port and project path ->
example: http://localhost:8012/self_training_php/FeedbackFormSimple/


Below, image 1 demonstrates the structure of the `feedbacks` table. Image 2 illustrates the relationship for the `feedbacks` table. Image 3 displays the structure of the `users` table.

**Image 1: Structure of the `feedbacks` table**
<img width="932" alt="image" src="https://github.com/YuraLeo94/self_training_php/assets/71021726/0cf0c2e7-ce3f-4f35-bd5e-e659ebb4c45d">

**Image 2: Relation for the `feedbacks` table**
<img width="959" alt="image" src="https://github.com/YuraLeo94/self_training_php/assets/71021726/2ae2d194-b07a-4a0d-a9c0-512073931adb">

**Image 3 Structure of the `users` table**
<img width="943" alt="image" src="https://github.com/YuraLeo94/self_training_php/assets/71021726/360a23b3-7ba9-468c-8e6a-613c78053811">
  

