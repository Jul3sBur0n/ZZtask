<?php

include 'function_task.php';
/*if(checkParam($_POST['nom'])*/
	uptask($_POST['nom']);
header('Location:tasklist.php');

?>
