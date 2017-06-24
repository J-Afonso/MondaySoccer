<?php

	include_once "functions.php";
	
        $subject = $_POST['subject'];
        if($subject == "" || strlen($subject) < 5)
        {
            $nextMonday = date('l jS \of F Y', strtotime('next monday'));
            $subject = "Convocatoria para ".$nextMonday;
            echo $subject;
        }
            
	saveSubject($subject);
	removeAllPlayers();	
	header("Location: ../index.php");
    
?>



