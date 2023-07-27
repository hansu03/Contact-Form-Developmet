# PHP TEST - CONTACT FORM DEVELOPMET
This repository contains a simple contact form developed using HTML, PHP, and MySQL, as per the given instructions. The contact form collects user input for Full Name, Phone Number, Email, Subject, and Message. The provided input is validated using PHP to ensure all required fields are filled with correct and valid data.

# Prerequisites
Before setting up and running the application, ensure you have the following requirements met:

Web server (e.g., Apache, Nginx) with PHP support.
MySQL database server.
Installation and Setup
Follow the steps below to set up the application:
1. Clone this repository to your web server's document root:
   git clone <repository_url>
2. Create a new MySQL database for the contact form submissions:
   CREATE DATABASE contact_form;
3. Create a MySQL table named contact_form to store the form submissions:
   USE contact_form;
   CREATE TABLE contact_submissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    subject VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    ip_address VARCHAR(50) NOT NULL,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP);
4. Update the PHP configuration file (e.g., config.php) with your database credentials
   <?php
   // Replace with your actual database 
   $hostname = 'localhost';
   $username = 'your_database_username';
   $password = 'your_database_password';
    $database = 'contact_form';
    ?>


# How to Run the Application
1. Ensure your web server and MySQL database are up and running.
2. Access the application via a web browser by navigating to the URL where it's hosted, for 
   example: http://localhost/contact_form
3. Fill in the contact form with the required information and click the "Submit" button.
4. The PHP script will validate the form input, and if it's correct, the data will be saved to 
   the contact_form database table, and an email notification will be sent to the site owner's 
   email address: test@techsolvitservice.com

# Error Messages and Success Confirmations
=> If there are any errors in the form submission (e.g., empty required fields, incorrect 
      email format), appropriate error messages will be displayed to the user. The correctly 
      filled input fields will remain populated after the form submission for easy correction.

=> If the form is successfully submitted, a confirmation message will be shown to the user.

# Submission
Once you have completed the development and tested the application, create a folder containing all the PHP, HTML, and SQL code files, along with this README file. Compress the folder (e.g., as a ZIP file) and upload it to your Google Drive with sharing settings enabled for viewing or add it to a GitHub repository.

Good luck with the test! We look forward to reviewing your solution. If you have any questions or need further clarification, please include them in the README file.











