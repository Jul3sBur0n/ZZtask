<?php

include 'function_task.php';

	function deletetask($nom)
	{
		$ligne = searchtask($nom);
		file_put_contents('db_task.txt',str_replace($ligne,'0',file_get_contents('db_task.txt')));
	}

	function displaytask($var)
	{
		$arraytask = gettask();
		foreach($arraytask as $task)
		{
			if(substr_count($task,' ') == 2)
			{
				list($code,$nom,$deadline) = explode(' ',$task);
				if($var == $code)
					echo "<div class = \"task\"><p class=\"desctask-admin\">Tâche : $nom </br>Fin : $deadline</p>
					<form class=\"suptask\" method = \"post\" action = \"uptask.php\">
					<input type=\"hidden\" value=$nom name=\"nom\">
					<button class=\"btn btnup\" type=\"submit\"><b>x</b></button> </form>
					<form class=\"edittask\" method = \"post\" action = \"uptask.php\">
					<input type=\"hidden\" value=$nom name=\"nom\">
					<button class=\"btn btnup\" type=\"submit\"><b>Edit</b></button> </form>
					<form class=\"uptask\" method = \"post\" action = \"uptask.php\">
					<input type=\"hidden\" value=$nom name=\"nom\">
					<button class=\"btn btnup\" type=\"submit\"><b>></b></button> </form></div>";
			}
			elseif(substr_count($task,' ') > 2)
			{
				list($code,$nom,$deadline,$content) = explode(' ',$task,4);
				if($var == $code)
					echo "<div class=\"task\"><p class=\"desctask-admin\">Tâche : $nom </br>Fin : $deadline</p>
					<form class=\"suptask\" method = \"post\" action = \"uptask.php\">
					<input type=\"hidden\" value=$nom name=\"nom\">
					<button class=\"btn btnup\" type=\"submit\"><b>x</b></button> </form>
					<form class=\"edittask\" method = \"post\" action = \"uptask.php\">
					<input type=\"hidden\" value=$nom name=\"nom\">
					<button class=\"btn btnup\" type=\"submit\"><b>Edit</b></button> </form>
					<form class=\"uptask\" method = \"post\" action = \"uptask.php\">
					<input type=\"hidden\" value=$nom name=\"nom\">
					<button class=\"btn btnup\" type=\"submit\"><b>></b></button> </form>
					<p class=\"content\">Description : $content</p></div>";
			}
		}
	}

?>
