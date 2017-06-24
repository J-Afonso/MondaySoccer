<?php

function checkEmails()
{

include_once "functions.php";

if(getPlayersNumber() == 1)
	return;

$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = 'mondayssoccer@gmail.com';
$password = 'an055apa55';

/* try to connect */
$inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

/* grab emails */
$emails = imap_search($inbox,'UNSEEN');

/* if emails are returned, cycle through each... */
if($emails) {
  
  /* begin output var */
  $output = '';
  
  /* put the newest emails on top */
  rsort($emails);
  
  $counter = 10;
  foreach($emails as $email_number) 
  {  
    /* get information specific to this email */
    $overview = imap_fetch_overview($inbox,$email_number,0);


	if(strpos($overview[0]->subject,"Futebol Segunda Feira"))
	{
		//echo substr($overview[0]->message_id, 1, -1);
		saveMessageId(substr($overview[0]->message_id, 1, -1));
		break;
	}
	
	if($counter <= 0)
		break;
	
	$counter--;
  }
  
  echo $output;
} 

/* close the connection */
imap_close($inbox);

}
?>