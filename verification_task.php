<!DOCTYPE html>
<?php
if(!isset($_SESSION))
{
session_start();
}
?>

<html>
<head> <title> Newtask </title> </head>
<body>

<?php

function checkParam($a)
{	
	return (isset($a) && !empty($a));
}


if (!checkParam($_POST['nom']) || !checkParam($_POST['deadline'])) //Oublie d'un champ

{
	header('location: newtask.php');
    echo '<p>une erreur s\'est produite pendant votre creation de tache.

    Vous devez remplir tous les champs</p>

    <p>Cliquez <a href="./tasklist.php">ici</a> pour annuler</p>';

}
elseif(strpbrk($_POST['nom']," ") || strpbrk($_POST['deadline']," ") )
{
    header('location: newtask.php');
	echo '<p>Un espace est présent dans votre nom ou createur ou deadline</p>
	
	<p>Cliquez <a href="./registeration.php">ici</a> pour revenir</p>';
}
else
{
	echo 'pas d\'erreur</p>';
	$fichier = fopen('db_task.txt','a+');
	fputs($fichier,"\n");
	fputs($fichier,$_POST['nom']);
	fputs($fichier,' ');
	fputs($fichier,$_POST['deadline']);
    fputs($fichier,' ');
	fputs($fichier,$_POST['content']);
	fclose($fichier);
}
?>
</body>
</html>
