<!DOCTYPE html>
<?php
include 'sessionstarter.php';
if(isset($_POST['lang']) && !empty($_SESSION['lang']))
	$_SESSION['lang'] = $_POST['lang'];
if(isset($_SESSION['lang']) && $_SESSION['lang'] == "FR")
	include 'fr-lang.php';
else
	include 'en-lang.php';
?>


<html>
	<head> <link rel="stylesheet" href="back.css"> <title> <?php echo TXT_ENREGISTREMENT;?> </title> </head>
	<body>
		<form class="langue" method="post" action="registeration.php">
		<input type="hidden" value="<?php echo TXT_LANG; ?>" name="lang">
		<button class="btn btnl" type="submit"><b><?php echo TXT_LANG; ?></b></button> </form>
		<div class="connexion">
		<form name ="Connexion" method="post" action="verification.php">
		<input class="input-form" type="text" name="pseudo" id="pseudo" placeholder="Login"/><br>
		<input class="input-form" type="password" name="password" id="password" placeholder="Password" title="4 caractères minimum"/> <br>
		<input class="input-form" type="password" name="confpass" id="confpass" placeholder="Confirmation Password"/><br><br>
		<button class="btn"><?php echo TXT_ENREGISTREMENT;?><br></button> <a class="reg" href="index.php" ><?php echo TXT_CONNEXION;?></a>
		</form>
		<?php
			if(isset($_SESSION['error']))
			{
				switch($_SESSION['error'])
				{
					case 10:
						echo '<span class = "erreur">'; echo TXT_ERROR_10; echo'</span>';
						$_SESSION['error']=0;
						break;
					case 20:
						echo '<span class = "erreur">'; echo TXT_ERROR_20; echo '</span>';
						$_SESSION['error'] = 0;
						break;
					case 30:
						echo '<span class = "erreur">'; echo TXT_ERROR_30; echo'</span>';
						$_SESSION['error'] = 0;
						break;
					case 40:
						echo '<span class = "erreur">'; echo TXT_ERROR_40; echo'</span>';
						$_SESSION['error'] = 0;
						break;
					case 50:
						echo '<span class = "erreur">'; echo TXT_ERROR_50; echo'</span>';
						$_SESSION['error'] = 0;
						break;
						
					default:
						break;
				}
			}
		?>
		</div>
	</body>
</html>

