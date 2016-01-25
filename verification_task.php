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
	$fichiertask = fopen('db_task.txt','a+');
	fputs($fichiertask,"\n");
	fputs($fichiertask,$_POST['nom']);
	fputs($fichiertask,' ');
	fputs($fichiertask,$_POST['deadline']);
	
	if($_POST['content'] != '\0')
	{
		fputs($fichiertask,' ');
		fputs($fichiertask,$_POST['content']);
	}
	fclose($fichiertask);

header('location:tasklist.php');
?>

</body>
</html>
