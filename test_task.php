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
		
		$lignes = searchtask("Test3");
		$this->assertEquals("1;:!:;Test3;:!:;23/25/2016\n",$lignes);
		$lignes = searchtask("test2");
		$this->assertEquals("1;:!:;test2;:!:;23/25/2016\n",$lignes);
		$lignes = searchtask("Test");
		$this->assertEquals("1;:!:;Test;:!:;23-01-2016;:!:;This is a test\n",$lignes);
	}	

	public function testGettask()
	{
		$ligne = gettask();

		$this->assertEquals("1;:!:;Test;:!:;23-01-2016;:!:;This is a test\n",$ligne[0]);
		$this->assertEquals("1;:!:;test2;:!:;23/25/2016\n",$ligne[1]);
		$this->assertEquals("1;:!:;Test3;:!:;23/25/2016\n",$ligne[2]);
	}


	public function testUptask()
	{
		uptask("Test");
		$lignes = searchtask("Test");

		$this->assertEquals("2;:!:;Test;:!:;23-01-2016;:!:;This is a test\n",$lignes);

		uptask("Test3",2);
		$lignes = searchtask("Test3");

		$this->assertEquals("3;:!:;Test3;:!:;23/25/2016\n",$lignes);
	}

	public function testEdittask()
	{
		edittask(1,"Test3.1","24/26/2017","newcontent","Test3");

		$ligne = searchtask("Test3.1");

		$this->assertEquals("1;:!:;Test3.1;:!:;24/26/2017;:!:;newcontent\n",$ligne);
	}

	public function testDeletetask()
	{
		deletetask("test2");

		$ligne = searchtask("test2");

		$this->assertEquals(0,$ligne);
	}
}
?>
