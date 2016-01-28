<?php

include 'function_task.php';

	function displaytask($var)
	{
		$arraytask = gettask();
		foreach($arraytask as $task)
		{
			if(substr_count($task,' ') == 2)
			{
				list($code,$nom,$deadline) = explode(' ',$task);
				if($var == $code)
					echo "<div class = \"task\"><p class=\"desctask-user\">Tâche : $nom </br>Fin : $deadline</p>
					<form class=\"uptask\" method = \"post\" action = \"uptask.php\">
					<input type=\"hidden\" value=$nom name=\"nom\">
					<button class=\"btn btnup\" type=\"submit\"><b>></b></button> </form></div>";
			}
			elseif(substr_count($task,' ') > 2)
			{
				list($code,$nom,$deadline,$content) = explode(' ',$task,4);
				if($var == $code)
					echo "<div class=\"task\"><p class=\"desctask-user\">Tâche : $nom </br>Fin : $deadline</p>
					<form class=\"uptask-user\" method = \"post\" action = \"uptask.php\">
					<input type=\"hidden\" value=$nom name=\"nom\">
					<button class=\"btn btnup\" type=\"submit\"><b>></b></button> </form>
					<p class=\"content\">Description : $content</p></div>";
			}
		}
	}

?>
