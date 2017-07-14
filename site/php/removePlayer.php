<?php

	session_start();		

	include_once "functions.php";
	
	include_once "emailCheck.php";

	if(isLoggedIn())
	{
	                                
                $result = getPlayersForEmail();
            
		$player = getPlayer($_GET['id']);

		$phrase = "<p>O Jogador <b>".$player."</b> ". getRandomExitPhrase() . "</p>";
	
		removePlayer($_GET['id']);		
	
                $mailTxt = "";
                if(isset($_POST['mailTxt'])){
                    $mailTxt = $_POST['mailTxt'];
                }
                
		if(sendEveryoneEmail($mailTxt, $phrase))
                {                    
                    $notEnoughPlayers = mysql_num_rows($result) <= 14 ? 1 : 0;
                    header("location:../index.php?removeResult=" . $notEnoughPlayers);                       
                }		
    		else
			echo "Mail error :(";
	}
	else
		echo "NOT LOGGED IN";
?>



