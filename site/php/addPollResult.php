<?php

	include_once "functions.php";
	
    $pollResult = $_POST['poll'];
    $result = addPollResult($pollResult);        
    
    if ($result) {
        header("location:../index.php");      
    } else {
        echo "Já votaste zé"; 
    }

?>

