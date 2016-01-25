<!DOCTYPE html>
<?php if($_SESSION['connexion'] == 0) header('location:index.php'); ?>
<html>
	
	<head>
		<meta charset="utf_8">
		<title> Liste des taches </title>
		<link rel="stylesheet"  href="task.css">
	
	</head>
	
	<body class ="fullpage logged-out">
		
		<div class="container-fluid">
			<div class="row">
				<div class="topbar"><h2>Menu</h2></div>
				<div ><a class="btn btn-default" onclick="self.location.href='newtask.php'" role="button">Link</a></div>
			</div>
		</div>
		
			
		<div id="topbar"></div>
		
		<div>
			<div class="row">
				<div class="todo">
						
							<h2>To Do</h2>
						
				</div>
				<div >
						<div class="inprogress">
							<h2>In Progress</h2>
						</div>
				</div>
				<div>
						<div class="done">
							<h2>Done</h2>
						</div>
				</div>
			</div>
		</div>
	
	</body>

</html>
