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

$name = isset($_POST["name"]) ? $_POST["name"] : "";
$email = isset($_POST["email"]) ? $_POST["email"] : "";
$phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
$date = isset($_POST["date"]) ? $_POST["date"] : "";
$time = isset($_POST["time"]) ? $_POST["time"] : "";
$service = isset($_POST["service"]) ? $_POST["service"] : "";



// Build the email message
$message = "Full Name: $name\n";
$message .= "Email: $email\n";
$message .= "Mobile Number: $phone\n";
$message .= "Preffered date: $date\n";
$message .= "Preffered time: $time\n";
$message .= "Service: $service\n";

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