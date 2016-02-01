<!DOCTYPE html>
<?php

include 'sessionstarter.php';
if($_SESSION['connexion'] == 0) header('location:index.php');


if(isset($_POST['lang']))
	$_SESSION['lang'] = $_POST['lang'];
if(isset($_SESSION['lang']) && $_SESSION['lang'] == "FR")
	include 'fr-lang.php';
else
	include 'en-lang.php';
	

if($_SESSION['admin'])
	include 'function_task_admin.php';
else
	include 'function_task_user.php';
?>
<html>
	<head>
		<meta charset="utf-8">
		<title> <?php echo TXT_LISTETACHE;?> </title>
		<link rel="stylesheet"  href="task.css">
	</head>
	
	<body>
		<form class="langue" method="post" action="tasklist.php">
		<input type="hidden" value="<?php echo TXT_LANG; ?>" name="lang">
		<button class="btn btnl" type="submit"><b><?php echo TXT_LANG; ?></b></button> </form>
		<form class="deco" method="post" action="index.php">
		<input type="hidden" value="1" name="deco">
		<button class="btn btndeco" type="submit"><b><?php echo TXT_DECO; ?></b></button> </form>
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
