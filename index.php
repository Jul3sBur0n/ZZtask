<!DOCTYPE html>
<?php
include 'sessionstarter.php';
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
		<div class="connexion">
		<form class="premier" name ="Connexion" method="post" action="verif_connexion.php">
		<input class="input-form" type="text" name="pseudo" id="pseudo" placeholder="Login" title="4 à 15 caractères" <?php if(isset($_SESSION)) {echo "value = $login";} ?> required /><br/>
		<input class="input-form" type="password" name="password" id="password" placeholder="Password" title="4 à 20 caractères" required /> <br/><br/>
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
						
					default:
						break;
				}
			}
		?>
		</div>
	</body>
</html>
