<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>:: Monday Soccer ::</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
	<div id="wrapper">
		<h1>Monday Soccer</h1>
	
		<fieldset title="Players">
			
			<legend>Os que v&atilde;o!</legend>
			<ol>
				<?php
				
					include_once "php/functions.php";
					$result = getPlayers();
                                        $counter = 0;
                                        $breaked = false;
					if(isLoggedIn())
					{
						while($row=mysql_fetch_array($result, MYSQL_ASSOC))
						{
							echo "<li>".$row['player']." &nbsp; <a href=\"php/removePlayer.php?id=".$row['id']."\">remove</a></li>";
                            $counter++;
                            if($counter > 13)
                            {
                                $breaked = true;
                                break;
                            }
						}
					}
					else
					{
						while($row=mysql_fetch_array($result, MYSQL_ASSOC))
						{
							echo "<li>".$row['player']."</li>";
                            $counter++;
                            if($counter > 13)
                            {
                                $breaked = true;
                                break;
                            }
						}

					}
				
				?>
			</ol>
		</fieldset>
                
                <?php
                    if($breaked)
                    {
                        echo "<fieldset title=\"Substitutes\"><legend>Os que queriam ir, mas n&atilde;o v&atilde;o.</legend><ol>";
                        while($row=mysql_fetch_array($result, MYSQL_ASSOC))
                        {
                            if(isLoggedIn())
                                echo "<li>".$row['player']." &nbsp; <a href=\"php/removePlayer.php?id=".$row['id']."\">remove</a></li>";
                            else    
                                echo "<li>".$row['player']."</li>";
                            
                                
                        }
                    }

                    echo "</ol></fieldset>";
                ?>
		
		<?php
		if(isLoggedIn())
		{
			if(userAlreadyVoted()) {
				printPollResults();
			} else {	
			?>
				<form method="post" action="php/addPollResult.php">
				<fieldset>
					<legend>Em termos de dias para chacinar um prego?</legend>
					<ol>
						<li><input type="radio" name="poll" value="1"/> Terça</li>
						<li><input type="radio" name="poll" value="2"/> Quarta</li>
						<li><input type="radio" name="poll" value="3"/> Caralho</li>
						<li><input type="submit" value="Vota caralho!" /></li>
					</ol>
				</fieldset>
				</form>
			<?php 
			}  ?>
				<form method="post" action="php/addPlayer.php">
				<fieldset>
					<legend>Vais jogar?</legend>
					<ol>
						<li><label>O meu nome pr&oacute;prio:</label></li>
						<li><input name="player" type="text" /></li>
						<li><label>Escreve alguma javardeira (opcional)</label></li>
						<li><textarea name="mailTxt" rows="4" cols="20"></textarea></li>
						<li><input type="submit" value="Adoro o bigode do gajo careca!" /></li>
					</ol>
				</fieldset>
				</form>
			<?php 
				if($_SESSION['profile'] == 'admin')
				{
				?>
                    <form method="post" action="php/newEvent.php">
                        <fieldset>
                            <legend>New Event?</legend>
                            <ol>
                                <li><label>O Amigo vai jogar um joguinho novo?</label></li>
                                <li><label>Coloca aqui o subject do email (opcional)</label></li>						
                                <li><input name="subject" type="text" /></li>
                                <li><input type="submit" value="Vou, vou" /></li>
                            </ol>
                        </fieldset>
                    </form>                                    
				<?php
				} ?>
				Logged in as <u><?php echo $_SESSION['name'] ?></u><br/> <a href="php/logout.php">Logout</a>
		<?php
		}
		else
		{
		?>
			<form method="post" action="php/login.php">
				<fieldset>
					<legend>Login</legend>
					<ol>
						<li><label for="username">Player</label></li>
						<li><input name="username" type="text" /></li>
						<li><label for="password">Palavra-passe</label></li>
						<li><input name="password" type="password" /></li>	
						<li><input type="submit"  value="Submit"/></li>
					</ol>
				</fieldset>
			</form>
  <?php } ?>
	</div>
  <?php 
  if(isset($_GET['removeResult'])) {     
    switch($_GET['removeResult']) { 
        case 1:
            echo '<script type="text/javascript">alert("E agora, caralho? Vais dar uma foda? Arranjas alguém para o teu lugar? É a tua avó que vai à baliza? Vai-te foder, pá!");</script>';
            break;
        default:
            echo '<script type="text/javascript">alert("Estávamos a ver que não desistias, fodasse! Temos pessoal melhor que tu na fila de espera. Põe-te nas putas, ó boi!");</script>';
            break;
  }}?>           
	</body>
</html>