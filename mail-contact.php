<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email_address = $_POST['email_address'];
		$telephone_number = $_POST['telephone_number'];		
		$message = $_POST['message'];		

		// Sender Email and Name 
		$from = stripslashes($_POST['first_name'])."<".stripslashes($_POST['email_address']).">";
		// Recipient Email Address 
		// Change the email address with yours
		$to = 'eric@jonesbros.club';
		
		// Specific Subject Line
		$subject = 'Contact Form Submission';

		// Email Header 
		$headers = "From: $from\r\n" .
                 "MIME-Version: 1.0\r\n" .

        // Message Body 
		$body = "
		First Name: $first_name\n
		Last Name: $last_name\n
		Email Address: $email_address\n
		Telephone Number: $telephone_number\n
		Message: $message\n
		";

 		// Check that data was sent to the mailer.
		if ( empty($first_name) OR !filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
			echo 'Please complete all required fields on the form.';
			exit;
		}

		// If there are no errors, send the email
		if (mail ($to, $subject, $body, $from)) {
			echo 'Good decision, smart stuff! I will be in touch with you very soon. =)';
		}
	}
?>