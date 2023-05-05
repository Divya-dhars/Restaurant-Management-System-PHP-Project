<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $to = $email;
    $subject = "New Contact Form Submission";
    $body = "Name: $name\nEmail: $email\nMessage: $message";
    if (mail($to, $subject, $body)) {
      echo "Thank you for contacting us!";
    } else {
      echo "Oops! Something went wrong. Please try again.";
    }
    exit;
  }
?>
