<!DOCTYPE html>
<?php
include 'sessionstarter.php';

?>

<link rel="stylesheet" href="back.css">
<html>
	<head> <title> Enregistrement </title> </head>
	<body>
		<div class="connexion">
		<form name ="Connexion" method="post" action="verification.php">
		<input class="input-form" type="text" name="pseudo" id="pseudo" placeholder="Login"/><br>
		<input class="input-form" type="password" name="password" id="password" placeholder="Password" title="4 caractères minimum"/> <br>
		<input class="input-form" type="password" name="confpass" id="confpass" placeholder="Confirmation Password"/><br><br>
		<button class="btn">Enregistrement<br></button> <?php echo'<a class="reg" href="index.php" > Déjà inscrit ? </a>';  ?>
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

