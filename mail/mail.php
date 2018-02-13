<?php
$type = isset( $_POST['type'] ) ? $_POST['type'] : null;
$email = isset( $_POST['email'] ) ? $_POST['email'] : null;
$redirect =  isset( $_POST['redirect'] ) ? $_POST['redirect'] : null;
$success = 'error';
if ( $type && $email ) {
	require( 'PHPMailer-master/PHPMailerAutoload.php' );
	$mail = new PHPMailer;

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'example@gmail.com';                 // SMTP username
	$mail->Password = 'password';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to
	$mail->setFrom('example@gmail.com', 'Up Co');
	$mail->addAddress( $email );     // Add a recipient

	// $handle = scandir( 'attachments' );
	// foreach ( $handle as $file ) {
	// 	if ( '.' != $file && '..' != $file ) {
	// 		$mail->addAttachment('attachments/'.$file );  
	// 	}
		
	// }
	$mail->isHTML(true);                        // Set email format to HTML
	$subject = 'Thông tin văn phòng';
	$newsubject='=?UTF-8?B?'.base64_encode($subject).'?='; // UTF 8 to fix header
	$mail->Subject = $newsubject;
	$body = file_get_contents( 'templates/mail.php' );
	$mail->Body    = $body;
	$mail->AltBody = 'Thông tin các văn phòng';

	if($mail->send()) {
		$time = date( "Y-m-d H:i:s" );
		$fp = fopen('email.csv', 'a');
		$data = array( 'email' => $email, 'sendDate' => $time );
	    fputcsv($fp, $data );
		fclose($fp);

    	$success = 'success';

	} else {
		$success = 'error';
	}
}
header("Location: ". $redirect ."?email_success=".$success );
die();

