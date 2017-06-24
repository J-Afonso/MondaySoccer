<?php

	include_once "functions.php";
	include_once "emailCheck.php";
	
	if(isLoggedIn())
	{
		
		$player_name = stripslashes($_POST['player']);
	
		if($player_name == "")
			echo "Invalid username";
		else
		{
		
			if(addPlayer($player_name))
                        {
                            if(sendEveryoneEmail($_POST['mailTxt'], "<p>O <b>".$player_name."</b> decidiu que o melhor para a sua vida &eacute; jogar &agrave; bola em Massam&aacute; na próxima 2a feira. Caralho, &eacute;s mesmo estúpido.</p>"))
				header("Location: ../index.php");
                            else
				echo "Mail error :(";
                        }
                        else
                            echo "Este jogador ja se inscreveu, se calhar carregaste duas vezes no botao de submeter, se calhar tens de deixar de te inscrever ao mesmo tempo que estas a ser violentado por um cavalo com parkinson";
		}
	}
	else
		echo "NOT LOGGED IN";
?>


