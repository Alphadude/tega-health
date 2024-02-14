<?php

header('Content-Type: application/json');

// Replace these values with your actual email and SMTP server information
$fromEmail = "admin@tegahealthcare.com";
$smtpServer = "mail.tegahealthcare.com";
$smtpPort = 587; // Use the appropriate port number

// Collect form data (you can modify this part based on your form fields)
$to = "admin@tegahealthcare.com"; // Replace with your email address
$subject = "Appointment Form Submission";
$from = $fromEmail;

$fullname = isset($_POST["fullname"]) ? $_POST["fullname"] : "";
$contactemail = isset($_POST["contactemail"]) ? $_POST["contactemail"] : "";
$subject = isset($_POST["subject"]) ? $_POST["subject"] : "";
$message = isset($_POST["message"]) ? $_POST["message"] : "";




// Build the email message
$message = "Full Name: $fullname\n";
$message .= "Email: $contactemail\n";
$message .= "Email subject: $subject\n";
$message .= "Email message: $message\n";


$headers = "From: $from";
$headers .= "\r\nReply-To: $email";

// Set SMTP server configuration
ini_set("SMTP", $smtpServer);
ini_set("smtp_port", $smtpPort);
ini_set("sendmail_from", $fromEmail);

// Send the email
if (mail($to, $subject, $message, $headers)) {
    echo json_encode(["message" => "Email was sent successfully"]);
} else {
    echo json_encode(["error" => "Email could not be sent"]);
}
?>