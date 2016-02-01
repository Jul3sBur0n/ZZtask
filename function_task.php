<?php


	/*Check if string is set and not empty 	*/
	/*Input : string 						*/
	/*Output : bool 						*/
	function checkParam($a)
	{
		return (isset($a) && !empty($a));
	}
	
	/* Write new task in database if task doesn't exist */
	/* Input: 3 String 									*/
	/* Outut: Bool 										*/
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
	
	/* find all information about task 	*/
	/* Input: String 					*/
	/* Output: String 					*/
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
	
	/* Put all task in arraylist 	*/
	/* Output arraylist 			*/
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
	
	/* Move a task at the next column or more 	*/
	/* Input: String, Int 						*/
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

	/* delete a task from database 	*/
	/* Input: string 				*/
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
	
	/* Change information about task 	*/
	/* Input: int, 4 String 			*/
	function edittask($code,$nom,$deadline,$content,$oldname)
	{
		if(strcmp($nom,$oldname) != 0)
		{
			$ligne = searchtask($nom);
			if($ligne != 0)
				$nom = $oldname;
		}
		deletetask($oldname);
		newtask($nom,$deadline,$content);
		uptask($nom,$code-1);
	}
	
	/* Manage newlines in content 	*/
	/* Input: String 				*/
	/* Output: String 				*/
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
	
	/* Manage "//" before "n" 	*/
	/* Input: String 			*/
	/* Output: String 			*/
	function _unescape_replacer( $matches )
	{
		return ( $matches[1] === 'n' ) ? "\n" : '\\';
	}
	
	/* Manage "//" before "n" 	*/
	/* Input: String 			*/
	/* Output: String 			*/
	function unescapedesc($desc)
	{
		$desc = preg_replace_callback( '#\\\\(.)#', '_unescape_replacer', $desc );
		return $desc;
	}
	
	/* Manage newline when content is reading 	*/
	/* Input: String 			*/
	/* Output: String 			*/
	function unescapetohtml($desc)
	{
		$desc = unescapedesc($desc);
		$desc = str_replace("\n","<br>",$desc);
		return $desc;
	}
	
?>
