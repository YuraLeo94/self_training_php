# Implement Desktop View Application.

Develop an SAP application with a navigation menu and a body where forms or feedback
information should be displayed.

## Functional Requirements:

1. Create User Account:
   The application should provide an opportunity to create a new user account by
   entering name, email, and password.

2. Authorize User:
   The application should have the ability to authorize a user by entering their
   email and password.

3. Adding Feedback for Unauthorized User:
   The application should allow adding feedback by entering name, email, and
   feedback for unauthorized users.

4. Adding Feedback for Authorized User:
   The application should allow authorized users to add feedback by entering feedback.

5. Edit and Delete Existing Feedback:
   The application should allow authorized users to edit and delete existing feedback.

6. Navigation Menu:
   Users should be able to click buttons in the navigation menu to move between different
   sections or pages of the application.

7. After clicking on the "Create Account" link on the sign-in page, there should be a
   redirection to the create account form.

## Non-functional Requirements:

1. All form fields in the application should undergo validation. Name and feedback fields
   should be checked for completion, email should be checked for correct format, and the password
   should be filled and have a minimum length of 6. Confirm password should be filled and match the password.

2. Feedback List Page:
   If there are no feedbacks, display the message "There is no feedback."

3. Display Delete and Edit Buttons Only for Authorized Users:
   Display delete and edit buttons only for authorized users whose UID matches the UID in the feedback.

4. For an authorized user to add new feedback, only the feedback field should be displayed.

5. Navigation Menu:
   The navigation menu should have a non-clickable logo on the left side, and on the right,
   buttons for "Home," "Feedback," "Sign-in," and "Log out."

6. When feedback is added successfully, display a modal with the message "Feedback added
   successfully." If not successful, display a modal with the following message: "Error - Feedback not added."
   All modals should have only an "Ok" button.

7. Display a modal with the message "Something went wrong" when the delete action is not successful,
   and the change and apply actions too.

8. After a successful sign-in action, the user should be redirected to the home page. If a non-existent
   email was entered, display an error message below the form. If an incorrect password was entered, display
   an error message below the form.

9. After a successful create account action, the user should be redirected to the sign-in page. If an
   already existing email was entered, display an error message below the form. If the account creation failed,
   display an error message below the form.

10. Retrieve all user and feedback data from the database.