<?php
include 'sessionstarter.php';
include 'function_task.php';

function checkParam($a)
{
	return (isset($a) && !empty($a));
}

?>
<html>
<head> <title> Newtask </title> </head>
<body>

<?php
	
	/*$fichier = fopen('db_task.txt','a+');
	fputs($fichier,$_POST['nom']);
	fputs($fichier,' ');
	fputs($fichier,$_POST['deadline']);
	if(checkParam($_POST['content']))
	{
		fputs($fichier,' ');
		fputs($fichier,$_POST['content']);
	}
	fputs($fichier,"\n");
	fclose($fichier);*/
	
newtask($_POST['nom'],$_POST['deadline'],$_POST['content']);
	

header('location:tasklist.php');
?>

</body>
</html>
