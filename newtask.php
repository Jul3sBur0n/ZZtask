<!DOCTYPE html>


<html>
	<header>
		
		<title>Ajouter une tache</title>
		<link rel="stylesheet" href="back.css">
	</header>
	
	<body>
		<form name ="NewTask" method="post" action="verification_task.php">
		<input class="input-form" type="text" name="Nom" id="nom" placeholder="Nom" title="Nommez votre tache"/><br/>
		<input class="input-form" type="text" name="Creator" id="creator" placeholder="Creator"/><br/>
		<input class="input-form" type="text" name="Deadline" id="deadline" placeholder="Deadline"/><br/>
		<textarea name="Content" id="Content" placeholder="Descriptif/Message"/><br/>
		<button class="btn">Enregistrement<br/></button> <?php echo'<a class="reg" href="index.php" > Déjà inscrit ? </a>';  ?>
		</form>
	
	</body>




</html>
