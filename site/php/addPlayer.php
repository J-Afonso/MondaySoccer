<?php

	include_once "functions.php";
	include_once "emailCheck.php";
	
	if(isLoggedIn())
	{
		
		$player_name = stripslashes($_POST['player']);
		$add_position = isset($_POST['add_position']);
		$position = isset($_POST['position']) ? $_POST['position'] : '';
	
		if($player_name == "")
			echo "Invalid username";
		else
		{
			// Only add position if checkbox was checked and a position was selected
			if($add_position && !empty($position)) {
				$player_with_position = $player_name . " (" . $position . ")";
			} else {
				$player_with_position = $player_name;
			}
		
			if(addPlayer($player_with_position))
			{
				if(sendEveryoneEmail("", "<p>O <b>".$player_name."</b> decidiu que o melhor para a sua vida &eacute; jogar &agrave; bola em Alcantara na pr&oacute;xima 2a feira. Caralho, &eacute;s mesmo est&uacute;pido.</p><br />".$_POST['mailTxt']))
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


