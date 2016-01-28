<?php
include 'sessionstarter.php';
include 'function_task.php';
	
newtask($_POST['nom'],$_POST['deadline'],$_POST['content']);
	

header('location:tasklist.php');
?>
