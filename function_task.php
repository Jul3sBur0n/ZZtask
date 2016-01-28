<?php

	function checkParam($a)
	{
		return (isset($a) && !empty($a));
	}
	
	function newtask($nom,$deadline,$content)
	{
		$fichier = fopen('db_task.txt','a+');
		if($fichier)
		{
			$ligne = searchtask($nom);
			if($ligne == 0)
			{
				fputs($fichier,"1 $nom $deadline");
				if(checkParam($content))
					fputs($fichier," $content");
				fputs($fichier,"\n");
			}
		}
		fclose($fichier);
	}
	
	function searchtask($nom)
	{
		$fichier = fopen('db_task.txt','r');
		if($fichier)
		{
			do
			{
				$ligne = fgets($fichier);
				if(!feof($fichier))
					$arraytask= explode(' ',$ligne,3);
			}while(!feof($fichier) && ($arraytask[1] != $nom));
			fclose($fichier);
		}
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
		if($fichier)
		{
			while(!feof($fichier))
			{
				$ligne[$iterator] = fgets($fichier);
				$iterator++;
			}
			fclose($fichier);
		}
		return $ligne;
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

	

?>
