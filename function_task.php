<?php

	function checkParam($a)
	{
		return (isset($a) && !empty($a));
	}
	
	function newtask($nom,$deadline,$content)
	{
		$ligne = searchtask($nom);
		if($ligne == 0)
		{
			$fichier = fopen('db_task.txt','a+');
			if($fichier)
			{
				fputs($fichier,"1;:!:;$nom;:!:;$deadline");
				if(checkParam($content))
					fputs($fichier,";:!:;".escapedesc($content));
				fputs($fichier,"\n");
				fclose($fichier);
			}
		}
		return $ligne;
	}
	
	function searchtask($nom)
	{
		$fichier = fopen('db_task.txt','r');
		if($fichier || !feof($fichier))
		{
			do
			{
				$ligne = fgets($fichier);
				if(!feof($fichier))
					$arraytask= explode(";:!:;",$ligne,3);
			}while(!feof($fichier) && ($arraytask[1] != $nom));
			fclose($fichier);
		}
		if(isset($arraytask)&&$arraytask[1] == $nom)
		{
			$ligne = implode(";:!:;",$arraytask);
			//$ligne = substr($ligne,0,-1);
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
	
	
	function uptask($nom,$up = 1)
	{
		$ligne = searchtask($nom);
		if($ligne != 0 && $up != 0)
		{
			$arraytask = gettask();
			$fichier = fopen('db_task.txt',w);
			if($fichier)
			{
				foreach($arraytask as $task)
				{
					if($ligne != $task)
						fputs($fichier,$task);
					else
					{
						list($code,$task2)=explode(';:!:;',$task,2);
						$code = $code + $up;
						fputs($fichier,$code.";:!:;".$task2);
					
					}
				}
			fclose($fichier);
			}
		}
	}	

	function deletetask($nom)
	{
		$ligne = searchtask($nom);
		$arraytask = gettask();
		$fichier = fopen('db_task.txt',w);
		if($fichier)
		{
			foreach($arraytask as $task)
			{
				if($ligne != $task)
					fputs($fichier,$task);
			}
			fclose($fichier);
		}
	}
	
	function edittask($code,$nom,$deadline,$content,$oldname)
	{
		deletetask($oldname);
		newtask($nom,$deadline,$content);
		uptask($nom,$code-1);
	}
	
	function escapedesc($desc)
	{
		$desc = str_replace( '\\', '\\\\', $desc );
		$desc = str_replace( "\r\n", '\\n', $desc );
		$desc = str_replace( "\n", '\\n', $desc );
		$desc = str_replace( "\r", '\\n', $desc );
		while ( preg_match( '#\\\\n$#', $desc ) )
			$desc = preg_replace( '#\\\\n$#', '', $desc );
		return $desc;
	}
	
	function _unescape_replacer( $matches )
	{
		return ( $matches[1] === 'n' ) ? "\n" : '\\';
	}
	
	function unescapedesc($desc)
	{
		$desc = preg_replace_callback( '#\\\\(.)#', '_unescape_replacer', $desc );
		return $desc;
	}
	
	function unescapetohtml($desc)
	{
		$desc = unescapedesc($desc);
		$desc = str_replace("\n","<br>",$desc);
		return $desc;
	}
	
?>
