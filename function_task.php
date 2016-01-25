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
		$array = array($code,$bame,$deadline,$content);
		$ligne = implode(' ',$array);
		return $ligne;
	}
	
	function deletetask($nom)
	{
		$ligne = searchtask($nom);
		file_put_contents('db_task.txt',array_unique(str_replace($ligne,'0',file_get_contents('db_task.txt'))));
	}
	
	function uptask()
	{
		
	}
?>
