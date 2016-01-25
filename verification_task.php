<?php
include 'sessionstarter.php';

function checkParam($a)
{
	return (isset($a) && !empty($a));
}

?>
<html>
<head> <title> Newtask </title> </head>
<body>

<?php
<<<<<<< HEAD
	
	
	


	
	$fichier = fopen('db_task.txt','a+');
	fputs($fichier,$_POST['nom']);
	fputs($fichier,' ');
	fputs($fichier,$_POST['deadline']);
	if(checkParam($_POST['content']))
	{
		fputs($fichier,' ');
		fputs($fichier,$_POST['content']);
	}
	fputs($fichier,"\n");
	fclose($fichier);
=======
	$fichiertask = fopen('db_task.txt','a+');
	fputs($fichiertask,"\n");
	fputs($fichiertask,$_POST['nom']);
	fputs($fichiertask,' ');
	fputs($fichiertask,$_POST['deadline']);
    fputs($fichiertask,' ');
	fputs($fichiertask,$_POST['content']);
	fclose($fichiertask);
>>>>>>> 84930cff7ab55dcb2b962a1a211d099b40b7e93f

header('location:tasklist.php');
?>

</body>
</html>
