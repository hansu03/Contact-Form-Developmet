<?php
// PHPMailer setup and configuration

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendEmailNotification($full_name, $phone_number, $email, $subject, $message) {
    // Create a new PHPMailer instance
    $mail = new PHPMailer();
    // Set the SMTP server and port for Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;

    // Set the authentication credentials for Gmail
    $mail->SMTPAuth = true;
    $mail->Username = 'Your Mail';
    $mail->Password = 'Your Password';

    // Set the 'From' email address and name
    $mail->setFrom('Your Mail', 'Your Password');

    // Set the recipient email address and name
    $mail->addAddress('test@techsolvitservice.com', 'Tech Solveitservice');

    // Set email subject and body
    $mail->Subject = 'Testing API';
    $mail->Body = "You have received a new form submission.\n\nFull Name: $full_name\nPhone Number: $phone_number\nEmail: $email\nSubject: $subject\nMessage: $message";

    // Send the email
    if ($mail->send()) {
        return true;
    } else {
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Form validation
    $errors = array();

    // Check if all required fields are filled
    $required_fields = array("full_name", "phone_number", "email", "subject", "message");
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $errors[$field] = ucfirst($field) . " is required.";
        }
    }

    // Check email validity
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Invalid email format.";
    }

    // If there are errors, display them and keep the filled data
    if (count($errors) > 0) {
        foreach ($_POST as $key => $value) {
            ${$key} = $value;
        }
        include "index.html";
        exit;
    }

    // If there are no errors, proceed with saving the data and sending the email
    $full_name = $_POST["full_name"];
    $phone_number = $_POST["phone_number"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $ip_address = $_SERVER["REMOTE_ADDR"];
    $timestamp = date("Y-m-d H:i:s");

    // Save data to the database
    $localhost = "localhost"; // Change this to your database host
    $username = "root"; // Change this to your database username
    $password = ""; // Change this to your database password
    $db_name = "contact_form";

    $conn = mysqli_connect($localhost, $username, $password, $db_name); // Corrected variables here
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO form_submission (full_name, phone_number, email, subject, message, ip_address, timestamp) VALUES ('$full_name', '$phone_number', '$email', '$subject', '$message', '$ip_address', '$timestamp')";

    if (mysqli_query($conn, $sql)) {
        // Send email notification to the site owner
        if (sendEmailNotification($full_name, $phone_number, $email, $subject, $message)) {
            // Display success message to the user
            $_SESSION['msg']="Mail Sent!!";
            header("location:index.php");
        } else {
            echo "Error: Failed to send email notification.";
            $_SESSION['msg']="Mail could not be sent!!";
            header("location:index.php");

        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
