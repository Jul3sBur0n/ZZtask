<!DOCTYPE html>
<?php if($_SESSION['connexion'] == 0) header('location:index.php'); ?>

<?php
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
		<input class="input-form" type="text" name="Nom" id="nom" placeholder="Nom" title="Nommez votre tache" required /><br/>
		<input class="input-form" type="date" name="Deadline" id="deadline" placeholder="Deadline" title="jj/mm/aaaa" required /><br/>
		<input class="input-form" type ="textarea" name="Content" id="content" placeholder="Descriptif/Message"/><br/>
		<button class="btn">Enregistrement<br/></button> <?php echo '<p>Cliquez <a href="./tasklist.php">ici</a> pour annuler</p>'; ?>
		</form>
		</div>
	
	</body>




</html>
