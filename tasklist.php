<!DOCTYPE html>
<html>
	
	<head>
		<meta charset="UTF-8">
		<title> Liste des taches </title>
		<link rel="stylesheet" type="text/css" href="default.css">
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
	
	</head>
	
	<body class ="fullpage logged-out">
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-8 topbar"><h2>Menu</h2></div>
				<div class="col-xs-6 col-md-4"><a class="btn btn-default" onclick="self.location.href='newtask.php'" role="button">Link</a></div>
			</div>
		</div>
		
			
		<div id="topbar"></div>
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-6 col-md-4 todo">
						
							<h2>To Do</h2>
						
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
