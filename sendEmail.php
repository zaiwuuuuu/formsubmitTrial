<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Email address to receive the form data
    $to = 'liamcarlo145@gmail.com';
    $subject = 'New Form Submission';

    // Email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Email headers
    $headers = "From: $name <$email>";

    // Send email
    if (mail($to, $subject, $email_content, $headers)) {
        // Redirect after successful submission
        header('Location: thank-you.html');
        exit;
    } else {
        // Redirect after failed submission
        header('Location: error.html');
        exit;
    }
} else {
    // If not a POST request, return an error
    http_response_code(403);
    echo json_encode(array('message' => 'This method is not allowed.'));
}
?>
