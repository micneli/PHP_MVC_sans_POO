<?php

if( !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['subject']) ) {
  $name = $_POST['username'];
  $email = $_POST['email'];
  $senderEmail = $_POST['senderEmail'];
  //$message = nl2br($_POST['message']);
  
  $to = "monte.nemi@gmail.com";	
  $from = $senderEmail;
  
  $headers = "From: $from\n";
  $headers .= "MIME-Version: 1.0\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\n";
  
  // $headers  = 'MIME-Version: 1.0' . "\r\n";
  // $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  // $from = $name . ' <' . $email . '>';
   
  // // Create email headers
  // $headers .= 'From: '.$from."\r\n".
  //     'Reply-To: '.$from."\r\n" .
  //     'X-Mailer: PHP/' . phpversion();
  // $subject = 'Contact Form Message';
  
  // $emailMessage = '<b>Name:</b> '.$name.' <br><b>Email:</b> '.$email.' <p>'.$subject.'</p>'.'<p>'.$message.'</p>';
  $emailMessage = '<html><body>';
  $emailMessage .= '<h1 style="color:#f40;">You got a message from Development web/web mobile website</h1>';
  $emailMessage .= '<!DOCTYPE html EN> 
   <html lang="en">
   <head></head>
   <body>
   <table>
     <tr><td width="100">Name: </td><td>' . $name . '</td></tr>
     <tr><td width="100">Email: </td><td>' . $email . '</td></tr>
    //  <tr><td width="100">Message: </td><td>' . nl2br($message) . '</td></tr>
   </table>
   </body>
   </html>';
	
	if( mail($to, "You received an email", $emailMessage, $headers) ){
		echo json_encode(["message" => "Le fischier zip a été envoyé !", "clean" => true]);
	} else {
		echo json_encode(["message" => "Il y a eu une erreur lors de l'envoie", "clean" => false]);
	}
} else {
  echo json_encode(["message" => "Tous les champs doivent être rempli !", "clean" => false]);
}