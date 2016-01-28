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
					if($code != 3)
						echo "<div class = \"task\"><p class=\"desctask-user\">Tâche : $nom </br>Fin : $deadline</p>
						<form class=\"uptask\" method = \"post\" action = \"gestion_task.php\">
						<input type=\"hidden\" value=$task name=\"up\">
						<button class=\"btn btnup\" type=\"submit\"><b>></b></button> </form></div>";
					else
						echo "<div class = \"task\"><p class=\"desctask-user\">Tâche : $nom </br>Fin : $deadline</p></div>";
					
			}
			elseif(substr_count($task,' ') > 2)
			{
				list($code,$nom,$deadline,$content) = explode(' ',$task,4);
				$content = unescapetohtml($content);
				if($var == $code)
					if($code != 3)
						echo "<div class=\"task\"><p class=\"desctask-user\">Tâche : $nom </br>Fin : $deadline</p>
						<form class=\"uptask-user\" method = \"post\" action = \"gestion_task.php\">
						<input type=\"hidden\" value=$task name=\"up\">
						<button class=\"btn btnup\" type=\"submit\"><b>></b></button> </form>
						<p class=\"content\">Description : $content</p></div>";
					else
						echo "<div class=\"task\"><p class=\"desctask-user\">Tâche : $nom </br>Fin : $deadline</p>
						<p class=\"content\">Description : $content</p></div>";
			}
		}
	}

?>
