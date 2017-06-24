<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
         
            include_once "functions.php";
	
           /* $subject = $_POST['subject'];
            if($subject == "")
            {
                $nextMonday = date('l jS \of F Y', strtotime('next monday'));
                $subject = "Convocatoria para ".$nextMonday;
                echo $subject;
            }*/
            
            //saveSubject($_POST['subject']);
            sendTestEmail("Selada", "Selada");
        ?>
    </body>
</html>
