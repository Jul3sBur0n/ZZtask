<!DOCTYPE html>
<?php
if(!isset($_SESSION))
{
session_start();
}
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
		<input class="input-form" type="text" name="pseudo" id="pseudo" placeholder="Login" title="4 à 15 caractères"/><br/>
		<input class="input-form" type="password" name="password" id="password" placeholder="Password" title="4 à 20 caractères"/> <br/><br/>
		<button class="btn" type="submit">Connexion<br/></button> <span class="reg"><?php echo'<a href="registeration.php" > Pas encore inscrit ? </a>';  ?></span>
		</form>
		</div>
	</body>
</html>
