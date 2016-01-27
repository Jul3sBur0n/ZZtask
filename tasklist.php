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
		
		<div>
			<div class="row">
				<div class="topbar"><h2>Menu</h2></div>
				<div><a onclick="self.location.href='newtask.php'" role="button">New Task</a></div>
			</div>
		</div>
		
			<div>
				<div class="todo">
						
							<h2>To Do</h2>
							
							<?php
							displaytask(1);
							?>

					
					
						
				</div>
						<div class="inprogress">
							<h2>In Progress</h2>
						</div>
						<div class="done">
							<h2>Done</h2>
						</div>
		</div> 
	
	</body>

</html>
