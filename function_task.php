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
	
	function uptask()
	{
		
	}
?>
