<!DOCTYPE html>
<?php
if(isset($_POST['deco']))
	session_destroy();
include 'sessionstarter.php';
if(isset($_SESSION['login']))
	$login = $_SESSION['login'];
?>

<link rel="stylesheet" href="back.css">

<html>
	<head>
		<meta charset="utf_8"/>
		<title>
			Connexion
		</title>
	
	</head>
	<body>
		<form class="langue" method="post" action="index.php">
		<input type="hidden" value="Fr" name="lang">
		<button class="btn btnl" type="submit"><b>Fr</b></button> </form>
		<div class="connexion">
		<form class="premier" name ="Connexion" method="post" action="verif_connexion.php">
		<input class="input-form" type="text" name="pseudo" id="pseudo" placeholder="Login" title="4 à 15 caractères" <?php if(isset($_SESSION['login'])) {echo "value = $login";} ?> /><br>
		<input class="input-form" type="password" name="password" id="password" placeholder="Password" title="4 à 20 caractères"/> <br><br>
		<button class="btn" type="submit">Connexion<br/></button> <a class = "reg" href="registeration.php" > Pas encore inscrit ? </a>
		</form>
		<?php
			if(isset($_SESSION['error']))
			{
				switch($_SESSION['error'])
				{
					case 10:
						echo '<span class = "erreur">Erreur champ vide.</span>';
						$_SESSION['error']=0;
						break;
					case 20:
						echo '<span class = "erreur">Erreur d\'identification.</span>';
						$_SESSION['error'] = 0;
						break;
					case 30:
						echo '<span class = "erreur">Nom d\'utilisateur déjà utilisé</span>';
						$_SESSION['error'] = 0;
						break;
					case 40:
						echo '<span class = "erreur">Caractère non admis (! ; :)</span>';
						$_SESSION['error'] = 0;
						break;
					case 50:
						echo '<span class = "erreur">Nombre de caractère insuffisant (min 4)</span>';
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
