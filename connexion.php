<!DOCTYPE html>

<link rel="stylesheet" href="../back.css">

<html>
	<head>
		<meta charset="utf_8"/>
		<title>
			Connexion
		</title>
	
	</head>
	<body>
		<form class="premier" name ="Connexion" method="post" action="verification.php">
		Pseudo : <input type="text" name="pseudo" id="pseudo"/> (Compris entre 4 et 15 caracteres) <br/>
		Mot de passe : <input type="text" name="password" id="password"/> (de 4 a 20 caracteres)<br/><br/>
		<button class="btn" type="submit">Connexion<br/></button> <?php echo'<a href="registeration.php" > Pas encore inscrit ? </a>';  ?>
		</form>
	</body>
</html>
