
************************************** HOW TO RUN THIS PROGRAM *************************************************************

1. Put the project in the root htdocs folder in Xampp, do not change the name folder, if you did, rename the $root in config-names.php to the same name
2. Start Apache and MySQL in Xampp
3. Export hospital_db.sql into Phpmyadmin
4. Rename config-names.txt into config-names.php
5. Change Configurations in config-names.php to run this system
6. I always update config-names.txt, so update your config-names.php every new update


************************************** HOW TO DEVELOP THIS PROGRAM *************************************************************

1. index.php in the root folder is the login page
2. home/index.php folder is the home page
3. home/components is where the reusable system components in pages are located and can be edited
4. Configure names in config-names.php
5. With the help of config-helper.php, you can require the file anywhere to apply the names applied in config-names.php
6. In /home/css/global.css you can change general colors declared in root{}
7. Log in with doritos with the password 123 to try and explore the system
8. Start Developing at home/sample/sampletemp.php, read the tutorials there



************************************** UPDATE LOG *************************************************************

Adding new Login Page, now functional(bugs might appear, pls report)
Added Logo in Login Page and icon in every page(home/components/header.inc.php)

Removed unneeded files: home/components/nav-bar-old.inc.php, home/courses, home/css/bubble.css, home/css/forms.css, indexy.php(old login)
Removed unneeded images
Also removed: package.json, package-lock.json
Dropped all Tables in Database except for: user_tbl

Added Styling to Registration Page, functionality still Experimental(pls report for bugs)
Added function sanitizeInput() in database/crud.php, which is used in register-account.php
Also when Registering an Account, it will automatically be a Patient
If you want an Admin Account except for doritos 123, just create another using the page home/users/create-account.php

BETA: Added home/dashboard/main-dashboard.php, soon this will be the main page for activity


************************************** OLD LOG *************************************************************


************************************** 5th Commit: 3/30/2025 **************************************
Trying to integrate Bootstrap, installed manually for Collaborators
Added vendor/bootstrap folders for Bootstrap, so frontend is available offline
Added link into /home/components/head.inc.php and nav-bar.inc.php to link Bootstrap
Added a new Nav-bar, still in development but functional except for the search bar
Added 5rem top margin on body (home/css/global.css) because the nav-bar is not taking space
Added function: visible in main.js
Cleaned code in main.js

Thinking of removing unneeded files: home/components/nav-bar-old.inc.php, home/courses, home/css/bubble.css, home/css/forms.css


************************************** 4th Commit: 3/12/2025 **************************************
Fixed create-account.php, now usable
Fixed Hashing Passwords algorithm
Added more to create-account.php backend

Added more details to sampletemp.php
Fixed some line of codes
Added comments in crud.php and sampletemp.php

Cleaned code of manage-account.php

Added register-account.php fully functional, will always be patient account
Added Register Button in login page
Added 2 new Accounts

Added missing HTML tags: html, body


************************************** 3rd Commit: 3/5/2025 **************************************
Root Location Added in config-names.php
Fixed sidebar location Buttons


Added util/hasher.php for hashing passwords, use this only ONCE, ISSUE: This will also hash the other hashed passwords, leading to bugs
Cleaned code of manage-account.php. ready for viewing
Cleaned code of manage-course.php, still in development

Added Sample Template for easy Development: home/sample/samplepage.php
Added Routing variables for easy accessing of files in config-names.txt
Added some helpful comments


************************************** 2nd Commit: 2/27/2025 **************************************
Added Database(forgot)


************************************** 1st Commit: 2/27/2025 **************************************
Added Dynamic User Roles in Sidebar Buttons

Built in flexible query functions for easy CRUD functions throughout the whole System