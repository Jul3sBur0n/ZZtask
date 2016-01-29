<?php
include 'sessionstarter.php';
include 'function_task.php';

if (!checkParam($_POST['nom']) || !checkParam($_POST['deadline'])) //Oublie d'un champ
{
	$_SESSION['error'] = 10;
	header('location: newtask.php');
}
elseif(strpbrk($_POST['nom'],";:!:;") || strpbrk($_POST['deadline'],";:!:; "))
{
	$_SESSION['error'] = 40;
	header('location: newtask.php');
}

elseif(!taskcheck($_POST['deadline']) || 51 == taskcheck($_POST['deadline']))
{
	$_SESSION['error'] = taskcheck($_POST['deadline']);
	header('location: newtask.php');	
}

else
{
	if(0 == newtask($_POST['nom'],$_POST['deadline'],$_POST['content']))
	{
		header('location: newtask.php');
	}
	else
	{
		$_SESSION['error'] = 30;
		header('location:tasklist.php');
	}
}

?>
