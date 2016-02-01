<!DOCTYPE html>
<?php if($_SESSION['connexion'] == 0) header('location:index.php');

include 'sessionstarter.php';
if(isset($_POST['lang']))
	$_SESSION['lang'] = $_POST['lang'];
if(isset($_SESSION['lang']) && $_SESSION['lang'] == "FR")
	include 'fr-lang.php';
else
	include 'en-lang.php';


?>


<html>
	<head>
		<meta charset="utf_8">
		<title><?php echo TXT_NEWTASK; ?></title>
		<link rel="stylesheet" href="back.css">
	</head>
	
	<body>
		<form class="langue" method="post" action="newtask.php">
		<input type="hidden" value="<?php echo TXT_LANG; ?>" name="lang">
		<button class="btn btnl" type="submit"><b><?php echo TXT_LANG; ?></b></button> </form>		
		<form class="deco" method="post" action="index.php">
		<input type="hidden" value="1" name="deco">
		<button class="btn btndeco" type="submit"><b><?php echo TXT_DECO; ?></b></button> </form>
		<div class = "connexion">
		<form class="block" name ="NewTask" method="post" action="verification_task.php">
		<input class="input-form" type="text" name="nom" id="nom" placeholder="<?php echo TXT_NOM; ?>" title="<?php TXT_NOMMEZ; ?>"/><br>
		<input class="input-form" type="text" name="deadline" id="deadline" placeholder="Deadline" title="jj/mm/aaaa"/><br>
		<textarea class="input-form input-area" type ="textarea" name="content" id="content" placeholder="<?php echo TXT_DESCRIBE; ?>"/></textarea><br>
		<button class="btn" type="submit"><b><?php echo TXT_ENREGISTREMENT; ?></b></button> </form>
		<form class="block" method="post" action="tasklist.php"><button class="btn cancel" type="submit"><b><?php echo TXT_CANCEL; ?></b></button></form>
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
						
					default:
						break;
				}
			}
		?>
		</div>
	</body>
</html>
