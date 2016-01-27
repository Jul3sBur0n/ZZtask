<?php
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
				list($code, $name, $deadline, $content) = explode(" ",$ligne,4);
		}while(!feof($fichier) && ($name != $nom));
		fclose($fichier);
		$array = array($code,$name,$deadline,$content);
		$ligne = implode(' ',$array);
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
	
	function displaytask($var)
	{
		$arraytask = gettask();
		foreach($arraytask as $task)
		{
			if(substr_count($task,' ') == 2)
			{
				list($code,$nom,$deadline) = explode(' ',$task);
				if($var == $code)
					echo "<p>Tâche : $nom </br>Fin : $deadline</p>";
			}
			elseif(substr_count($task,' ') > 2)
			{
				list($code,$nom,$deadline,$content) = explode(' ',$task,4);
				echo "<p>Tâche : $nom </br>Fin : $deadline</br>Description : $content</p>";
			}
		}
	}
	
	function uptask()
	{
		$task = file_get_contents('db_task.txt');
		echo "$task </br>";
		$task = str_replace('0','',$task);
		echo "$task </br>";
		file_put_contents('db_task.txt',$task);
	}
?>
