
HOW TO RUN THIS PROGRAM
1. Put the project in the root htdocs folder in Xampp
2. Start Apache and MySQL in Xampp
3. Export hospital_db.sql into Phpmyadmin
4. Rename config-names.txt into config-names.php
5. Change Configurations in config-names.php


<******************************************************************************************************>


HOW TO DEVELOP THIS PROGRAM
1. index.php in the root folder is the login page
2. home/index.php folder is the home page
3. home/components is where the reusable system components in pages are located and can be edited
4. Configure names in config-names.php
5. With the help of config-helper.php, you can require the file anywhere to apply the names applied in config-names.php
6. In /home/css/global.css you can change general colors declared in root{}
7. Log in with doritos with the password 123 to try and explore the system
8. Start Developing at home/sample/sampletemp.php, read the tutorials there



<**********************************  Update Log  **********************************>


Third Commit:  
Root Location Added in config-names.php
Fixed sidebar location Buttons

Added util/hasher.php for hashing passwords, use this only ONCE, ISSUE: This will also hash the other hashed passwords, leading to bugs
Cleaned code of manage-account.php. ready for viewing
Cleaned code of manage-course.php, still in development

Added Sample Template for easy Development: home/sample/samplepage.php
Added Routing variables for easy accessing of files in config-names.txt
Added some helpful comments

<**********************************  Old Log  **********************************>


Built in flexible query functions for easy CRUD functions throughout the whole System

First Commit: 2/27/2025
Added Dynamic User Roles in Sidebar Buttons

Second Commit: 2/27/2025
Added Database(forgot)


