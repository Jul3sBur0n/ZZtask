<!DOCTYPE html>
<?php
include 'sessionstarter.php';
include 'function_connexion.php'
?>

<html>
<head> <title> Bijour </title> </head>
<body>

<?php


if (!checkParam($_POST['pseudo']) || !checkParam($_POST['password']) || !checkParam($_POST['confpass'])) //Oublie d'un champ

{
	header('location: registeration.php');

}
elseif($_POST['confpass']!=$_POST['password'])
{
	echo '<p>une erreur s\'est produite pendant votre identification.

    Les champs Email et Password doivent être confirmés</p>

	<p>Cliquez <a href="./registeration.php">ici</a> pour revenir</p>';
}
elseif(strpbrk($_POST['pseudo']," ") || strpbrk($_POST['password']," "))
{
	echo '<p>Un espace est présent dans votre login ou password</p>
	
	<p>Cliquez <a href="./registeration.php">ici</a> pour revenir</p>';
}
else
{
	if(registerationcheck($_POST['pseudo']))
	{
		newuser($_POST['pseudo'],$_POST['password']);
		$_SESSION['login'] = $_POST['pseudo'];
		header('location: index.php');
	}
	else
	{
		$_SESSION['error'] = 30;
		header('location: registeration.php');
	}
}
?>
</body>
</html>
