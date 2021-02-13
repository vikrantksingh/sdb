<?php
 
// Email address verification
function isEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
 
if($_POST) {
 
    $emailTo = 'vikrantsingh@xebia.com';
 
	$clientEmail = addslashes(trim($_POST['email']));
    $name = addslashes(trim($_POST['name']));
	$phone = addslashes(trim($_POST['phone']));
    $subject = addslashes(trim($_POST['subject']));
	$message = addslashes(trim($_POST['message']));
    $antispam = addslashes(trim($_POST['antispam']));
 
    $array = array('emailMessage' => '', 'nameMessage' => '', 'phoneMessage' => '', 'subjectMessage' => '', 'messageMessage' => '', 'antispamMessage' => '');
 
    if(!isEmail($clientEmail)) {
        $array['emailMessage'] = 'Invalid email!';
    }
    if($subject == '') {
        $array['subjectMessage'] = 'Empty subject!';
    }
    if($message == '') {
        $array['messageMessage'] = 'Empty message!';
    }
    if($antispam != '12') {
        $array['antispamMessage'] = 'Wrong antispam answer!';
    }
    if(isEmail($clientEmail) && $subject != '' && $message != '' && $antispam == '12') {
        // Send email
        $headers = "From: " . $clientEmail . " <" . $clientEmail . ">" . "\r\n" . "Reply-To: " . $clientEmail;
        mail($emailTo, $subject . " (bootstrap contact form tutorial)", $message, $headers);
    }
 
    echo json_encode($array);
 
}
 
?>