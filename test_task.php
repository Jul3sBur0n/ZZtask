<?php

require_once("function_connexion.php");

class TestTasks extends PHPUnit_Framework_TestCase{
	
	public function testAddTask(){
		newtask("Test","23-01-2016","This is a test");
		newtask("tache et plus","23/25/2016","");
		
		$fileCont = file_get_contents( "db_task.txt" );
		$lines = explode( "\n", $fileCont );
		$line = $lines[count($lines)-3];
		$this->assertEquals("1;:!:;Test;:!:;23-01-2016;:!:;This is a test",$line);
		$line = $lines[count($lines)-2];
		$this->assertEquals("1;:!:;tache et plus;:!:;23/25/2016",$line);
	
		
	}
	
	public function testSearchTask()
	{
		newtask("Test3","23/25/2016","");
		
		$lignes = searchtask("Test3");
		$this->assertEquals("1;:!:;Test3;:!:;23/25/2016\n",$lignes);
		$lignes = searchtask("tache et plus");
		$this->assertEquals("1;:!:;tache et plus;:!:;23/25/2016\n",$lignes);
		$lignes = searchtask("Test");
		$this->assertEquals("1;:!:;Test;:!:;23-01-2016;:!:;This is a test\n",$lignes);
	}	

	public function testGettask()
	{
		$ligne = gettask();

		$this->assertEquals("1;:!:;Test;:!:;23-01-2016;:!:;This is a test\n",$ligne[0]);
		$this->assertEquals("1;:!:;tache et plus;:!:;23/25/2016\n",$ligne[1]);
		$this->assertEquals("1;:!:;Test3;:!:;23/25/2016\n",$ligne[2]);
	}


	public function testUptask()
	{
		uptask("Test");
		$lignes = searchtask("Test");

		$this->assertEquals("2;:!:;Test;:!:;23-01-2016;:!:;This is a test\n",$lignes);
		
		uptask("tache et plus");
		$lignes = searchtask("tache et plus");
		
		$this->assertEquals("2;:!:;tache et plus;:!:;23/25/2016\n",$lignes);

		uptask("Test3",2);
		$lignes = searchtask("Test3");

		$this->assertEquals("3;:!:;Test3;:!:;23/25/2016\n",$lignes);
	}

	public function testEdittask()
	{
		edittask(1,"Test3.1","24/26/2017","newcontent","Test3");

		$ligne = searchtask("Test3.1");

		$this->assertEquals("1;:!:;Test3.1;:!:;24/26/2017;:!:;newcontent\n",$ligne);
		
		edittask(3,"tache et plus","24/26/2017","","tache et plus");
		
		$lignes = searchtask("tache et plus");
		
		$this->assertEquals("3;:!:;tache et plus;:!:;24/26/2017\n",$lignes);
	}

	public function testDeletetask()
	{
		deletetask("tache et plus");

		$ligne = searchtask("tache et plus");

		$this->assertEquals(0,$ligne);
	}

	public function testAddUser()
	{
		newuser("user1","password");
		newuser("user2","password2");
		
		$fileCont = file_get_contents( "db_user.txt" );
		$lines = explode( "\n", $fileCont );
		$line = $lines[count($lines)-3];
		$pass = hash("sha256","user1;:!:;password");
		$this->assertEquals("0;:!:;user1;:!:;".$pass,$line);
		$line = $lines[count($lines)-2];
		$pass = hash("sha256","user2;:!:;password2");
		$this->assertEquals("0;:!:;user2;:!:;".$pass,$line);
	}


}
?>
