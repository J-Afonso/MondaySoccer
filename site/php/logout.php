<?php

   session_start();
   $_SESSION['user_logged'] = false;
   $_SESSION['id']          = '0';
   header("Location: ../index.php");
     
?>
