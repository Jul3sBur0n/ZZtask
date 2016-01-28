<!DOCTYPE html>
<?php if($_SESSION['connexion'] == 0) header('location:index.php');

include 'sessionstarter.php';

function checkParam($a)
{
	return (isset($a) && !empty($a));
}

?>


<html>
	<header>
		<meta charset="utf_8">
		<title>Ajouter une tache</title>
		<link rel="stylesheet" href="back.css">
	</header>
	
	<body>
		<div class = "connexion">
		<form name ="NewTask" method="post" action="verification_task.php">
		<input class="input-form" type="text" name="nom" id="nom" placeholder="Nom" title="Nommez votre tache" required /><br/>
		<input class="input-form" type="text" name="deadline" id="deadline" placeholder="Deadline" title="jj/mm/aaaa" required /><br/>
		<textarea class="input-form input-area" type ="textarea" name="content" id="content" placeholder="Descriptif/Message"/></textarea><br/>
		<button class="btn" type="submit">Enregistrer<br/></button> <button class="btn" href="tasklist.php">Annuler<br/></button>
		</form>
		</div>
	</body>
</html>
