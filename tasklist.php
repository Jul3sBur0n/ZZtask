<!DOCTYPE html>
<?php if($_SESSION['connexion'] == 0) header('location:index.php');
include 'function_task.php';
?>
<html>
	
	<head>
		<meta charset="utf_8">
		<title> Liste des taches </title>
		<link rel="stylesheet"  href="task.css">
	
	</head>
	
	<body>
		<div class="topbar"><h2>Menu</h2></div>
		<div><a onclick="self.location.href='newtask.php'" role="button">New Task</a></div>
		
		<div>
			<div class="todo">
				<span class="center"><FONT size = 5 >To do</FONT></span>
				<?php
				displaytask(1);
				?>
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
