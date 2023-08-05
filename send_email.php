<?php
// Replace the following variables with appropriate values
$recipient = 'kiran.shrestha@aadimcollege.edu.np'; // The customer's email address
$subject = 'Reservation Payment Confirmation'; // The email subject
$message = 'Thank you for your reservation payment. Your payment was successful.'; // The email content
$from = 'kiranxtha99@gmail.com'; // The "From" address

// Additional headers
$headers = 'From: ' . $from . "\r\n" .
            'Reply-To: ' . $from . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

// Send the email
mail($recipient, $subject, $message, $headers);

// You can also use PHPMailer or other libraries for advanced email handling.
// Refer to the library documentation for how to set up and use it.
?>