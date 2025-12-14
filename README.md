&nbsp;📚 Student Attendance Management System



A web-based application built with PHP and MySQL to manage student records and track daily class attendance. This project was developed as part of a mini-project assignment.



&nbsp;👤 Developer Information

Name: SHEMA Chris Owen

Reg Number: 24RP13013

Department: Information Technology

Level: 6, Year 2







######  **Live Demo**

http://studattendance.atwebpages.com







#####  **Features**



This system meets all the CRUD (Create, Read, Update, Delete) requirements:



**Authentication:** Secure Login \& Logout with password hashing (password\\\_verify).

**Dashboard:** View total students and quick actions.

**Add Students:** Register new students with Name, Reg Number, and Course.

**Mark Attendance:** Select a student from a dropdown and mark them "Present" or "Absent".

**View History:** View a complete log of marked attendances with color-coded status.

**Edit Students:** Update student details (Name, Course, etc.).

**Delete Students:** Remove a student and their associated records from the database.

**Security:** Uses PDO Prepared Statements to prevent SQL Injection.







###### **Tech Stack**



**Frontend:** HTML5, CSS3 (Custom `style.css`)

**Backend:** PHP (PDO)

**Database:** MySQL / MariaDB







###### **How to Run Locally**



1\.  Install XAMPP (or WAMP/MAMP).

2\.  Clone/Download this project into your htdocs folder:

    

    C:\\xampp\\htdocs\\Student\_Attendance\_System

    

3\.  Import Database:

     Open phpMyAdmin (http://localhost/phpmyadmin).

     Create a database named attendance\_db.

     Import the attendance\\\_db.sql` file provided in this repo.

4\.  Configure Connection:

     Open database.php.

     Set $host = "localhost", $username = "root", $password = "".

5\.  Run:

     Open browser and go to http://localhost/attendance\\\_system.

     Login: admin@test.com / password.







\## 🌐 How to Host Online (AwardSpace)



1\.  Upload all files to the htdocs folder using the File Manager.

2\.  Create a MySQL Database in the hosting control panel.

3\.  Import attendance\\\_db.sql via phpMyAdmin.

4\.  Update database.php with the hosting provider's credentials:

    

php

    $host = "xxxxxxxxxxxx";

    $dbname = "xxxxxxxxxx";

    $username = "xxxxxxxxx";         

    $password = "YourPassword";         

    







