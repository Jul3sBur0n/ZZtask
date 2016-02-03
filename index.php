<!DOCTYPE html>
<?php
if(isset($_POST['deco']))
	session_destroy();
	
	
include 'sessionstarter.php';


if(isset($_SESSION['login']))
	$login = $_SESSION['login'];
	
	
if(isset($_POST['lang']))
	$_SESSION['lang'] = $_POST['lang'];
	
	
if(!empty($_SESSION['lang']) && $_SESSION['lang'] == "FR")
	include 'fr-lang.php';
else
	include 'en-lang.php';
?>



<html>
	<head>
		<link rel="stylesheet" href="back.css">
		<meta charset="utf_8"/>
		<title>
			<?php echo TXT_CONNEXION;?>
		</title>
	
	</head>
	<body>
		<form class="langue" method="post" action="index.php">
		<input type="hidden" value="<?php echo TXT_LANG; ?>" name="lang">
		<button class="btn btnl" type="submit"><b><?php echo TXT_LANG; ?></b></button> </form>
		
		<!--------------Sign In formular--------------------->
		<!-----Input name; password; ------------------------>
		<!---- Redirection to verification_task.php---------->
		
		<div class="connexion">
		<form class="premier" name ="Connexion" method="post" action="verif_connexion.php">
		<input class="input-form" type="text" name="pseudo" id="pseudo" placeholder="Login" title="4 à 15 caractères" <?php if(isset($_SESSION['login'])) {echo "value = $login";} ?> ><br>
		<input class="input-form" type="password" name="password" id="password" placeholder="Password" title="4 à 20 caractères"> <br><br>
		<button class="btn" type="submit"><?php echo TXT_CONNEXION;?><br/></button> <a class = "reg" href="registeration.php" > <?php echo TXT_ENREGISTREMENT;?> </a>
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
