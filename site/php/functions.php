<?php 

function getPlayers()
{

        include ('php/config.php');
        include_once('php/MySQL.php');	

        $db = new MySQL($dbhost,$dbname,$dbuser,$dbpass);
        return $db->query("SELECT * from players ORDER BY timestamp");
}

function getPlayersNumber() 
{

        include ('config.php');
        include_once('MySQL.php');	

        $db = new MySQL($dbhost,$dbname,$dbuser,$dbpass);
        return mysql_num_rows($db->query("SELECT * from players"));
}

function addPlayer($player)
{
        include ('../php/config.php');
        include_once('../php/MySQL.php');	

        $db = new MySQL($dbhost,$dbname,$dbuser,$dbpass);

        $results = $db->query("SELECT * FROM players WHERE player='$player'");
        if(mysql_num_rows($results) > 0)
            return false;
        else
        {
            $db->query("INSERT INTO players VALUES('0', '$player', NOW())");
            logAction("addPlayer " . $player);
            return true;
        }
}

function logAction($action) 
{
    include ('../php/config.php');
    include_once('../php/MySQL.php');   

    $id = $_SESSION['id'];

    $db = new MySQL($dbhost,$dbname,$dbuser,$dbpass);
    $db->query("INSERT INTO logs VALUES('0', '$id', '$action', NOW())");
}

function removeAllPlayers()
{
        include ('config.php');
        include_once('MySQL.php');	

        $db = new MySQL($dbhost,$dbname,$dbuser,$dbpass);

        $db->query("DELETE FROM players");
        $db->query("DELETE FROM message");

        logAction("removeAllPlayers");
}

function getPlayer($player)
{
        include ('../php/config.php');
        include_once('../php/MySQL.php');	

        $db = new MySQL($dbhost,$dbname,$dbuser,$dbpass);

        $result = $db->query("SELECT * FROM players WHERE id = '$player'");

        if($row=mysql_fetch_array($result, MYSQL_ASSOC))
                return $row['player'];
}

function removePlayer($player)
{
        include ('../php/config.php');
        include_once('../php/MySQL.php');	

        $db = new MySQL($dbhost,$dbname,$dbuser,$dbpass);

        $db->query("DELETE FROM players WHERE id = '$player'");

        logAction("removePlayer " . $player);
}

function openFile($filename)
{
        $file_handle = file_get_contents($filename);
        return explode("\n", $file_handle);
}

function getRandomExitPhrase()
{
        $phrases = openFile("exitPhrases.txt");
        return $phrases[array_rand($phrases)];

}

function saveSubject($subject)
{
        include ('config.php');
        include_once('MySQL.php');	

        $db = new MySQL($dbhost,$dbname,$dbuser,$dbpass);
        $db->query("DELETE FROM subject");
        $db->query("INSERT INTO subject VALUES('0', '$subject')");

}


function getSubject()
{
        include ('config.php');
        include_once('MySQL.php');	

        $db = new MySQL($dbhost,$dbname,$dbuser,$dbpass);
        $result = $db->query("SELECT * FROM subject");
        if($row=mysql_fetch_array($result, MYSQL_ASSOC))
                return $row['subject'];
        else
                return "FUTEBOL SEGUNDA FEIRA";
}

function getPlayersForEmail()
{

        include ('config.php');
        include_once('MySQL.php');	

        $db = new MySQL($dbhost,$dbname,$dbuser,$dbpass);
        return $db->query("SELECT * from players ORDER BY TIMESTAMP ASC ");
}

function getMails()
{
        include ('config.php');
        include_once('MySQL.php');	

        $db = new MySQL($dbhost,$dbname,$dbuser,$dbpass);

        return $db->query("SELECT * from emails");
}

function isLoggedIn()
{
        $result = false;

        if(isset($_SESSION['user_logged']) && $_SESSION['user_logged'])
        {
                $result = true;
        }	
        else if(isset($_COOKIE["MondaySoccerId"]))
        {	
                $_SESSION['user_logged']  = true;
                $_SESSION['id']           = $_COOKIE["MondaySoccerId"];
                $_SESSION['name']    	  = $_COOKIE["MondaySoccerName"];
                $_SESSION['profile']      = $_COOKIE["MondaySoccerProfile"];

                $result = true;
        }	

        return $result;
}

function buildPlayersList()
{
        $msg = "<h1>&Eacute; s&oacute; gente horr&iacute;vel nesta convocat&oacute;ria.</h1><fieldset title=\"Players\"><legend>Os que v&atilde;o!</legend><ol>";

        $result = getPlayersForEmail();
        $counter = 0;
        $breaked = false;
        while($row=mysql_fetch_array($result, MYSQL_ASSOC))
        {
            $msg = $msg."<li>".$row['player']."</li>";        
            $counter++;       
            if($counter > 13)
            {
                $breaked = true;
                break;
            }
        }

        if($breaked)
        {
            $msg = $msg."</ol></fieldset><fieldset title=\"Substitutes\"><legend>Os que queriam ir, mas n&atilde;o v&atilde;o.</legend><ol>";
            while($row=mysql_fetch_array($result, MYSQL_ASSOC))
            {
                $msg = $msg."<li>".$row['player']."</li>";                
            }
        }

        $msg = $msg."</ol></fieldset>";

        return $msg;
}

function getMessageId()
{
        include ('config.php');
        include_once('MySQL.php');	

        $db = new MySQL($dbhost,$dbname,$dbuser,$dbpass);
        $result = $db->query("SELECT * FROM message");
        if($row=mysql_fetch_array($result, MYSQL_ASSOC))
                return $row['messageId'];
        else
                return "";
}

function saveMessageId($messageId)
{
        include ('config.php');
        include_once('MySQL.php');	

        $db = new MySQL($dbhost,$dbname,$dbuser,$dbpass);
        $db->query("DELETE FROM message");
        $db->query("INSERT INTO message VALUES('0', '$messageId')");
}

function retrievePHPMailer($debug){
    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';
    $mail->IsSMTP(); // send via SMTP

    if($debug) {
        //MailHOG config
        $mail->SMTPAuth   = false;
	$mail->Host       = "localhost";
	$mail->Port       = 1025;
    } else {
        //GMAIL config
        $mail->SMTPAuth   = true;                  // enable SMTP authentication
        $mail->SMTPSecure = "tls";                 // sets the prefix to the server
        $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
        $mail->Port       = 587;                   // set the SMTP port for the GMAIL server
        $mail->Username   = "mondayssoccer";  			// GMAIL username
        $mail->Password   = "an055apa55";            // GMAIL password
        //End Gmail

        $mail->From       = "mondayssoccer@gmail.com";
        $mail->FromName   = "Monday Soccer";
        $mail->Subject    = getSubject();
        $mail->SMTPDebug = false;
    }
    return $mail;
}

function sendEveryoneEmail($textToAdd, $message)
{

        require("phpmailer/class.phpmailer.php");
        require("phpmailer/class.smtp.php");
        require("phpmailer/class.pop3.php");

        $msg = "<p>".$textToAdd."</p>".
               $message. 
                buildPlayersList().    
               "<p><a href=\"http://www.bab-oon.com/mondaysoccer/static/newerScores.html\">Tabela classificativa.</a>.</p>".
               "<p>Se esta convocat&oacute;ria te convenceu, <a href=\"http://www.bab-oon.com/mondaysoccer\">junta-te a n&oacute;s</a> e vem conhecer os melhores s&iacute;tios de Massam&aacute;.</p>".
               "<p>Nome do Utilizador: Sida</p>".
               "<p>Palavra-passe: ConaAtePodre</p>".
               "<p>Horas: 21h</p>".
               "<p>Local: <a href=\"https://goo.gl/maps/qeuh74UriTJ5yNk37\">Escola EB23 Carlos Paredes.</a>.</p>";
        
        $mail = retrievePHPMailer(false); 

        $message_id = getMessageId();
        if($message_id != "")
        {
                $mail->AddCustomHeader("In-Reply-To:" .$message_id );
                $mail->AddCustomHeader("References:" .$message_id );
        }
        $mail->MsgHTML($msg);

        $mail->AddReplyTo("mondayssoccer@gmail.com","Monday Soccer");//they answer here, optional
        $result = getMails();
        while($row=mysql_fetch_array($result, MYSQL_ASSOC))
        {
                $mail->AddAddress($row['email'],$row['display']);
        }
        //$mail->AddAddress("roimatola@gmail.com", "Jafonso");
        $mail->IsHTML(true); // send as HTML

        $result = $mail->Send();

        if($message_id == "")
            saveMessageId($mail->ReturnedMessageID);

        return $result;

}
?>
