<?php

include 'function_task.php';


	function displaytask($var)
	{
		$arraytask = gettask();
		foreach($arraytask as $task)
		{
			if(substr_count($task,';:!:;') == 2)
			{
				list($code,$nom,$deadline) = explode(';:!:;',$task);
				if($var == $code)
				{
					echo "<div class = \"task\"><p class=\"desctask-admin\">Tâche : $nom </br>Fin : $deadline</p>
					<form class=\"suptask\" method=\"post\" action=\"gestion_task.php\">
					<input type=\"hidden\" value=\"$nom\" name=\"del\">
					<button class=\"btn btnup\" type=\"submit\"><b>x</b></button> </form>
					<form class=\"edittask\" method = \"post\" action = \"gestion_task.php\">
					<input type=\"hidden\" value=\"$nom\" name=\"edit\">
					<button class=\"btn btnup\" type=\"submit\"><b>Edit</b></button> </form>\n";
					if($code != 3)
						echo "<form class=\"uptask\" method = \"post\" action = \"gestion_task.php\">
						<input type=\"hidden\" value=\"$nom\" name=\"nom\">
						<button class=\"btn btnup\" type=\"submit\"><b>></b></button></form>";
					echo "</div>";
				}
			}
			elseif(substr_count($task,';:!:;') > 2)
			{
				list($code,$nom,$deadline,$content) = explode(';:!:;',$task,4);
				$content = unescapetohtml($content);
				if($var == $code)
					if($code != 3)
						echo "<div class=\"task\"><p class=\"desctask-admin\">Tâche : $nom </br>Fin : $deadline</p>
						<form class=\"suptask\" method = \"post\" action = \"gestion_task.php\">
						<input type=\"hidden\" value=\"$nom\" name=\"del\">
						<button class=\"btn btnup\" type=\"submit\"><b>x</b></button> </form>
						<form class=\"edittask\" method = \"post\" action = \"gestion_task.php\">
						<input type=\"hidden\" value=\"$nom\" name=\"edit\">
						<button class=\"btn btnup\" type=\"submit\"><b>Edit</b></button> </form>
						<form class=\"uptask\" method = \"post\" action = \"gestion_task.php\">
						<input type=\"hidden\" value=\"$nom\" name=\"nom\">
						<button class=\"btn btnup\" type=\"submit\"><b>></b></button> </form>
						<p class=\"content\">Description : $content</p></div>";
					else
						echo "<div class = \"task\"><p class=\"desctask-admin\">Tâche : $nom </br>Fin : $deadline</p>
						<form class=\"suptask\" method = \"post\" action = \"gestion_task.php\">
						<input type=\"hidden\" value=\"$nom\" name=\"del\">
						<button class=\"btn btnup\" type=\"submit\"><b>x</b></button> </form>
						<form class=\"edittask\" method = \"post\" action = \"gestion_task.php\">
						<input type=\"hidden\" value=\"$nom\" name=\"edit\">
						<button class=\"btn btnup\" type=\"submit\"><b>Edit</b></button> </form>
						<p class=\"content\">Description : $content</p></div>";
			}
		}
	}
	
?>
