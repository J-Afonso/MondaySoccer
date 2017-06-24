<?php
	include_once('functions.php');
	include_once('config.php');
	include_once('MySQL.php');

	$username = stripslashes($_POST['username']);
	$password = strtolower(stripslashes($_POST['password']));
	
    $db = new MySQL($dbhost,$dbname,$dbuser,$dbpass);
    $db->query("SELECT * FROM users WHERE name='$username'");

	if($db->next_record()) 
	{
	 if(md5($password)==$db->f('password')) {
		   session_start();
		   $_SESSION['user_logged'] = true;
		   $_SESSION['id']          = $db->f('id');
		   $_SESSION['name']    	= $db->f('name');
		   $_SESSION['profile']    	= $db->f('profile');
		   
		   setcookie("MondaySoccerId", $_SESSION['id'] );
		   setcookie("MondaySoccerName", $_SESSION['name']);
		   setcookie("MondaySoccerProfile", $_SESSION['profile']);
		   
		   header("Location: ../index.php");

	 } else {
		   echo "password errada!<br /><br /><a href=\"../index.php\">voltar</a>";
	 }
	} else {
	 echo "utilizador nao existe!<br /><br /><a href=\"../index.php\">voltar</a>";
	}
     
?>
