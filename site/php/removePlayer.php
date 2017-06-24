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
	
		if(sendEveryoneEmail($_POST['mailTxt'], $phrase))
                {
                    if(mysql_num_rows($result) < 14) {
                        echo "E agora, caralho? Vais dar uma foda? Arranjas alguém para o teu lugar? É a tua avó que vai à baliza? Vai-te foder, pá!";
                    } else {
                        echo "Estávamos a ver que não desistias, fodasse!Temos pessoal melhor que tu na fila de espera. Põe-te nas putas, ó boi!";
                    }                        
                }		
    		else
			echo "Mail error :(";
	}
	else
		echo "NOT LOGGED IN";
?>



