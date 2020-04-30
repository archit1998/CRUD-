Hello Everyone ,
 
As discussed , PFB the Project details :
 
PHP Project  
============
 
Project: Employee CRUD operation page with Login, Forgot password Email, Pagination and search 
Database:   Mysql / SQl Server 
Framework: Codeigniter (PHP) / Loopback (Angularjs) (choose any one) 
Purpose: 
•	Prepare a framework.
•	Choose a programming language (Angularjs / PHP).
•	Learn Session
•	Learn how to send emails using Gmail or other SMTP configurations.
•	Learn Pagination logic.
•	Learn Form Validation.
•	Learn JQuery form validations.
•	Learn Datatable JQuery form display library with inbuilt search.
 

Follow the instructions and guidance below
-----------------------------------------------------------------
•	Create two database tables (Mysql / SQl Server).

Table : Users
user_id int autoincrement primary key
user_email varchar(100)
user_pass varchar(20)
user_first_name varchar(50)
user_middle_name varchar(50)
user_last_name varchar(50)
user_status varchar(15)  // Active / Inactive

Table : Employee

emp_id int autoincrement primary key
emp_first_name varchar (50)
emp_middle_name varchar (50)
emp_last_name varchar (50)
emp_qualification varchar (50)
emp_status  varchar(15)  // Active / Inactive

1. Create a Login page. Users can login with the users table , email and pass. Use session to get the data of the user.

2. After login show links of Employee List page having Add New / edit / delete

3. pagination is also required.

4. You can use a datatable (jquery library).

5. Logout button is required
 
6. On the login page show forgot password link and send the email to the email id if that exists in users table. Otherwise show errors that email doesn't exist in the database.

7. Create a search box in the listing page and show the result when something is searched in the textbox.


Validation checks
==================

1. Without a login Employee list can't be accessed.

2. After Login. The Login Page can't be visible.

3. After Logout show a thanks page.

4. Form validation is also important.
