<?php

	function checkParam($a)
	{
		return (isset($a) && !empty($a));
	}
	
	function newtask($nom,$deadline,$content)
	{
		$fichier = fopen('db_task.txt','a+');
		fputs($fichier,'1');
		fputs($fichier,' ');
		fputs($fichier,$nom);
		fputs($fichier,' ');
		fputs($fichier,$deadline);
		if(checkParam($content))
		{
			fputs($fichier,' ');
			fputs($fichier,$content);
		}
		fputs($fichier,"\n");
		fclose($fichier);
	}
	
	function searchtask($nom)
	{
		$fichier = fopen('db_task.txt','r');
		do
		{
			$ligne = fgets($fichier);
			if(!feof($fichier))
				$arraytask= explode(' ',$ligne,3);
		}while(!feof($fichier) && ($arraytask[1] != $nom));
		fclose($fichier);
		if($arraytask[1] == $nom)
		{
			$ligne = implode(' ',$arraytask);
		}
		else
			$ligne=0;
		return $ligne;
	}
	
	function gettask()
	{
		$iterator = 0;
		$fichier = fopen('db_task.txt','r');
		while(!feof($fichier))
		{
			$ligne[$iterator] = fgets($fichier);
			$iterator++;
		}
		return $ligne;
	}
	
	function deletetask($nom)
	{
		$ligne = searchtask($nom);
		file_put_contents('db_task.txt',str_replace($ligne,'0',file_get_contents('db_task.txt')));
	}
	
	function uptask($nom)
	{
		$ligne = searchtask($nom);
		if($ligne != 0)
		{
			list($code,$task)=explode(' ',$ligne,2);
			$alltask = file_get_contents('db_task.txt');
			$code=$code + 1;
			$alltask = str_replace("$ligne","$code $task",$alltask);
			file_put_contents('db_task.txt',$alltask);
		}
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
					echo "<div class = \"task\"><p class=\"desctask\">Tâche : $nom </br>Fin : $deadline</p>
					<form class=\"uptask\" method = \"post\" action = \"uptask.php\">
					<input type=\"hidden\" value=$nom name=\"nom\">
					<button class=\"btn btnup\" type=\"submit\"><b>></b></button> </form></div>";
			}
			elseif(substr_count($task,' ') > 2)
			{
				list($code,$nom,$deadline,$content) = explode(' ',$task,4);
				if($var == $code)
					echo "<div class=\"task\"><p class=\"desctask\">Tâche : $nom </br>Fin : $deadline</p>
					<form class=\"uptask\" method = \"post\" action = \"uptask.php\">
					<input type=\"hidden\" value=$nom name=\"nom\">
					<button class=\"btn btnup\" type=\"submit\"><b>></b></button> </form>
					<p class=\"content\">Description : $content</p></div>"
					;
			}
		}
	}
	

?>
