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
	
	<body class ="fullpage logged-out">
		
		<div class="container-fluid">
			<div class="row">
				<div class="topbar"><h2>Menu</h2></div>
				<div><a class="btn btn-default" onclick="self.location.href='newtask.php'" role="button">New Task</a></div>
			</div>
		</div>
		
			
		<div id="topbar"></div>
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-6 col-md-4 todo">
						
							<h2>To Do</h2>
							
							<?php
	/*$fichier = fopen('db_task.txt','r');
	$ligne = fgets($fichier);
	while(!feof($fichier))
	{
		list($nom, $deadline) = explode(" ",$ligne,2);
		echo $nom;
		$ligne = fgets($fichier);
	}
	fclose($fichier);*/
	showtask();
?>

					
					
						
				</div>
				<div class="col-xs-6 col-md-4">
						<div class="inprogress">
							<h2>In Progress</h2>
						</div>
				</div>
				<div class="col-xs-6 col-md-4">
						<div class="done">
							<h2>Done</h2>
						</div>
				</div>
			</div>
		</div>
	
	</body>

</html>
