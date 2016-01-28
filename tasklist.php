<!DOCTYPE html>
<?php
include 'function_task_admin.php';
include_once 'sessionstarter.php';
if($_SESSION['connexion'] == 0) header('location:index.php');
?>
<html>
	<head>
		<meta charset="utf-8">
		<title> Liste des taches </title>
		<link rel="stylesheet"  href="task.css">
	</head>
	
	<body>
		
		<div>
			<div class="todo">
				<span class="center"><FONT size = 5 >To do</FONT></span>
				<?php
				displaytask(1);
				?>
				<a class="btn btn-add" href="newtask.php"><b>+</b></a>
			</div>
			<div class="inprogress">
				<span class="center"><FONT size = 5 >In Progress</FONT></span>
				<?php
				displaytask(2);
				?>				
			</div>
			<div class="done">
				<span class="center"><FONT size = 5 >Done</FONT></span>
				<?php
				displaytask(3);
				?>
			</div>
		</div> 
	
	</body>

</html>
