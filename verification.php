<!DOCTYPE html>

<html>
<head> <title> Bijour </title> </head>
<body>

<?php

function checkParam($a)
{	
	return (isset($a) && !empty($a));
}


if (!checkParam($_POST['pseudo']) || !checkParam($_POST['password']) || !checkParam($_POST['confmail']) || !checkParam($_POST['mail']) || !checkParam($_POST['confpass'])) //Oublie d'un champ

{

    echo '<p>une erreur s\'est produite pendant votre identification.

    Vous devez remplir tous les champs</p>

    <p>Cliquez <a href="./registeration.php">ici</a> pour revenir</p>';

}
elseif($_POST['confpass']!=$_POST['password'] || $_POST['mail']!=$_POST['confmail'])
{
	echo '<p>une erreur s\'est produite pendant votre identification.

    Les champs Email et Password doivent être confirmés</p>

	<p>Cliquez <a href="./registeration.php">ici</a> pour revenir</p>';
}
else
{
	echo 'pas d\'erreur</p>';
	$fichier = fopen('db_user.txt','a+');
	fputs($fichier,"\n");
	fputs($fichier,$_POST['pseudo']);
	fputs($fichier,' ');
	fputs($fichier,$_POST['password']);
	fputs($fichier,' ');
	fputs($fichier,$_POST['mail']);	
	fclose($fichier);
}
?>
</body>
</html>
