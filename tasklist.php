<!DOCTYPE html>
<html>
	
	<head>
		<meta charset="UTF-8">
		<title> Liste des taches </title>
		<link rel="stylesheet" type="text/css" href="task.css">
	
	</head>
	
	<body>
		<div id="topbar">
			<h2>Menu</h2>
			<form>
				<input type="button" name="NewTask" value="Add Task" onclick="self.location.href='newtask.php'" style="background-color:#3cb371" style="color:white; font-weight:bold"onclick> 
			</form>
		</div>
		
		<div id="todo">
			<h2>To Do</h2>
		
		</div>
		
		<div id="inprogress">
			<h2>In Progress</h2>
		
		</div>
		
		<div id="done">
			<h2>Done</h2>
			
		</div>
	
	</body>

</html>
