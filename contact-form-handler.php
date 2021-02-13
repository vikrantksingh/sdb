<?php
	$name = $_Post['name'];
	$visitor_email = $_Post['email'];
	$message = $_POST['message'];
	
	
	$email_from = 'vikrantsingh@xebia.com';
	
	$email_subject = "Mail from SDB 2021 contact us page"
	
	$email_body = "User Name: $name.\n".
					"User Email: &Visitor_email.\n".
						"User Message: $message.\n";
						
						
	$to = "vikrantsingh@xebia.com";
	
	$headers = "From: $email_from \r\n";
	
	$headers .= "Reply-To: $visitor_email \r\n";
	
	mail($to,$email_subject,$email_body, $header);
	
	header("Loaction: contact.html");
	

?>