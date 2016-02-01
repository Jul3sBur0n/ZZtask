<?php

include 'function_task_admin.php';
include 'sessionstarter.php';
if(isset($_POST['lang']) && !empty($_SESSION['lang']))
	$_SESSION['lang'] = $_POST['lang'];
if(isset($_SESSION['lang']) && $_SESSION['lang'] == "FR")
	include 'fr-lang.php';
else
	include 'en-lang.php';

if(isset($_POST['nom']))
{
	uptask($_POST['nom']);
	header('Location:tasklist.php');
}

elseif(isset($_POST['del']))
{
	deletetask($_POST['del']);
	header('Location:tasklist.php');
}

elseif(isset($_POST['edit']))
{
	$ligne = searchtask($_POST['edit']);
	if(substr_count($ligne,';:!:;') == 2)
		list($code,$nom,$deadline) = explode(';:!:;',$ligne);
	elseif(substr_count($ligne,';:!:;') > 2)
	{
		list($code,$nom,$deadline,$content) = explode(';:!:;',$ligne,4);
		$content = unescapedesc($content);
	}
	echo "<html>
	<header>
		<meta charset=\"utf_8\">
		<title>Ajouter une tache</title>
		<link rel=\"stylesheet\" href=\"back.css\">
	</header>
	
	<body>
		<form class=\"langue\" method=\"post\" action=\"gestion_task.php\">
		<input type=\"hidden\" value=\""; echo TXT_LANG; echo "\" name=\"lang\">
		<input type=\"hidden\" value=\"$nom\" name=\"edit\">
		<button class=\"btn btnl\" type=\"submit\"><b>"; echo TXT_LANG; echo "</b></button> </form>
		<form class=\"deco\" method=\"post\" action=\"index.php\">
		<input type=\"hidden\" value=\"1\" name=\"deco\">
		<button class=\"btn btndeco\" type=\"submit\"><b>"; echo TXT_DECO; echo "</b></button> </form>
		<div class = \"connexion\">
		<form name =\"NewTask\" method=\"post\" action=\"gestion_task.php\">
		<select class = \"input-form\" name=\"code\" id=\"code\">
			<option value=\"1\""; if($code ==1) {echo "selected";} echo ">To do</option>
			<option value=\"2\""; if($code ==2) {echo "selected";} echo ">In progress</option>
			<option value=\"3\""; if($code ==3) {echo "selected";} echo ">Done</option>
		<input type=\"hidden\" value=$nom name=\"oldname\">
<<<<<<< HEAD
		<input class=\"input-form\" type=\"text\" name=\"name\" id=\"nom\" value = \"$nom\" title=\""; echo TXT_DECO; echo "\" /><br>
=======
		<input class=\"input-form\" type=\"text\" name=\"name\" id=\"nom\" value = \"$nom\" title=\""; echo TXT_NOMMEZ; "\" /><br>
>>>>>>> 0dece384cb4f620b38ee40217babed181a1420ca
		<input class=\"input-form\" type=\"text\" name=\"deadline\" id=\"deadline\" value=\"$deadline\" title=\"jj/mm/aaaa\"/><br>
		<textarea class=\"input-form input-area\" type =\"textarea\" name=\"content\" id=\"content\" placeholder=\""; echo TXT_DESCRIBE; "\"/>$content</textarea><br/>
		<button class=\"btn\" type=\"submit\">Enregistrer<br></button> <button class=\"btn\" href=\"tasklist.php\">Annuler<br></button>
		</form>
		</div>
	</body>
</html>";
}

elseif(isset($_POST['oldname'],$_POST['code'],$_POST['name'],$_POST['deadline']))
{
	if(0 == searchtask($_POST['name']))
		edittask($_POST['code'],$_POST['name'],$_POST['deadline'],$_POST['content'],$_POST['oldname']);
	header('Location:tasklist.php');
}

else
	header('Location:tasklist.php');

?>
