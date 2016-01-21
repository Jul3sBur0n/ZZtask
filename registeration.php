<!DOCTYPE html>
<?php
if(!isset($_SESSION))
{
session_start();
}
?>

<link rel="stylesheet" href="back.css">
<html>
	<head> <title> Enregistrement </title> </head>
	<body>
		<div class="connexion">
		<form name ="Connexion" method="post" action="verification.php">
		<input class="input-form" type="text" name="pseudo" id="pseudo" placeholder="Login" title="4 à 15 caractères, pas d'espace"/><br/>
		<input class="input-form" type="mail" name="mail" id="mail" placeholder="Email"/><br/>
		<input class="input-form" type="mail" name="confmail" id="confmail" placeholder="Confirmation Email"/><br/>		
		<input class="input-form" type="password" name="password" id="password" placeholder="Password" title="4 à 20 caractères, pas d'espace"/> <br/>
		<input class="input-form" type="password" name="confpass" id="confpass" placeholder="Confirmation Password"/><br/><br/>
		<button class="btn">Enregistrement<br/></button> <?php echo'<a class="reg" href="index.php" > Déjà inscrit ? </a>';  ?>
		</form>
		</div>
	</body>
</html>

