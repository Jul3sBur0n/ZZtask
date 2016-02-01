<!DOCTYPE html>
<?php if($_SESSION['connexion'] == 0) header('location:index.php');

include 'sessionstarter.php';
if(isset($_POST['lang']))
	$_SESSION['lang'] = $_POST['lang'];
if($_SESSION['lang'] == "fr")
	include 'fr-lang.php';
else
	include 'en-lang.php';


?>


<html>
	<head>
		<meta charset="utf_8">
		<title>Ajouter une tache</title>
		<link rel="stylesheet" href="back.css">
	</head>
	
	<body>
		<form class="langue" method="post" action="newtask.php">
		<input type="hidden" value="fr" name="lang">
		<button class="btn btnl" type="submit"><b>Fr</b></button> </form>		
		<form class="deco" method="post" action="index.php">
		<input type="hidden" value="1" name="deco">
		<button class="btn btndeco" type="submit"><b>Déconnexion</b></button> </form>
		<div class = "connexion">
		<form class="block" name ="NewTask" method="post" action="verification_task.php">
		<input class="input-form" type="text" name="nom" id="nom" placeholder="Nom" title="Nommez votre tache"/><br>
		<input class="input-form" type="text" name="deadline" id="deadline" placeholder="Deadline" title="jj/mm/aaaa"/><br>
		<textarea class="input-form input-area" type ="textarea" name="content" id="content" placeholder="Descriptif/Message"/></textarea><br>
		<button class="btn" type="submit"><b>Enregistrer</b></button> </form>
		<form class="block" method="post" action="tasklist.php"><button class="btn cancel" type="submit"><b>Annuler</b></button></form>
		<?php
			if(isset($_SESSION['error']))
			{
				switch($_SESSION['error'])
				{
					case 10:
						echo '<span class = "erreur">Erreur champ vide.</span>';
						$_SESSION['error']=0;
						break;
					case 20:
						echo '<span class = "erreur">Erreur d\'identification.</span>';
						$_SESSION['error'] = 0;
						break;
					case 30:
						echo '<span class = "erreur">Nom d\'utilisateur déjà utilisé</span>';
						$_SESSION['error'] = 0;
						break;
					case 40:
						echo '<span class = "erreur">Caractère non admis (! ; :)</span>';
						$_SESSION['error'] = 0;
						break;
					case 50:
						echo '<span class = "erreur">Nombre de caractère insuffisant (min 4)</span>';
						$_SESSION['error'] = 0;
						break;
					case 51:
						echo '<span class = "erreur">Nombre de caractère insuffisant (min 5)</span>';
						$_SESSION['error'] = 0;
						break;
						
					default:
						break;
				}
			}
		?>
		</div>
	</body>
</html>
