<?php

require_once("function_task.php");

class TestTasks extends PHPUnit_Framework_TestCase{
	
	public function testAddTask(){
		newtask("Test","23-01-2016","This is a test");
		newtask("test2","23/25/2016","");
		
		$fileCont = file_get_contents( "db_task.txt" );
		$lines = explode( "\n", $fileCont );
		$line = $lines[count($lines)-3];
		$this->assertEquals("1;:!:;Test;:!:;23-01-2016;:!:;This is a test",$line);
		$line = $lines[count($lines)-2];
		$this->assertEquals("1;:!:;test2;:!:;23/25/2016",$line);
	
		
	}
	
	public function testSearchTask()
	{
		newtask("Test3","23/25/2016","");
		$nom = "Test3"
		$fichier = fopen('db_task.txt','r');
		if($fichier)
		{
			echo $nom."<br>";
			do
			{
				$ligne = fgets($fichier);
				if(!feof($fichier))
					$arraytask= explode(";:!:;",$ligne,3);
				echo $arraytask[1]."<br>";
			}while(!feof($fichier) && ($arraytask[1] != $nom));
			fclose($fichier);
		}
		if(isset($arraytask)&&$arraytask[1] == $nom)
		{
			$ligne = implode(";:!:;",$arraytask);
		}
		else
			$ligne=0;
		$this->assertEquals("1;:!:;Test3;:!:;23/25/2016",$lignes);
	}	
		
}
?>
