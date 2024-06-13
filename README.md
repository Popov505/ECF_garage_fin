# ECF_garage_symfony

----------------------------------------------------------------------------------------------
------------------------------- Procedure for windows computers ------------------------------
----------------------------------------------------------------------------------------------

----------------------------------------------------------------------------------------------
Procedure to install COMPOSER
----------------------------------------------------------------------------------------------
=> https://getcomposer.org/download/ for further information

1.In the navigation bar of your Internet navigator enter "https://getcomposer.org/Composer-Setup.exe" then press ENTER
2.Download and run the file Composer-Setup.exe to install COMPOSER


----------------------------------------------------------------------------------------------
Project: Procedure to clone the github repository and launch the website
----------------------------------------------------------------------------------------------

1.Create folder named "ECF_garage" on your computer and open it
2.Open a terminal : in the navigation bar, enter "cmd" then press ENTER
3.Enter the command "git clone https://github.com/Popov505/ECF_garage_symfony.git" then press ENTER
4.Enter the command "cd ECF_garage_symfony" then press ENTER
5.Enter the command "composer install" then press ENTER
6.Enter the command "symfony server:start -d" then press ENTER


----------------------------------------------------------------------------------------------
Database: Procedure to install and launch XAMPP
----------------------------------------------------------------------------------------------

1.In the navigation bar of your Internet navigator enter "https://sourceforge.net/projects/xampp/files/latest/download" then press ENTER
2.Download and install XAMPP (installation by default)
3.Launch XAMPP
4.On XAMPP interface, start APACHE
5.On XAMPP interface, start MYSQL
6.On XAMPP interface, click on MySql => Admin to open localhost/phpmyadmin
7.In localhost/phpmyadmin, open SQL then paste here the content of the file BDD.sql then click on EXECUTE
8.Open the file ".env" of the symfony project and modify the line DATABASE_URL to match with your XAMPP configuration


----------------------------------------------------------------------------------------------
Database: Create admin account
----------------------------------------------------------------------------------------------
1.In the terminal, enter the command "symfony console security:hash-password" then press ENTER
2.Enter your password
3.Copy the value after Password hash
4.In http://localhost/phpmyadmin select the database ecf_garage, then the table users
5.Click on INSERT button then paste in password field the value you pasted in the previous step, then fulfill the fields email with your email and roles with ["ROLE_ADMIN"]