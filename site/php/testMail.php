<?php

        require("phpmailer/class.phpmailer.php");
	require("phpmailer/class.smtp.php");
	require("phpmailer/class.pop3.php");
	
	$msg = "<p>Welcome</p>".     
	       "<p>Sign in to <a href=\"http://www.bab-oon.com/mondaysoccer\">Monday Soccer</a> and check in, if you want to play!</p>";;
	
	$msg = utf8_encode($msg);
	$mail = new PHPMailer();
        $mail->CharSet = 'UTF-8';
	$mail->IsSMTP(); // send via SMTP 
	//GMAIL config
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure = "ssl";                 // sets the prefix to the server
	$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
	$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
	$mail->Username   = "mondayssoccer";       // GMAIL username
	$mail->Password   = "an055apa55";          // GMAIL password
	//End Gmail
	
	$mail->From       = "mondaySoccer@gmail.com"; 
	$mail->FromName   = "Monday Soccer";
	$mail->Subject    = "Hello";
	$mail->SMTPDebug  = 1;   

		$mail->AddCustomHeader("In-Reply-To:" .$message_id );
		$mail->AddCustomHeader("References:" .$message_id );

	$mail->MsgHTML($msg);
 
	$mail->AddReplyTo("mondaysoccer@gmail.com","Monday Soccer");//they answer here, optional
	$mail->AddAddress("telmo.agostinho@gmail.com");
	$mail->IsHTML(true); // send as HTML
 
	$result = $mail->Send();
        
        echo $result;

?>