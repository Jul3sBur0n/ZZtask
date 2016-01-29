<!DOCTYPE html>
<?php if($_SESSION['connexion'] == 0) header('location:index.php');

include 'sessionstarter.php';

function checkParam($a)
{
	return (isset($a) && !empty($a));
}

?>


<html>
	<head>
		<meta charset="utf_8">
		<title>Ajouter une tache</title>
		<link rel="stylesheet" href="back.css">
	</head>
	
	<body>
		<form class="deco" method="post" action="index.php">
		<input type="hidden" value="1" name="deco">
		<button class="btn btndeco" type="submit"><b>Déconnexion</b></button> </form>
		<div class = "connexion">
		<form name ="NewTask" method="post" action="verification_task.php">
		<input class="input-form" type="text" name="nom" id="nom" placeholder="Nom" title="Nommez votre tache"/><br>
		<input class="input-form" type="text" name="deadline" id="deadline" placeholder="Deadline" title="jj/mm/aaaa"/><br>
		<textarea class="input-form input-area" type ="textarea" name="content" id="content" placeholder="Descriptif/Message"/></textarea><br>
		<button class="btn" type="submit">Enregistrer<br></button> <button class="btn" href="tasklist.php">Annuler<br></button>
		</form>
		</div>
	</body>
</html>
